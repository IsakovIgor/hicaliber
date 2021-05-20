<?php
declare(strict_types=1);

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

abstract class Filters
{
    protected Request $request;
    protected Builder $builder;
    protected array $filters = [];
    protected string $aliasPrefix = '';
    protected array $defaultFilters = [];
    private array $appliedFilters = [];

    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @param $filter
     * @param $value
     */
    private function addFilterInApplied($filter, $value) : void
    {
        $this->appliedFilters[$filter] = $value;
    }

    /**
     * @return bool
     */
    public function filterIsActive() : bool
    {
        return ! empty($this->appliedFilters);
    }

    /**
     * @param Builder $builder
     * @return Builder
     */
    public function apply(Builder $builder) : Builder
    {
        $this->builder = $builder;
        foreach ($this->getFilters() as $filter => $value) {
            if (\method_exists($this, $filter)) {
                $this->addFilterInApplied($filter, $value);
                $this->$filter($value);
            }
        }

        return $this->builder;
    }

    /**
     * @param Request $filters
     * @return Collection
     */
    private function removeAliasPrefix(Request $filters) : Collection
    {
        $realFilters = [];
        foreach ($filters->all() as $filter => $value) {
            $realFilters[\str_replace($this->aliasPrefix, '', $filter)]  = $value;
        }
        return collect($realFilters);
    }

    /**
     * @return Collection
     */
    public function getFilters() : Collection
    {
        return collect($this->defaultFilters)->merge(
            $this->removeAliasPrefix($this->request)->only($this->filters)->filter()
        );
    }

    /**
     * @return array
     */
    public function getAppliedFilters() : array
    {
        return $this->appliedFilters;
    }

    /**
     * @param string $field
     * @param string $val
     * @return Builder
     */
    protected function getRange(string $field, string $val) : Builder
    {
        $val = \json_decode($val, true);
        if (!empty($val['from']) && !empty($val['to'])) {
            return $this->builder->whereBetween($field, $val);
        } elseif (!empty($val['from']) && empty($val['to'])) {
            return $this->builder->where($field, '>', $val['from']);
        } elseif (!empty($val['to'])) {
            return $this->builder->where($field, '<', $val['to']);
        }

        return $this->builder;
    }
}
