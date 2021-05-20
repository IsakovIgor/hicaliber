<?php

declare(strict_types=1);

namespace App\Models;

use App\Filters\RoomFilters;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Room
 *
 * @package App\Models
 * @property int $id
 * @property string $name
 * @property float $price
 * @property int $bedrooms
 * @property int $bathrooms
 * @property int $storeys
 * @property int $garages
 * @method static Builder|Room newModelQuery()
 * @method static Builder|Room newQuery()
 * @method static Builder|Room query()
 * @method static Builder|Room whereBathrooms($value)
 * @method static Builder|Room whereBedrooms($value)
 * @method static Builder|Room whereGarages($value)
 * @method static Builder|Room whereId($value)
 * @method static Builder|Room whereName($value)
 * @method static Builder|Room wherePrice($value)
 * @method static Builder|Room whereStoreys($value)
 * @method static Builder|Room filters(RoomFilters $filters)
 * @mixin \Eloquent
 */
class Room extends Model
{
    use HasFactory;

    public function scopeFilters(Builder $q, RoomFilters $filters)
    {
        $filters->apply($q);
    }
}
