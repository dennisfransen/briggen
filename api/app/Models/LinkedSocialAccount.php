<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\LinkedSocialAccount
 *
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\LinkedSocialAccount newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\LinkedSocialAccount newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\LinkedSocialAccount query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $provider_id
 * @property string $provider_name
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\LinkedSocialAccount whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\LinkedSocialAccount whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\LinkedSocialAccount whereProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\LinkedSocialAccount whereProviderName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\LinkedSocialAccount whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\LinkedSocialAccount whereUserId($value)
 */
class LinkedSocialAccount extends Model
{
    protected $fillable = ['provider_id', 'provider_name', 'user_id'];

    /**
     * @return BelongsTo
     * TODO Unit test
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
