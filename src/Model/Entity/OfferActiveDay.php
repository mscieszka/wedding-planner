<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OfferActiveDay Entity
 *
 * @property int $id
 * @property int $offer_id
 * @property bool $monday
 * @property bool $tuesday
 * @property bool $wednesday
 * @property bool $Thursday
 * @property bool $friday
 * @property bool $saturday
 * @property bool $sunday
 * @property \Cake\I18n\FrozenTime|null $created
 *
 * @property \App\Model\Entity\Offer $offer
 */
class OfferActiveDay extends Entity
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
        'offer_id' => true,
        'monday' => true,
        'tuesday' => true,
        'wednesday' => true,
        'Thursday' => true,
        'friday' => true,
        'saturday' => true,
        'sunday' => true,
        'created' => true,
        'offer' => true,
    ];
}
