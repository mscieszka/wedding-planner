<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\CateringFilter;
use Authorization\IdentityInterface;

/**
 * CateringFilter policy
 */
class CateringFilterPolicy
{
    /**
     * Check if $user can add CateringFilter
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\CateringFilter $cateringFilter
     * @return bool
     */
    public function canAdd(IdentityInterface $user, CateringFilter $cateringFilter)
    {
        //tylko provider
        if($user->get('account_type_id') == 2) {
            return true;
        }
        return false;
    }

    /**
     * Check if $user can edit CateringFilter
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\CateringFilter $cateringFilter
     * @return bool
     */
    public function canEdit(IdentityInterface $user, CateringFilter $cateringFilter)
    {
        return $this->isOwner($user, $cateringFilter);
    }

    /**
     * Check if $user can delete CateringFilter
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\CateringFilter $cateringFilter
     * @return bool
     */
    public function canDelete(IdentityInterface $user, CateringFilter $cateringFilter)
    {
        return $this->isOwner($user, $cateringFilter);
    }

    /**
     * Check if $user can view CateringFilter
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\CateringFilter $cateringFilter
     * @return bool
     */
    public function canView(IdentityInterface $user, CateringFilter $cateringFilter)
    {
        return true;
    }

    protected function isOwner(IdentityInterface $user, CateringFilter $cateringFilter)
    {
        return $cateringFilter->user_id === $user->getIdentifier();
    }
}
