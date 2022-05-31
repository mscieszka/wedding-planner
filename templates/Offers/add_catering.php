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
<div class="offers form content">
    <?php include('offer_add_categories.php') ?>

    <?= $this->Form->create($offer) ?>
    <fieldset>
        <legend><?= __('Add Catering Filter') ?></legend>
        <?php
        echo $this->Form->control('catering_filter.polish', ['type'=>'checkbox']);
        echo $this->Form->control('catering_filter.italian', ['type'=>'checkbox']);
        echo $this->Form->control('catering_filter.american', ['type'=>'checkbox']);
        echo $this->Form->control('catering_filter.french', ['type'=>'checkbox']);
        echo $this->Form->control('catering_filter.asian', ['type'=>'checkbox']);
        echo $this->Form->control('catering_filter.vegan', ['type'=>'checkbox']);
        echo $this->Form->control('catering_filter.vegetarian', ['type'=>'checkbox']);
        echo $this->Form->control('catering_filter.gluten_free', ['type'=>'checkbox']);
        ?>
    </fieldset>
    <?php include('offer_add_contents.php') ?>
    <?= $this->Form->end() ?>
</div>

