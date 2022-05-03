<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * HallFilter Entity
 *
 * @property int $id
 * @property int $offer_id
 * @property int $hall_type_id
 * @property bool|null $air_conditioning
 * @property bool|null $garden
 * @property bool|null $terrace
 * @property bool|null $bar
 * @property bool|null $stage
 * @property int|null $number_beds
 * @property int|null $number_people
 * @property string|null $price_for_the_night
 * @property \Cake\I18n\FrozenTime|null $created
 *
 * @property \App\Model\Entity\Offer $offer
 * @property \App\Model\Entity\HallType $hall_type
 */
class HallFilter extends Entity
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
        'hall_type_id' => true,
        'air_conditioning' => true,
        'garden' => true,
        'terrace' => true,
        'bar' => true,
        'stage' => true,
        'number_beds' => true,
        'number_people' => true,
        'price_for_the_night' => true,
        'created' => true,
        'offer' => true,
        'hall_type' => true,
    ];
}
