<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 * @var \App\Model\Entity\Offer $offer
 * @var \Cake\Collection\CollectionInterface|string[] $offers
 */

use Cake\Filesystem\Folder;

?>
<?= $this->Html->css(['viewUser', 'miligram.min', 'normalize.min', 'viewProvider', 'profile-banner']) ?>
<div class="row">
    <div class="column-responsive column-80 ">
        <?= $this->element('profile-banners/user-profile-banner'); ?>

        <div class="bookmarks_wrapper">
            <?php if ($user->account_type_id == 2) : ?>
                <div><?= $this->Html->link(__('Oferty użytkownika'), ['action' => 'profile', 1, $user->id]) ?></div>
                <div class="current_bookmarks">Otrzymane oceny</div>
                <?php if ($user->id == $id_user_log) : ?>
                    <div><?= $this->Html->link(__('Zamowienia'), ['action' => 'profile', 3, $user->id]) ?></div>
                <?php endif; ?>
            <?php endif; ?>

            <?php if ($user->account_type_id == 1) : ?>
                <div><?= $this->Html->link(__('Oferty obserwowane'), ['action' => 'profile', 1, $user->id]) ?></div>
                <div class="current_bookmarks">Dodane oceny</div>
                <?php if ($user->id == $id_user_log) : ?>
                    <div><?= $this->Html->link(__('Zamowienia'), ['action' => 'profile', 3, $user->id]) ?></div>
                <?php endif; ?>
            <?php endif; ?>

        </div>


        <?php if ($user->account_type_id == 2) : ?>
        <?php
        $wynik = 0.0;
        $licznik = -1;

        foreach ($averages as $average)
        {
             if (in_array($average['offer_id'], $his_offers))
             {
                 $wynik = $wynik + $average['avg'];
                 $licznik = 1 + $licznik;
             }
        }
        if ($licznik != 0) {
            $wynik2 = $wynik / $licznik;
        }
        else {
            $wynik2 = 0;
        }
        ?>
