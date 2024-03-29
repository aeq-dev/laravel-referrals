<?php

namespace Bkfdev\Referrals\Traits;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Bkfdev\Referrals\Models\ReferralLink;
use Bkfdev\Referrals\Models\ReferralProgram;

/**
 * Trait ReferralsMember
 * @package Bkfdev\Referrals\Traits
 */
trait ReferralsMember
{

    public function getReferrals(): Collection|\Illuminate\Support\Collection
    {
        return ReferralProgram::all()->map(function ($program) {
            return ReferralLink::getReferral($this, $program);
        })->filter();
    }

    public function referralLink(): HasOne
    {
        return $this->hasOne(ReferralLink::class, 'id', 'referral_link_id');
    }

}
