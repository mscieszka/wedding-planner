<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Province;
use Authorization\IdentityInterface;

/**
 * Province policy
 */
class ProvincePolicy
{
    /**
     * Check if $user can add Province
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Province $province
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Province $province)
    {
        //to by mógł admin
        return false;
    }

    /**
     * Check if $user can edit Province
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Province $province
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Province $province)
    {
        //to by mógł admin
        return false;
    }

    /**
     * Check if $user can delete Province
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Province $province
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Province $province)
    {
        //to by mógł admin
        return false;
    }

    /**
     * Check if $user can view Province
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Province $province
     * @return bool
     */
    public function canView(IdentityInterface $user, Province $province)
    {
        //i client i provider mogą widzieć nazwy province
        return true;
    }
}
