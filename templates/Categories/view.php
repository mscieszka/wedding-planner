<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>
<?= $this->Html->css('viewOffers') ?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <?php if($account_type_id == 2): ?>
                <?= $this->Html->link(__('Dodaj nową ofertę'), ['controller' => 'Offers', 'action' => 'add', h($category->id)]) ?>
            <?php endif; ?>
        </div>
        <?php
        if ($category->id == 1) include_once('./templates/Offers/offers_filters/offers_filters_hall.php');
        elseif ($category->id == 2) include_once('./templates/Offers/offers_filters/offers_filters_dj.php');
        elseif ($category->id == 3) include_once('./templates/Offers/offers_filters/offers_filters_catering.php');
        ?>
    </aside>

    <div class="column-responsive column-80">
        <div class="categories view content">
            <div class="related">
                <?php if (!empty($category->offers)) : ?>
                <div class="table-responsive">
                    <table>
                        <?php foreach ($category->offers as $offers) : ?>
                        <tr>
                            <td><?= $this->Html->link(__($offers->name), ['controller' => 'Offers', 'action' => 'view', $offers->id]) ?></td>
                            <td><?= h($offers->price) ?></td>
                            <td><?= h($offers->description) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
