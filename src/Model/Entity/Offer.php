<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Offer Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $category_id
 * @property int $address_id
 * @property string $name
 * @property string $price
 * @property string|null $description
 * @property string|null $advance_payment
 * @property string|null $website
 * @property \Cake\I18n\FrozenTime|null $created
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\Address $address
 * @property \App\Model\Entity\Booking[] $bookings
 * @property \App\Model\Entity\CateringFilter[] $catering_filters
 * @property \App\Model\Entity\HallFilter[] $hall_filters
 * @property \App\Model\Entity\MusicFilter[] $music_filters
 * @property \App\Model\Entity\OfferActiveDay[] $offer_active_days
 * @property \App\Model\Entity\Rating[] $ratings
 * @property \App\Model\Entity\SavedUserOffer[] $saved_user_offers
 */
class Offer extends Entity
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
        'category_id' => true,
        'address_id' => true,
        'name' => true,
        'price' => true,
        'description' => true,
        'advance_payment' => true,
        'website' => true,
        'created' => true,
        'user' => true,
        'category' => true,
        'address' => true,
        'bookings' => true,
        'catering_filters' => true,
        'hall_filters' => true,
        'music_filters' => true,
        'offer_active_days' => true,
        'ratings' => true,
        'saved_user_offers' => true,
    ];
}
