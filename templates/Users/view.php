<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 * @var \App\Model\Entity\Offer $offer
 * @var \Cake\Collection\CollectionInterface|string[] $offers
 */
?>
<?= $this->Html->css(['viewUser', 'miligram.min', 'normalize.min', 'viewProvider', 'profile-banner', 'ratings']) ?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="profile-container">
            <?= $this->element('profile-banners/user-profile-banner'); ?>
            <div class="user-bookmarks-container">
                <div class="bookmarks_wrapper">
                    <div class="current_bookmarks">Oferty użytkownika</div>
                    <div><?= $this->Html->link(__('Otrzymane oceny'), ['action' => '']) ?></div>
                    <div><?= $this->Html->link(__('Historia płatności'), ['action' => '']) ?></div>
                </div>
                <div class="users view content">
                    <div style="display: flex; justify-content: space-around">
                    </div>

                    <?php if ($account_type_id == 2) : ?>

                        <div class="offer_container">
                            <div class="offer_container_header">
                                <h3>Oferty użytkownika</h3>
                                <div><?= $this->Html->link(__('Dodaj ofertę'), ['controller' => 'Offers', 'action' => 'add']) ?></div>
                            </div>
                            <div class="offer_container_wrapper">

                                <div class="related">
                                    <?php if (!empty($user->offers)) : ?>
                                        <?php foreach ($user->offers as $offers) : ?>

                                            <div class="offer_container_wrapper_image">Zdjęcie</div>
                                            <div class="offer_container_wrapper_description">
                                                <div class="offer_container_wrapper_title">
                                                    <div><span style="font-weight: bold;"><?= h($offers->name) ?></span></div>
                                                    <?= $offers->has('address') ? $this->Html->link('Kliknij, aby zobaczyć adres', ['controller' => 'Addresses', 'action' => 'view', $offers->address->id]) : '' ?>
                                                </div>
                                                <div class="offer_container_wrapper_description"><?= h($offers->description) ?></div>
                                            </div>
                                            <div class="offer_container_edit_button">
                                                <?= $this->Html->link(__('Edit Offer'), ['controller' => 'Offers', 'action' => 'edit', $offers->id], ['class' => 'button float-right']) ?>
                                                <?= $this->Html->link(__('Delete Offer'), ['controller' => 'Offers', 'action' => 'delete', $offers->id], ['class' => 'button float-right']) ?>
                                            </div>

                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php debug($user) ?>

                </div>
            </div>
        </div>
    </div>
</div>
