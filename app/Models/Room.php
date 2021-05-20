<?php

declare(strict_types=1);

namespace App\Models;

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
 * @method static \Illuminate\Database\Eloquent\Builder|Room newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Room newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Room query()
 * @method static \Illuminate\Database\Eloquent\Builder|Room whereBathrooms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Room whereBedrooms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Room whereGarages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Room whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Room whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Room wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Room whereStoreys($value)
 * @mixin \Eloquent
 */
class Room extends Model
{
    use HasFactory;
}
