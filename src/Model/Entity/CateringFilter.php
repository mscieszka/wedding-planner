<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CateringFilter Entity
 *
 * @property int $id
 * @property int $offer_id
 * @property bool|null $polish
 * @property bool|null $italian
 * @property bool|null $american
 * @property bool|null $french
 * @property bool|null $asian
 * @property bool|null $vegan
 * @property bool|null $vegetarian
 * @property bool|null $gluten_free
 * @property \Cake\I18n\FrozenTime|null $created
 *
 * @property \App\Model\Entity\Offer $offer
 */
class CateringFilter extends Entity
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
        'polish' => true,
        'italian' => true,
        'american' => true,
        'french' => true,
        'asian' => true,
        'vegan' => true,
        'vegetarian' => true,
        'gluten_free' => true,
        'created' => true,
        'offer' => true,
    ];
}
