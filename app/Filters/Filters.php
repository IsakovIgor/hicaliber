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

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    private function addFilterInApplied($filter, $value) : void
    {
        $this->appliedFilters[$filter] = $value;
    }

    public function filterIsActive() : bool
    {
        return ! empty($this->appliedFilters);
    }

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

    private function removeAliasPrefix(Request $filters) : Collection
    {
        $realFilters = [];
        foreach ($filters->all() as $filter => $value) {
            $realFilters[\str_replace($this->aliasPrefix, '', $filter)]  = $value;
        }
        return collect($realFilters);
    }

    public function getFilters() : Collection
    {
        return collect($this->defaultFilters)->merge(
            $this->removeAliasPrefix($this->request)->only($this->filters)->filter()
        );
    }

    public function getAppliedFilters() : array
    {
        return $this->appliedFilters;
    }
}
