<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

/**
 * App\Models\Voucher
 *
 * @property int $id
 * @property int $corporation_id
 * @property string $code
 * @property int $value
 * @property int $uses
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Corporation $corporation
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Voucher newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Voucher newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Voucher query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Voucher whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Voucher whereCorporationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Voucher whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Voucher whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Voucher whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Voucher whereUses($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Voucher whereValue($value)
 * @mixin \Eloquent
 */
class Voucher extends Model
{
    /**
     * @return BelongsTo
     * TODO Unit test
     */
    public function corporation(): BelongsTo
    {
        return $this->belongsTo(Corporation::class);
    }

    /**
     * TODO Unit test
     */
    public function setUniqueCode(): void
    {
        do
        {
            $code = Str::random(5);
            $foundCode = Voucher::where("code", $code)->first();
        }
        while(!empty($foundCode));

        $this->code = $code;
    }
}
