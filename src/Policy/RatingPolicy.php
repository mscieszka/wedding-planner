<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Rating;
use Authorization\IdentityInterface;

/**
 * Rating policy
 */
class RatingPolicy
{
    /**
     * Check if $user can add Rating
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Rating $rating
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Rating $rating)
    {
        return true; //everyone
    }

    /**
     * Check if $user can edit Raiting
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Rating $rating
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Rating $rating)
    {
        return $this->isRatingAuthor($user, $rating); //only author of rating
    }

    /**
     * Check if $user can delete Raiting
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Rating $rating
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Rating $rating)
    {
        return $this->isRatingAuthor($user, $rating); //only author of rating
    }

    /**
     * Check if $user can view Rating
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Rating $rating
     * @return bool
     */
    public function canView(IdentityInterface $user, Rating $rating)
    {
        return true; //everyone
    }


    protected function isRatingAuthor(IdentityInterface $user, Rating $rating)
    {
        return $rating->user_id === $user->getIdentifier();
    }
}
