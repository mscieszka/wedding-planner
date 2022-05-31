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

<div class="categories-nav services">
    <div class ="serv">
        <div  class="service-type">
            <?= $this->Html->image('sale.svg', ['alt' => 'Wedding Planner']); ?>
            <?= $this->Html->link(__('Sale'), ['action' => 'add', 1], ['class' => 'btn-category'] )?>
        </div>
        <div  class="service-type">
            <?= $this->Html->image('dj.svg', ['alt' => 'Wedding Planner']); ?>
            <?= $this->Html->link(__('Zespół muzyczny / DJ'), ['action' => 'add', 2],['class' => 'btn-category'] )?>
        </div>
        <div  class="service-type">
            <?= $this->Html->image('catering.svg', ['alt' => 'Wedding Planner', 'class' => 'catering-img']); ?>
            <?= $this->Html->link(__('Catering'), ['action' => 'add', 3], ['class' => 'btn-category'] )?>
        </div>
    </div>
</div>
