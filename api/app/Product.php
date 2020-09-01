<?php

namespace App;

use App\Models\Corporation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Product
 *
 * @property int $id
 * @property int $corporation_id
 * @property string $title
 * @property string $description
 * @property string $image_url
 * @property float $star_value
 * @property float $price
 * @property-read Corporation $corporation
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCorporationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereImageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereStarValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereTitle($value)
 * @mixin \Eloquent
 */
class Product extends Model
{
    public $timestamps = false;

    public function corporation(): BelongsTo
    {
        return $this->belongsTo(Corporation::class);
    }

    public function getImageUrl(): string
    {
        return "@/assets/". $this->attributes["image_url"] . ".jpg";
    }
}
