<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Booking;
use App\Model\Entity\Offer;
use Authorization\IdentityInterface;

/**
 * Booking policy
 */
class BookingPolicy
{
    /**
     * Check if $user can add Booking
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Booking $booking
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Booking $booking)
    {
//tylko client moze skladac zamowienie
        if($user->get('account_type_id') == 1) {
            return true;
        }
        return false;
    }

    /**
     * Check if $user can edit Booking
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Booking $booking
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Booking $booking)
    {
        return $this->isOfferAuthor($user, $booking->offer);  //only author of offer
    }

    /**
     * Check if $user can delete Booking
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Booking $booking
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Booking $booking)
    {
        return $this->isOfferAuthor($user, $booking->offer); //only author of offer
    }

    /**
     * Check if $user can view Booking
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Booking $booking
     * @return bool
     */
    public function canView(IdentityInterface $user, Booking $booking)
    {
        return $this->isOfferAuthor($user, $booking->offer) || $this->isBookingClient($user, $booking); //only client or author of offer

    }

    protected function isBookingClient(IdentityInterface $user, Booking $booking){
        return $booking->user_id === $user->getIdentifier();
    }

    protected function isOfferAuthor(IdentityInterface $user, Offer $offer)
    {
        return $offer->user_id === $user->getIdentifier();
    }
}
