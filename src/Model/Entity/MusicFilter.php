<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MusicFilter Entity
 *
 * @property int $id
 * @property int $offer_id
 * @property bool|null $disco_polo
 * @property bool|null $pop
 * @property bool|null $rock
 * @property bool|null $oldies
 * @property bool|null $world_music
 * @property bool|null $running_games
 * @property \Cake\I18n\FrozenTime|null $created
 *
 * @property \App\Model\Entity\Offer $offer
 */
class MusicFilter extends Entity
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
        'disco_polo' => true,
        'pop' => true,
        'rock' => true,
        'oldies' => true,
        'world_music' => true,
        'running_games' => true,
        'created' => true,
        'offer' => true,
    ];
}
