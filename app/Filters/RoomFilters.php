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

    protected function name(string $val) : Builder
    {
        return $this->builder->where('name', 'like', "%$val%");
    }

    protected function bedrooms(string $val) : Builder
    {
        return $this->builder->where('bedrooms', '=', $val);
    }

    protected function bathrooms(string $val) : Builder
    {
        return $this->builder->where('bathrooms', '=', $val);
    }

    protected function storeys(string $val) : Builder
    {
        return $this->builder->where('storeys', '=', $val);
    }

    protected function garages(string $val) : Builder
    {
        return $this->builder->where('garages', '=', $val);
    }

    protected function price(string $val) : Builder
    {
        $val = \json_decode($val, true);
        return $this->builder->whereBetween('price', $val);
    }
}
