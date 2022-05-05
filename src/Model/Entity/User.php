<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Authentication\PasswordHasher\DefaultPasswordHasher;

/**
 * User Entity
 *
 * @property int $id
 * @property string $email
 * @property string $password
 * @property string $name
 * @property string $surname
 * @property string $phone_number
 * @property bool|null $enabled
 * @property bool|null $confirmed_email
 * @property string $company_name
 * @property string|null $krs
 * @property string $nip
 * @property string|null $regon
 * @property int $account_type_id
 * @property \Cake\I18n\FrozenTime|null $created
 *
 * @property \App\Model\Entity\AccountType $account_type
 * @property \App\Model\Entity\Address[] $addresses
 * @property \App\Model\Entity\Booking[] $bookings
 * @property \App\Model\Entity\Offer[] $offers
 * @property \App\Model\Entity\Rating[] $ratings
 * @property \App\Model\Entity\SavedUserBooking[] $saved_user_bookings
 * @property \App\Model\Entity\SavedUserOffer[] $saved_user_offers
 */
class User extends Entity
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
        'email' => true,
        'password' => true,
        'name' => true,
        'surname' => true,
        'phone_number' => true,
        'enabled' => true,
        'confirmed_email' => true,
        'company_name' => true,
        'krs' => true,
        'nip' => true,
        'regon' => true,
        'account_type_id' => true,
        'created' => true,
        'account_type' => true,
        'addresses' => true,
        'bookings' => true,
        'offers' => true,
        'ratings' => true,
        'saved_user_bookings' => true,
        'saved_user_offers' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
    ];

    protected function _setPassword(string $password)
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher())->hash($password);
        }
    }
}
