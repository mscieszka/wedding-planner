<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>
<?= $this->Html->css('viewOffers') ?>
<?= $this->element('header/header-only-search'); ?>
<div class="row">
    <?php if ($category->id == 1) : ?>
        <aside class="column">
            <?= $this->element('offers_filters/offers_filters_hall'); ?>
        </aside>
    <?php elseif ($category->id == 2) : ?>
        <aside class="column">
            <?= $this->element('offers_filters/offers_filters_dj'); ?>
        </aside>
    <?php elseif ($category->id == 3) : ?>
        <aside class="column">
            <?= $this->element('offers_filters/offers_filters_catering'); ?>
        </aside>
    <?php endif; ?>
    <div class="column-responsive column-80">
        <div class="categories-view-content">
            <div class="related">
                <?php if (!empty($category->offers)) : ?>
                    <div class="table-responsive">
                        <table>
                            <?php foreach ($category->offers as $offers) : ?>
                            <?php
                                $search_param = '';
                                if ($category->id == 2) {
                                    if ($offers['music_filter']->disco_polo) {
                                        $search_param .= ' music_type_disco_polo = "1" ';
                                    }
                                    if ($offers['music_filter']->pop) {
                                        $search_param .= ' music_type_pop = "1" ';
                                    }
                                    if ($offers['music_filter']->rock) {
                                        $search_param .= ' music_type_rock = "1" ';
                                    }
                                    if ($offers['music_filter']->oldies) {
                                        $search_param .= ' music_type_oldies = "1" ';
                                    }
                                    if ($offers['music_filter']->world_music) {
                                        $search_param .= ' music_type_global = "1" ';
                                    }
                                    if ($offers['music_filter']->running_games) {
                                        $search_param .= ' dj_additional_info_wedding_games = "1" ';
                                    }
                                    $search_param .= ' info = "' . $offers->name . '" ';
                                }
                            ?>
                                <tr class="offer" <?= $search_param ?>>
                                    <td class="offer-img"><?= $this->Html->image('offerImages/dj1_1.jpg', ['alt' => 'Offer Image', 'class' => 'offerimg']) ?></td>
                                    <td class="offer-name"><?= $this->Html->link(__($offers->name), ['controller' => 'Offers', 'action' => 'view', $offers->id]) ?></td>
                                    <td class="offer-price">
                                        <h3><?= h($offers->price) . " zł" ?></h3>
                                    </td>
                                    <?php if ($account_type_id == 1) : ?>
                                        <?php if (in_array($offers->id, $saved_user_offers)) : ?>
                                            <td class="offer-name"><?= $this->Form->postLink(__('Remove from favourites'), ['controller' => 'SavedUserOffers', 'action' => 'delete', $offers->id], ['confirm' => __('Are you sure you want to remove from favourites?')]) ?></td>
                                        <?php else : ?>
                                            <td class="offer-name"><?= $this->Html->link(__('Add to favourite'), ['controller' => 'SavedUserOffers', 'action' => 'add', $offers->id]) ?></td>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
