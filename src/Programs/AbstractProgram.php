<?php

namespace Bkfdev\Referrals\Programs;

use Bkfdev\Referrals\Contracts\ProgramInterface;
use Bkfdev\Referrals\Models\ReferralProgram;

abstract class AbstractProgram implements ProgramInterface
{

    /**
     * @var ReferralProgram
     */
    protected ReferralProgram $program;

    /**
     * User who attracted the referral.
     *
     * @var mixed
     */
    protected mixed $recruitUser;

    /**
     * Attracted user
     *
     * @var mixed
     */
    protected mixed $referralUser;

    public function __construct(ReferralProgram $program, $recruitUser, $referralUser)
    {
        $this->program = $program;
        $this->recruitUser = $recruitUser;
        $this->referralUser = $referralUser;
    }

}
