<?php

namespace Bkfdev\Referrals\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class ReferralProgram
 * @package Bkfdev\Referrals\Models
 * @property int $id
 * @property string $uri
 * @property string $name
 * @property string $title
 * @property string $description
 * @property int $lifetime_minutes
 */
class ReferralProgram extends Model
{
    protected $casts = [
        'active' => 'boolean',
        'default' => 'boolean',
        'starts_at' => 'datetime',
        'expires_at' => 'datetime',
    ];
    //protected $fillable = ['name', 'uri', 'lifetime_minutes', 'title', 'description'];
    protected $guarded = [];

    public function links(): HasMany
    {
        return $this->hasMany(ReferralLink::class, 'referral_program_id', 'id');
    }

}
