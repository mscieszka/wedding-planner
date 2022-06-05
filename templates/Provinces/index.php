<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Province[]|\Cake\Collection\CollectionInterface $provinces
 */
?>
<?= $this->Html->css('provinces') ?>
<div class="provinces-index-content">
    <h3><?= __('Wyświetl oferty wg województwa') ?></h3>
    <div class="table-responsive">
            <h4><?= $this->Paginator->sort('name', 'Województwo', ['direction' => 'asc']) ?></h4>
            <div class="single-province">
            <?php foreach ($provinces as $province) : ?>
                <h5><?= $this->Html->link(h($province->name), ['action' => 'view', $province->id]) ?></h5>
            <?php endforeach; ?>
            </div>
    </div>
</div>
