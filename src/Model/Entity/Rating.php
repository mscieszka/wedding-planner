<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Rating Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $offer_id
 * @property int $rating
 * @property string|null $description
 * @property \Cake\I18n\FrozenDate $opinion_date
 * @property \Cake\I18n\FrozenTime|null $created
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Offer $offer
 */
class Rating extends Entity
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
        'rating' => true,
        'description' => true,
        'opinion_date' => true,
        'created' => true,
        'user' => true,
        'offer' => true,
    ];
}
