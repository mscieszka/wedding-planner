<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Booking Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $offer_id
 * @property int $payment_id
 * @property \Cake\I18n\FrozenDate|null $booking_date
 * @property \Cake\I18n\FrozenDate|null $release_date
 * @property bool|null $is_released
 * @property bool|null $is_canceled
 * @property \Cake\I18n\FrozenTime|null $created
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Offer $offer
 * @property \App\Model\Entity\Payment $payment
 * @property \App\Model\Entity\SavedUserBooking[] $saved_user_bookings
 */
class Booking extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'user_id' => true,
        'offer_id' => true,
        'payment_id' => true,
        'booking_date' => true,
        'release_date' => true,
        'is_released' => true,
        'is_canceled' => true,
        'created' => true,
        'user' => true,
        'offer' => true,
        'payment' => true,
        'saved_user_bookings' => true,
    ];
}
