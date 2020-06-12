<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Stamp
 *
 * @property int $id
 * @property int $corporation_id
 * @property int $user_id
 * @property int $count
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Corporation $corporation
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Stamp newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Stamp newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Stamp query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Stamp whereCorporationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Stamp whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Stamp whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Stamp whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Stamp whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Stamp whereUserId($value)
 * @mixin \Eloquent
 */
class Stamp extends Model
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
     * @return BelongsTo
     * TODO Unit test
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
