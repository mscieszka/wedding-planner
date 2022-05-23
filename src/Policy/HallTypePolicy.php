<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\HallType;
use Authorization\IdentityInterface;

/**
 * HallType policy
 */
class HallTypePolicy
{
    /**
     * Check if $user can add HallType
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\HallType $hallType
     * @return bool
     */
    public function canAdd(IdentityInterface $user, HallType $hallType)
    {
        //to tlyko mogłby admin
        return false;
    }

    /**
     * Check if $user can edit HallType
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\HallType $hallType
     * @return bool
     */
    public function canEdit(IdentityInterface $user, HallType $hallType)
    {
        return false;
    }

    /**
     * Check if $user can delete HallType
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\HallType $hallType
     * @return bool
     */
    public function canDelete(IdentityInterface $user, HallType $hallType)
    {
        return false;
    }

    /**
     * Check if $user can view HallType
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\HallType $hallType
     * @return bool
     */
    public function canView(IdentityInterface $user, HallType $hallType)
    {
        return true;
    }
}
