<?php

declare(strict_types=1);

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class RoomFilters extends Filters
{
    protected array $filters = [
        'name', // partial
        'bedrooms', // match
        'bathrooms', // match
        'storeys', // match
        'garages', // match
        'price', // range
    ];

    /**
     * @param string $val
     * @return Builder
     */
    protected function name(string $val) : Builder
    {
        return !empty($val) ? $this->builder->where('name', 'like', "%$val%") : $this->builder;
    }

    /**
     * @param string $val
     * @return Builder
     */
    protected function bedrooms(string $val) : Builder
    {
        return !empty($val) ? $this->builder->where('bedrooms', '=', $val) : $this->builder;
    }

    /**
     * @param string $val
     * @return Builder
     */
    protected function bathrooms(string $val) : Builder
    {
        return !empty($val) ? $this->builder->where('bathrooms', '=', $val) : $this->builder;
    }

    /**
     * @param string $val
     * @return Builder
     */
    protected function storeys(string $val) : Builder
    {
        return !empty($val) ? $this->builder->where('storeys', '=', $val) : $this->builder;
    }

    /**
     * @param string $val
     * @return Builder
     */
    protected function garages(string $val) : Builder
    {
        return !empty($val) ? $this->builder->where('garages', '=', $val) : $this->builder;
    }

    /**
     * @param string $val
     * @return Builder
     */
    protected function price(string $val) : Builder
    {
        return $this->getRange('price', $val);
    }
}
