<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Category;
use Authorization\IdentityInterface;

/**
 * Category policy
 */
class CategoryPolicy
{
    /**
     * Check if $user can add Category
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Category $category
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Category $category)
    {
        return true;
    }

    /**
     * Check if $user can edit Category
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Category $category
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Category $category)
    {
        return $this->isOwner($user, $category);
    }

    /**
     * Check if $user can delete Category
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Category $category
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Category $category)
    {
        return $this->isOwner($user, $category);
    }

    /**
     * Check if $user can view Category
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Category $category
     * @return bool
     */
    public function canView(IdentityInterface $user, Category $category)
    {
        return true;
    }

    protected function isOwner(IdentityInterface $user, Category $category)
    {
        return $category->user_id === $user->getIdentifier();
    }
}
