<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\MusicFilter;
use Authorization\IdentityInterface;

/**
 * MusicFilter policy
 */
class MusicFilterPolicy
{
    /**
     * Check if $user can add MusicFilter
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\MusicFilter $musicFilter
     * @return bool
     */
    public function canAdd(IdentityInterface $user, MusicFilter $musicFilter)
    {
        //tylko provider
        if($user->get('account_type_id') == 2) {
            return true;
        }
        return false;
    }

    /**
     * Check if $user can edit MusicFilter
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\MusicFilter $musicFilter
     * @return bool
     */
    public function canEdit(IdentityInterface $user, MusicFilter $musicFilter)
    {
        return $this->isOwner($user, $musicFilter);
    }

    /**
     * Check if $user can delete MusicFilter
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\MusicFilter $musicFilter
     * @return bool
     */
    public function canDelete(IdentityInterface $user, MusicFilter $musicFilter)
    {
        return $this->isOwner($user, $musicFilter);
    }

    /**
     * Check if $user can view MusicFilter
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\MusicFilter $musicFilter
     * @return bool
     */
    public function canView(IdentityInterface $user, MusicFilter $musicFilter)
    {
        //kazdy
        return true;
    }


    protected function isOwner(IdentityInterface $user, MusicFilter $musicFilter)
    {
        return $musicFilter->user_id === $user->getIdentifier();
    }
}
