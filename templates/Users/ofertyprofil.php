<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 * @var \App\Model\Entity\Offer $offer
 * @var \Cake\Collection\CollectionInterface|string[] $offers
 */

use Cake\Filesystem\Folder;

?>
<?= $this->Html->css(['miligram.min', 'normalize.min', 'viewProvider', 'profile-banner', 'viewOffer', 'viewUser', 'ratings']) ?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="profile-container">
            <?= $this->element('profile-banners/user-profile-banner'); ?>
            <div class="user-bookmarks-container">
                <div class="bookmarks_wrapper">
                    <?php if ($user->account_type_id == 2) : ?>
                        <div class="current_bookmarks">Oferty użytkownika</div>
                        <div><?= $this->Html->link(__('Otrzymane oceny'), ['action' => 'profile', 2, $user->id]) ?></div>
                    <?php endif; ?>
                    <?php if ($user->account_type_id == 1) : ?>
                        <div class="current_bookmarks">Oferty obserwowane</div>
                        <div><?= $this->Html->link(__('Dodane oceny'), ['action' => 'profile', 2, $user->id]) ?></div>
                    <?php endif; ?>
                    <?php if ($user->id == $id_user_log) : ?>
                        <div><?= $this->Html->link(__('Zamówienia'), ['action' => 'profile', 3, $user->id]) ?></div>
                    <?php endif; ?>
                </div>
                <div class="users view content">
                    <div style="display: flex; justify-content: space-around"></div>

                    <?php if ($user->account_type_id == 2) : ?>
                        <div class="offer_container">
                            <div class="offer_container_header">
                                <h3>Oferty użytkownika</h3>
                                <?php if ($user->id == $id_user_log) : ?>
                                    <div><?= $this->Html->link(__('Dodaj ofertę'), ['controller' => 'Offers', 'action' => 'add']) ?></div>
                                <?php endif; ?>
                            </div>

                            <div class="related">
                                <?php if (!empty($user->offers)) : ?>
                                    <?php foreach ($user->offers as $offers) : ?>
                                        <div class="offer_container_wrapper">
                                            <div class="offer_container_wrapper-img">

                                                <?php
                                                $path = WWW_ROOT . 'img' . DS . 'offerImages' . DS . $offers->id;
                                                if (!file_exists($path)) {
                                                    $path = new Folder($path, true, 777);
                                                } else {
                                                    $path = new Folder($path);
                                                }
                                                $files = $path->find();
                                                ?>

                                                <?php if (empty($files)) : ?>
                                                    <?= $this->Html->image('offerImages/cat1_1.jpg', [
                                                        'alt' => 'Owner profile image',
                                                        'class' => 'offer-img'
                                                    ]) ?>
                                                <?php endif; ?>

                                                <?php if (!empty($files)) : ?>
                                                    <?php foreach ($files as $file) : ?>
                                                        <?php $filePath = 'offerImages/' . (int)$offers->get('id') . '/' . $file; ?>
                                                        <?= $this->Html->image($filePath, [
                                                            'alt' => 'Owner profile image',
                                                            'class' => 'offer-img'
                                                        ]) ?>
                                                        <?php break; ?>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </div>
                                            <div class="offer_container_wrapper_description">
                                                <div class="offer_container_wrapper_title">
                                                    <h3><?= $this->Html->link(__(h($offers->name)), ['controller' => 'Offers', 'action' => 'view', $offers->id]) ?></h3>
                                                </div>

                                                <div class="offer_container_wrapper_stars">
                                                    <?php foreach ($averages as $average) : ?>
                                                        <?php if ($average['offer_id'] == $offers->id) : ?>
                                                            <?php if ($average['avg'] > 0): ?>
                                                                <div class="rating-combo">
                                                                    <?= $this->Html->image('rating-star.svg') ?>
                                                                    <h4><?= $average['avg'] ?></h4>
                                                                </div>
                                                            <?php else: ?>
                                                                <h4>Brak ocen</h4>
                                                            <?php endif ?>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </div>

                                                <div class="offer_container_wrapper_description"><?= h($offers->description) ?></div>
                                            </div>
                                            <div class="offer_container_edit_button">
                                                <?php if ($user->id == $id_user_log) : ?>
                                                    <?= $this->Html->link(__('Edytuj'), ['controller' => 'Offers', 'action' => 'edit', $offers->id], ['class' => 'button float-right override_button']) ?>
                                                    <?= $this->Html->link(__('Usuń ofertę'), ['controller' => 'Offers', 'action' => 'delete', $offers->id], ['class' => 'button float-right override_button']) ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>

                        </div>
                    <?php endif; ?>

                    <?php if ($user->account_type_id == 1) : ?>
                        <div class="offer_container">
                            <div class="offer_container_header">
                                <h3>Ulubione oferty użytkownika</h3>
                            </div>

                            <div class="related">
                                <?php if (!empty($offers)) : ?>
                                    <?php foreach ($offers as $offer) : ?>

                                        <?php if (!(in_array($offer->id, $saved_user_offers))) : continue; ?>
                                        <?php endif; ?>

                                        <div class="offer_container_wrapper">
                                            <div class="offer_container_wrapper-img">

                                                <?php
                                                $path = WWW_ROOT . 'img' . DS . 'offerImages' . DS . $offer->id;
                                                if (!file_exists($path)) {
                                                    $path = new Folder($path, true, 777);
                                                } else {
                                                    $path = new Folder($path);
                                                }
                                                $files = $path->find();
                                                ?>

                                                <?php if (empty($files)) : ?>
                                                    <?= $this->Html->image('offerImages/cat1_1.jpg', [
                                                        'alt' => 'Owner profile image'
                                                    ]) ?>
                                                <?php endif; ?>

                                                <?php if (!empty($files)) : ?>
                                                    <?php foreach ($files as $file) : ?>
                                                        <?php $filePath = 'offerImages/' . (int)$offer->get('id') . '/' . $file; ?>
                                                        <?= $this->Html->image($filePath, [
                                                            'alt' => 'Owner profile image',
                                                            'class' => 'offer-img'
                                                        ]) ?>
                                                        <?php break; ?>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </div>
                                            <div class="offer_container_wrapper_description">
                                                <div class="offer_container_wrapper_title">
                                                    <h3><?= $this->Html->link(__(h($offer->name)), ['controller' => 'Offers', 'action' => 'view', $offer->id]) ?></h3>
                                                </div>
                                                <div class="offer_container_wrapper_stars">
                                                    <?php foreach ($averages as $average) : ?>
                                                        <?php if ($average['offer_id'] == $offer->id) : ?>
                                                            <?php if ($average['avg'] > 0): ?>
                                                                <div class="rating-combo">
                                                                    <?= $this->Html->image('rating-star.svg') ?>
                                                                    <h4><?= $average['avg'] ?></h4>
                                                                </div>
                                                            <?php else: ?>
                                                                <h4>Brak ocen</h4>
                                                            <?php endif ?>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </div>
                                                <div class="offer_container_wrapper_description"><?= h($offer->description) ?></div>
                                            </div>
                                            <div class="offer_container_edit_button">
                                                <?php if ($user->id == $id_user_log) : ?>
                                                    <?= $this->Form->postLink(__($this->Html->image('heart-icon.svg', ['alt' => 'Heart icon'])), ['controller' => 'SavedUserOffers', 'action' => 'delete', $offer->id], ['confirm' => __('Czy napewno chcesz usunac te oferte z ulubionych?'), 'escape' => false]) ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

