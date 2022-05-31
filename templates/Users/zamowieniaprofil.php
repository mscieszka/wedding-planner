<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 * @var \App\Model\Entity\Offer $offer
 * @var \Cake\Collection\CollectionInterface|string[] $offers
 */
?>


<?= $this->Html->css(['viewUser', 'miligram.min', 'normalize.min', 'viewProvider']) ?>
<div class="row">
    <div class="column-responsive column-80 " >
        <div class="provider_container">
            <div class="provider_image">
                <?= $this->Html->image('userProfileImage/userProfileImage3.jpg', ['alt' => 'Owner profile image', 'class' => 'ownerimg']) ?>
            </div>
            <div class="provider_info">
                <div class="provider_name">
                    <p class="property_name"><?= __('Name:   ') ?></p>
                    <p><?= h($user->name) ."   " ?></p>
                    <p><?= h($user->surname) ?></p>
                </div>
                <div class="provider_contact">
                    <div class="provider_contact_detail">
                        <p class="property_name"><?= __('Phone Number:   ') ?></p>
                        <p><?= h($user->phone_number) ?></p>
                    </div>
                    <div class="provider_contact_detail">

                        <p class="property_name"><?= __('Email:') ?></p>
                        <p><?= h($user->email) ?></p>
                    </div>
                </div>
            </div>
            <div class="provider_edit">
                <?php if($user->id == $id_user_log):?>
                <?= $this->Html->link(__('Edytuj profil'), ['action' => 'edit', $user->id], ['class' => 'side-nav-item button float-right']) ?>
                <?= $this->Html->link(__('Wyloguj'), ['action' => 'logout'], ['class' => 'side-nav-item button float-right']) ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="bookmarks_wrapper">


            <?php if($user->account_type_id == 2): ?>
                <div><?= $this->Html->link(__('Oferty użytkownika'), ['action' => 'profile', 1, $user->id]) ?></div>
                <div><?= $this->Html->link(__('Otrzymane oceny'), ['action' => 'profile', 2, $user->id]) ?></div>
                <?php if($user->id == $id_user_log):?>
                <div class="current_bookmarks">Zamówienia</div>
                <?php endif; ?>
            <?php endif; ?>


            <?php if($user->account_type_id==1): ?>
                <div><?= $this->Html->link(__('Oferty obserwowane'), ['action' => 'profile', 1, $user->id]) ?></div>
                <div><?= $this->Html->link(__('Dodane oceny'), ['action' => 'profile', 2, $user->id]) ?></div>
                <?php if($user->id == $id_user_log):?>
                <div class="current_bookmarks">Zamówienia</div>
            <?php endif;?>
            <?php endif; ?>
        </div>





        <div class="users view content">
            <div style="display: flex; justify-content: space-around">
            </div>
            <?php foreach ($user->bookings as $savedUserBookings) : ?>
                <tr>
                    <td><?= h($savedUserBookings->id) ?></td>
                    <td><?= h($savedUserBookings->user_id) ?></td>
                    <td><?= h($savedUserBookings->booking_id) ?></td>
                    <td><?= h($savedUserBookings->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'SavedUserBookings', 'action' => 'view', $savedUserBookings->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'SavedUserBookings', 'action' => 'edit', $savedUserBookings->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'SavedUserBookings', 'action' => 'delete', $savedUserBookings->id], ['confirm' => __('Are you sure you want to delete # {0}?', $savedUserBookings->id)]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>

        </div>




