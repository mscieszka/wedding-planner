<?= $this->Html->css('addOffer') ?>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Offer $offer
 * @var \Cake\Collection\CollectionInterface|string[] $users
 * @var \Cake\Collection\CollectionInterface|string[] $categories
 * @var \Cake\Collection\CollectionInterface|string[] $addresses
 */
?>
<div class="row">

            <div class="column-responsive column-80">
            <?= $this->Html->link(__('New Offer of Catering'), ['action' => 'add', 3 ], ['class' => 'button float-right']) ?>
            <?= $this->Html->link(__('New Offer of Music'), ['action' => 'add', 2], ['class' => 'button float-right']) ?>
                <?= $this->Html->link(__('New Offer of Hall'), ['action' => 'add', 1], ['class' => 'button float-right']) ?>
        </div>

</div>
