<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\OfferActiveDay;
use Authorization\IdentityInterface;

/**
 * OfferActiveDay policy
 */
class OfferActiveDayPolicy
{
    /**
     * Check if $user can add OfferActiveDay
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\OfferActiveDay $offerActiveDay
     * @return bool
     */
    public function canAdd(IdentityInterface $user, OfferActiveDay $offerActiveDay)
    {
        //tylko provider
        if($user->get('account_type_id') == 2) {
            return true;
        }
        return false;
    }

    /**
     * Check if $user can edit OfferActiveDay
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\OfferActiveDay $offerActiveDay
     * @return bool
     */
    public function canEdit(IdentityInterface $user, OfferActiveDay $offerActiveDay)
    {
        return $this->isOwner($user, $offerActiveDay);
    }

    /**
     * Check if $user can delete OfferActiveDay
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\OfferActiveDay $offerActiveDay
     * @return bool
     */
    public function canDelete(IdentityInterface $user, OfferActiveDay $offerActiveDay)
    {
        return $this->isOwner($user, $offerActiveDay);
    }

    /**
     * Check if $user can view OfferActiveDay
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\OfferActiveDay $offerActiveDay
     * @return bool
     */
    public function canView(IdentityInterface $user, OfferActiveDay $offerActiveDay)
    {
        //aktywne dni może widzieć i client i provider
        return true;
    }


    protected function isOwner(IdentityInterface $user, OfferActiveDay $offerActiveDay)
    {
        return $offerActiveDay->user_id === $user->getIdentifier();
    }
}
