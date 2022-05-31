<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>
<?= $this->Html->css('viewOffers') ?>
<?php include_once('C:\xampp\htdocs\wedding-planner\templates\layout\header\header-only-search.php'); ?>
<div class="row">
    <aside class="column">
    <?php
        if ($category->id == 1) include_once('C:\xampp\htdocs\wedding-planner\templates\Offers\offers_filters\offers_filters_hall.php');
        elseif ($category->id == 2) include_once('C:\xampp\htdocs\wedding-planner\templates\Offers\offers_filters\offers_filters_dj.php');
        elseif ($category->id == 3) include_once('C:\xampp\htdocs\wedding-planner\templates\Offers\offers_filters\offers_filters_catering.php');
    ?>
    </aside>
    <div class="column-responsive column-80">
        <div class="categories-view-content">
            <div class="related">
                <?php if (!empty($category->offers)) : ?>
                <div class="table-responsive">
                    <table>
                        <?php foreach ($category->offers as $offers) : ?>
                        <tr>
                            <td class="offer-img"><?= $this->Html->image('offerImages/dj1_1.jpg', ['alt' => 'Offer Image', 'class' => 'offerimg']) ?></td>
                            <td class="offer-name"><?= $this->Html->link(__($offers->name), ['controller' => 'Offers', 'action' => 'view', $offers->id]) ?></td>
                            <td class="offer-price">
                                <h3><?= h($offers->price) . " zł" ?></h3>
                            </td>
                            <?php if($account_type_id == 1): ?>
                                <?php if(in_array($offers->id, $saved_user_offers)): ?>
                            <td class="offer-name"><?= $this->Form->postLink(__('Remove from favourites'), ['controller' => 'SavedUserOffers', 'action' => 'delete', $offers->id], ['confirm' => __('Are you sure you want to remove from favourites?')]) ?></td>
                                <?php else: ?>
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
