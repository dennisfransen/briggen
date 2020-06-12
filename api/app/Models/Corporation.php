<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Corporation
 *
 * @property int $id
 * @property string $title
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Stamp[] $stamps
 * @property-read int|null $stamps_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Voucher[] $vouchers
 * @property-read int|null $vouchers_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Corporation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Corporation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Corporation query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Corporation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Corporation whereTitle($value)
 * @mixin \Eloquent
 */
class Corporation extends Model
{
    public $timestamps = false;

    /**
     * @return HasMany
     * TODO Unit test
     */
    public function stamps(): HasMany
    {
        return $this->hasMany(Stamp::class);
    }

    /**
     * @return HasMany
     * TODO Unit test
     */
    public function vouchers(): HasMany
    {
        return $this->hasMany(Voucher::class);
    }
}
