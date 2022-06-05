<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */

use Cake\Filesystem\Folder;

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
                        <table id="offers-table">
                        <?php foreach ($category->offers as $offers) : ?>
                            <?php $search_param = '';
                            if ($category->id == 1) {
                                if ($offers['hall_filter']->air_conditioning) {
                                    $search_param .= ' extras_air_conditioning = "1" ';
                                }
                                if ($offers['hall_filter']->garden) {
                                    $search_param .= ' extras_garden = "1" ';
                                }
                                if ($offers['hall_filter']->terrace) {
                                    $search_param .= ' extras_terrace = "1" ';
                                }
                                if ($offers['hall_filter']->bar) {
                                    $search_param .= ' extras_bar = "1" ';
                                }
                                if ($offers['hall_filter']->stage) {
                                    $search_param .= ' extras_stage = "1" ';
                                }

                                if ($offers['hall_filter']->hall_type_id == 1) {
                                    $search_param .= ' business_type_restaurant = "1" ';
                                }
                                if ($offers['hall_filter']->hall_type_id == 2) {
                                    $search_param .= ' business_type_wedding_hall = "1" ';
                                }
                                if ($offers['hall_filter']->hall_type_id == 3) {
                                    $search_param .= ' business_type_wedding_house = "1" ';
                                }
                                $search_param .= ' info = "' . $offers->name . '" ';
                            }
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
                            if ($category->id == 3) {
                                if ($offers['catering_filter']->polish) {
                                    $search_param .= ' cuisine_type_polish = "1" ';
                                }
                                if ($offers['catering_filter']->italian) {
                                    $search_param .= ' cuisine_type_italian = "1" ';
                                }
                                if ($offers['catering_filter']->american) {
                                    $search_param .= ' cuisine_type_usa = "1" ';
                                }
                                if ($offers['catering_filter']->french) {
                                    $search_param .= ' cuisine_type_french = "1" ';
                                }
                                if ($offers['catering_filter']->asian) {
                                    $search_param .= ' cuisine_type_asian = "1" ';
                                }
                                if ($offers['catering_filter']->vegan) {
                                    $search_param .= ' additional_info_wegan = "1" ';
                                }
                                if ($offers['catering_filter']->vegetarian) {
                                    $search_param .= ' additional_info_wegetarian = "1" ';
                                }
                                if ($offers['catering_filter']->gluten_free) {
                                    $search_param .= ' additional_info_gluten_free = "1" ';
                                }
                                $search_param .= ' info = "' . $offers->name . '" ';
                            }
                            ?>
                            <tr class="offer" <?= $search_param ?>>
                                <td class="offer-img">
                                    <?php
                                    $path = WWW_ROOT . 'img' . DS . 'offerImages' . DS . $offers->id;
                                    if (!file_exists($path)) {
                                        $path = new Folder($path, true, 777);
                                    } else {
                                        $path = new Folder($path);
                                    }
                                    $files = $path->find(); ?>

                                    <?php if (empty($files)) : ?>
                                        <div class="offer-img"><?= $this->Html->image('offerImages/dj1_1.jpg', ['alt' => 'Offer Image', 'class' => 'offer-img']) ?></div>
                                    <?php endif; ?>

                                    <?php if (!empty($files)) : ?>
                                        <?php foreach ($files as $file) : ?>
                                            <?php $filePath = 'offerImages/' . (int)$offers->get('id') . '/' . $file; ?>
                                            <?= $this->Html->image($filePath, ['alt' => 'Offer image', 'class' => 'offer-pic']) ?>
                                            <?php break; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </td>
                                <td class="offer-desc">
                                    <div class="offer-title-rating-combo">
                                        <h1><?= $this->Html->link(__($offers->name), ['controller' => 'Offers', 'action' => 'view', $offers->id]) ?></h1>
                                        <?php foreach ($averages as $average) : ?>
                                            <?php if ($average['offer_id'] == $offers->id and $average['avg'] != 0.0) : ?>
                                                <div class="rating-combo">
                                                    <?= $this->Html->image('rating-star.svg') ?>
                                                    <h4><?= $average['avg'] ?></h4>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>
                                    <h3><?= h($offers->price) . " zł" ?></h3>
                                    <?php foreach ($offers_all as $oferta) : ?>
                                        <?php if($oferta->id == $offers->id): ?>
                                            <?php foreach ($adresy_all as $adres) : ?>
                                                <?php if($oferta->address_id == $adres->id): ?>
                                                    <h4 class="offer-address"><?= h($oferta->address->city) .', '.h($adres->province->name) ?></h4>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </td>
                                <td class="offer-fav">
                                    <?php if ($account_type_id == 1) : ?>
                                        <?php if (in_array($offers->id, $saved_user_offers)) : ?>
                                            <?= $this->Form->postLink(__($this->Html->image('heart-icon.svg', ['alt' => 'Heart icon'])), ['controller' => 'SavedUserOffers', 'action' => 'delete', $offers->id], ['escape' => false]) ?>
                                        <?php else : ?>
                                            <?= $this->Html->link(__($this->Html->image('heart-icon2.svg', ['alt' => 'Heart icon'])), ['controller' => 'SavedUserOffers', 'action' => 'add', $offers->id], ['escape' => false]) ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script>
    function searchCity() {
        let td, offerAddress;
        const searchInput = document.getElementById("input_search_place");
        const searchValue = searchInput.value.toLowerCase();
        const table = document.getElementById("offers-table");
        const tr = table.getElementsByTagName("tr");
        console.log("Szukam: " + searchValue);
        for (let i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByClassName("offer-address");
            if (td != null) {
                offerAddress = td[0].innerHTML;
                if (offerAddress.toLowerCase().indexOf(searchValue) !== -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
