<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\SavedUserOffer;
use Authorization\IdentityInterface;

/**
 * SavedUserOffer policy
 */
class SavedUserOfferPolicy
{
    /**
     * Check if $user can add SavedUserOffer
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\SavedUserOffer $savedUserOffer
     * @return bool
     */
    public function canAdd(IdentityInterface $user, SavedUserOffer $savedUserOffer)
    {
    }

    /**
     * Check if $user can edit SavedUserOffer
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\SavedUserOffer $savedUserOffer
     * @return bool
     */
    public function canEdit(IdentityInterface $user, SavedUserOffer $savedUserOffer)
    {
    }

    /**
     * Check if $user can delete SavedUserOffer
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\SavedUserOffer $savedUserOffer
     * @return bool
     */
    public function canDelete(IdentityInterface $user, SavedUserOffer $savedUserOffer)
    {
        return $this->isOwner($user, $savedUserOffer);
    }

    /**
     * Check if $user can view SavedUserOffer
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\SavedUserOffer $savedUserOffer
     * @return bool
     */
    public function canView(IdentityInterface $user, SavedUserOffer $savedUserOffer)
    {
    }

    protected function isOwner(IdentityInterface $user, SavedUserOffer $savedUserOffer)
    {
        return $savedUserOffer->user_id === $user->getIdentifier();
    }
}
