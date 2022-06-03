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
            <div class="current_bookmarks">Oferty użytkownika</div>
            <div><?= $this->Html->link(__('Otrzymane oceny'), ['action' => 'profile', 2, $user->id]) ?></div>
            <?php if($user->id == $id_user_log):?>
            <div><?= $this->Html->link(__('Zamowienia'), ['action' => 'profile', 3, $user->id]) ?></div>
                <?php endif; ?>
            <?php endif; ?>

            <?php if($user->account_type_id==1): ?>
                <div class="current_bookmarks">Oferty obserwowane</div>
                <div><?= $this->Html->link(__('Dodane oceny'), ['action' => 'profile', 2, $user->id]) ?></div>
                <?php if($user->id == $id_user_log):?>
                <div><?= $this->Html->link(__('Zamowienia'), ['action' => 'profile', 3, $user->id]) ?></div>
                <?php endif; ?>
                <?php endif;?>

        </div>

        <div class="users view content">
            <div style="display: flex; justify-content: space-around">
            </div>

            <?php if($user->account_type_id == 2): ?>
            <div class="offer_container">
                <div class="offer_container_header">
                    <h3>Oferty użytkownika</h3>
                    <?php if($user->id == $id_user_log):?>
                    <div><?= $this->Html->link(__('Dodaj ofertę'), ['controller' => 'Offers', 'action' => 'add']) ?></div>
                    <?php endif; ?>
                </div>

                    <div class="related">
                        <?php if (!empty($user->offers)) : ?>
                            <?php foreach ($user->offers as $offers) : ?>
                            <div class="offer_container_wrapper">
                                <div class="offer_container_wrapper_image">
                                    <?= $this->Html->image('offerImages/hall2_1.jpg', ['alt' => 'Owner profile image']) ?>
                                </div>
                                <div class="offer_container_wrapper_description">
                                    <div class="offer_container_wrapper_title">
                                        <?= $this->Html->link(__(h($offers->name)), ['controller' => 'Offers', 'action' => 'view', $offers->id]) ?>
                                    </div>
                                    <div class="offer_container_wrapper_stars">*****</div>
                                    <div class="offer_container_wrapper_description"><?= h($offers->description) ?></div>
                                </div>
                                <div class="offer_container_edit_button">
                                    <?php if($user->id == $id_user_log):?>
                                    <?= $this->Html->link(__('Edit Offer'), ['controller' => 'Offers', 'action' => 'edit', $offers->id], ['class' => 'button float-right override_button']) ?>
                                    <?= $this->Html->link(__('Delete Offer'), ['controller' => 'Offers','action' => 'delete', $offers->id], ['class' => 'button float-right override_button']) ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>

            </div>
            <?php endif; ?>

            <?php if($user->account_type_id == 1): ?>
                <div class="offer_container">
                    <div class="offer_container_header">
                        <h3>Ulubione oferty użytkownika</h3>
                    </div>

                        <div class="related">
                            <?php if (!empty($offers)) : ?>
                                <?php foreach ($offers as $offer) : ?>

                            <?php if(!(in_array($offer->id, $saved_user_offers))): continue; ?>
                                    <?php endif; ?>

                                    <div class="offer_container_wrapper">
                                        <div class="offer_container_wrapper_image">
                                            <?= $this->Html->image('offerImages/hall2_1.jpg', ['alt' => 'Owner profile image']) ?>
                                        </div>
                                        <div class="offer_container_wrapper_description">
                                            <div class="offer_container_wrapper_title">
                                                <?= $this->Html->link(__(h($offer->name)), ['controller' => 'Offers', 'action' => 'view', $offer->id]) ?>
                                            </div>
                                            <div class="offer_container_wrapper_stars">*****</div>
                                            <div class="offer_container_wrapper_description"><?= h($offer->description) ?></div>
                                        </div>
                                        <div class="offer_container_edit_button">
                                            <?php if($user->id == $id_user_log):?>
                                                    <td class="offer-name"><?= $this->Form->postLink(__('Usuń z ulubionych'), ['controller' => 'SavedUserOffers', 'action' => 'delete', $offer->id], ['confirm' => __('Czy na pewno chcesz usunąć ofertę z ulubionych?')]) ?></td>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>

                </div>
            <?php endif; ?>
        </div>
