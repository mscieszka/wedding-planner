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
                <div class="current_bookmarks">Otrzymane oceny</div>
                <?php if($user->id == $id_user_log):?>
                <div><?= $this->Html->link(__('Zamowienia'), ['action' => 'profile', 3, $user->id]) ?></div>
            <?php endif; ?>
            <?php endif; ?>


            <?php if($user->account_type_id==1): ?>
                <div><?= $this->Html->link(__('Oferty obserwowane'), ['action' => 'profile', 1, $user->id]) ?></div>
                <div class="current_bookmarks">Dodane oceny</div>
                <?php if($user->id == $id_user_log):?>
                <div><?= $this->Html->link(__('Zamowienia'), ['action' => 'profile', 3, $user->id]) ?></div>
            <?php endif; ?>
            <?php endif;?>

        </div>



        <div class="users view content">
            <div class="users view content_header">
                <div class="users view content_header_first">Ocena</div>
                <div class="users view content_header_second" style="width: 75%; padding-left: 1em;">Opinie</div>
            </div>
            <div class="container_box">
                <div class="users view content_wrapper" style="display: flex; justify-content: space-around">
                    <div class="users view content_wrapper_box">
                        <div>
                            <div style="color: #000; font-size: 2em; height: 50%;">5.0</div>
                            <div style="color: gold; font-size: 2em; height: 50%;">*****</div>
                        </div>
                    </div>
                </div>
                <div class="opinion-box-wrapper">
             <?php foreach ($user->ratings as $rating): ?>

                    <div class="opinion-box_provider">
                        <a class="user-img_provider">
                            <?= $this->Html->image('userProfileImage/userProfileImage1.jpg', ['alt' => 'User profile image', 'class' => 'userimg'])  ?>
                        </a>
                        <div class="upper-box_provider">
                            <h3><?= $rating->has('user') ? $this->Html->link($rating->user->name, ['controller' => 'Users', 'action' => 'profile', 1, $rating->user->id]) : '' ?></h3>
                            <h4><?= $rating->has('offer') ? $this->Html->link($rating->offer->name, ['controller' => 'Offers', 'action' => 'view', $rating->offer->id]) : '' ?></h4>
                            <blockquote>
                                <?= $this->Text->autoParagraph(h($rating->description)); ?>
                            </blockquote>
                        </div>
                        <div class="opinion-content_provider">
                            <h4><?= h($rating->opinion_date) ?></h4>
                        </div>

                    </div>
                <?php endforeach; ?>
                </div>
            </div>
        </div>
