<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Address;
use Authorization\IdentityInterface;

/**
 * Address policy
 */
class AddressPolicy
{
    /**
     * Check if $user can add Address
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Address $address
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Address $address)
    {
        return true;
    }

    /**
     * Check if $user can edit Address
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Address $address
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Address $address)
    {
        return $this->isOwner($user, $address);
    }

    /**
     * Check if $user can delete Address
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Address $address
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Address $address)
    {
        return $this->isOwner($user, $address);
    }

    /**
     * Check if $user can view Address
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Address $address
     * @return bool
     */
    public function canView(IdentityInterface $user, Address $address)
    {
        return $this->isOwner($user, $address);
    }

    protected function isOwner(IdentityInterface $user, Address $address)
    {
        return $address->user_id === $user->getIdentifier();
    }
}