<?php endif; ?>
        <div class="users view content">
            <div class="users view content_header">
                <?php if ($user->account_type_id == 2) : ?>
                <div class="users view content_header_first">Ocena</div>
                <?php endif; ?>
                <div class="users view content_header_second" style="width: 75%; padding-left: 1em;">Opinie</div>
            </div>


            <?php if ($user->account_type_id == 2) : ?>
            <div class="container_box">
                <div class="users view content_wrapper" style="display: flex; justify-content: space-around">
                    <div class="users view content_wrapper_box">
                        <div class="rating-combo">
                            <?php if ($wynik2 > 0): ?>
                                <?= $this->Html->image('rating-star.svg') ?>
                                <h4><?= $wynik2 ?></h4>
                            <?php else: ?>
                                <h4>Brak ocen</h4>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>


                <div class="opinion-box-wrapper">
                    <?php if ($user->account_type_id == 2) : ?>
                        <?php if (!empty($ratings)) : ?>
                            <?php foreach ($ratings as $rating) : ?>
                                <?php if (!(in_array($rating->offer_id, $his_offers))) : continue; ?>
                                <?php endif; ?>

                                <div class="opinion-box_provider">
                                    <a class="user-img_provider">

                                        <?php
                                        $path = WWW_ROOT.'img'.DS.'userProfileImage'.DS. $rating->user_id;
                                        if(!file_exists($path)) {
                                            $path = new Folder($path, true, 777);
                                        } else {
                                            $path = new Folder($path);
                                        }
                                        $files = $path->find();
                                        ?>

                                        <?php if (empty($files)) : ?>
                                            <?= $this->Html->image('userProfileImage/no-profile-img.png', [
                                                'alt' => 'User profile image',
                                                'class' => 'userimg'
                                            ]) ?>
                                        <?php endif; ?>


                                        <?php if (!empty($files)) : ?>
                                            <?php foreach($files as $file): ?>
                                                <?php $filePath = 'userProfileImage/'.(int)$rating->get('user_id').'/'.$file; ?>
                                                <?= $this->Html->image($filePath, [
                                                    'alt' => 'User profile image',
                                                    'class' => 'userimg'
                                                ]) ?>
                                                <?php break; ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>

                                    </a>
                                    <div class="upper-box_provider">
                                        <span style="width: 18%"><?= $rating->has('user') ? $this->Html->link($rating->user->name, ['controller' => 'Users', 'action' => 'profile', 1, $rating->user->id]) : '' ?></span>
                                        <span style="width: 18%">Ocena: <?= $rating->rating?></span>
                                        <p style="width: 5%">do</p>
                                        <span style="width: 15%"><?= $rating->has('offer') ? $this->Html->link($rating->offer->name, ['controller' => 'Offers', 'action' => 'view', $rating->offer->id]) : '' ?></span>
                                        <blockquote style="width: 50%">
                                            <?= $this->Text->autoParagraph(h($rating->description)); ?>
                                        </blockquote>
                                        <?= h($rating->opinion_date) ?>
                                    </div>
                                    <div class="opinion-remove">
                                        <?php if ($rating->user_id == $id_user_log) : ?>
                                            <td class="offer-name"><?= $this->Form->postLink(__('Usuń komentarz'), ['controller' => 'Ratings', 'action' => 'delete', $rating->id], ['confirm' => __('Czy na pewno chcesz usunąć ten komentarz?')]) ?></td>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if ($user->account_type_id == 1) : ?>
                        <?php if (!empty($ratings)) : ?>
                            <?php foreach ($ratings as $rating) : ?>
                                <?php if ($rating->user_id == $user->id) :  ?>
                                    <div class="opinion-box_provider">
                                        <a class="user-img_provider">
                                            <?php
                                            $path = WWW_ROOT.'img'.DS.'userProfileImage'.DS. $rating->user_id;
                                            if(!file_exists($path)) {
                                                $path = new Folder($path, true, 777);
                                            } else {
                                                $path = new Folder($path);
                                            }
                                            $files = $path->find();
                                            ?>

                                            <?php if (empty($files)) : ?>
                                                <?= $this->Html->image('userProfileImage/brak_zdjecia.png', [
                                                    'alt' => 'User profile image',
                                                    'class' => 'userimg'
                                                ]) ?>
                                            <?php endif; ?>


                                            <?php if (!empty($files)) : ?>
                                                <?php foreach($files as $file): ?>
                                                    <?php $filePath = 'userProfileImage/'.(int)$rating->get('user_id').'/'.$file; ?>
                                                    <?= $this->Html->image($filePath, [
                                                        'alt' => 'User profile image',
                                                        'class' => 'userimg'
                                                    ]) ?>
                                                    <?php break; ?>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </a>
                                        <div class="upper-box_provider">
                                            <span style="width: 18%"><?= $rating->has('user') ? $this->Html->link($rating->user->name, ['controller' => 'Users', 'action' => 'profile', 1, $rating->user->id]) : '' ?></span>
                                            <span style="width: 18%"><div class="rating-combo">
                                                        <?= $this->Html->image('rating-star.svg') ?>
                                                        <h4><?= $rating->rating ?></h4>
                                                    </div></span>

                                            <p style="width: 5%">do</p>
                                            <span style="width: 15%"><?= $rating->has('offer') ? $this->Html->link($rating->offer->name, ['controller' => 'Offers', 'action' => 'view', $rating->offer->id]) : '' ?></span>
                                            <blockquote style="width: 50%">
                                                <?= $this->Text->autoParagraph(h($rating->description)); ?>
                                            </blockquote>
                                            <?= h($rating->opinion_date) ?>
                                        </div>

                                        <div class="opinion-remove">
                                            <?php if ($rating->user_id == $id_user_log) : ?>
                                                <td class="offer-name"><?= $this->Form->postLink(__('Usuń opinię'), ['controller' => 'Ratings', 'action' => 'delete', $rating->id], ['confirm' => __('Czy na pewno chcesz usunąć opinię?')]) ?></td>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
