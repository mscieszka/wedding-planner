<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AccountType Entity
 *
 * @property int $id
 * @property string $account_name
 * @property \Cake\I18n\FrozenTime|null $created
 *
 * @property \App\Model\Entity\User[] $users
 */
class AccountType extends Entity
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
        'account_name' => true,
        'created' => true,
        'users' => true,
    ];
}
