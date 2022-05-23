<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\HallFilter;
use Authorization\IdentityInterface;

/**
 * HallFilter policy
 */
class HallFilterPolicy
{
    /**
     * Check if $user can add HallFilter
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\HallFilter $hallFilter
     * @return bool
     */
    public function canAdd(IdentityInterface $user, HallFilter $hallFilter)
    {
        //tylko provider
        if($user->get('account_type_id') == 2) {
            return true;
        }
        return false;
    }

    /**
     * Check if $user can edit HallFilter
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\HallFilter $hallFilter
     * @return bool
     */
    public function canEdit(IdentityInterface $user, HallFilter $hallFilter)
    {
        return $this->isOwner($user, $hallFilter);
    }

    /**
     * Check if $user can delete HallFilter
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\HallFilter $hallFilter
     * @return bool
     */
    public function canDelete(IdentityInterface $user, HallFilter $hallFilter)
    {
        return $this->isOwner($user, $hallFilter);
    }

    /**
     * Check if $user can view HallFilter
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\HallFilter $hallFilter
     * @return bool
     */
    public function canView(IdentityInterface $user, HallFilter $hallFilter)
    {
        return true;
    }

    protected function isOwner(IdentityInterface $user, HallFilter $hallFilter)
    {
        return $hallFilter->user_id === $user->getIdentifier();
    }
}
