<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Address Entity
 *
 * @property int $id
 * @property string $street
 * @property string $house_number
 * @property string $postal_code
 * @property string $city
 * @property int $user_id
 * @property int|null $province_id
 * @property \Cake\I18n\FrozenTime|null $created
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Province $province
 * @property \App\Model\Entity\Offer[] $offers
 */
class Address extends Entity
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
        'street' => true,
        'house_number' => true,
        'postal_code' => true,
        'city' => true,
        'user_id' => true,
        'province_id' => true,
        'created' => true,
        'province' => true,
        'offers' => true,
    ];
}
