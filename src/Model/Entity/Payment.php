<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Payment Entity
 *
 * @property int $id
 * @property bool|null $is_paid
 * @property bool|null $is_returned
 * @property string|null $price
 * @property \Cake\I18n\FrozenTime|null $created
 *
 * @property \App\Model\Entity\Booking[] $bookings
 */
class Payment extends Entity
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
        'is_paid' => true,
        'is_returned' => true,
        'price' => true,
        'created' => true,
        'bookings' => true,
    ];
}
