<?php
declare(strict_types=1);

namespace App\Policy;

use Authorization\IdentityInterface;

class GlobalPolicy
{
    public function isLogon(IdentityInterface $user)
    {
        return (boolean)$user->getIdentifier();
    }
}
