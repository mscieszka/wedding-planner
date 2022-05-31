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
        <legend><?= __('Add Hall Filter') ?></legend>
        <?php
        echo $this->Form->control('hall_filter.hall_type_id', ['options' => $hallTypes]);
        echo $this->Form->control('hall_filter.air_conditioning', ['type'=>'checkbox']);
        echo $this->Form->control('hall_filter.garden', ['type'=>'checkbox']);
        echo $this->Form->control('hall_filter.terrace', ['type'=>'checkbox']);
        echo $this->Form->control('hall_filter.bar', ['type'=>'checkbox']);
        echo $this->Form->control('hall_filter.stage', ['type'=>'checkbox']);
        echo $this->Form->control('hall_filter.number_beds', ['type'=>'number']);
        echo $this->Form->control('hall_filter.number_people', ['type'=>'number']);
        echo $this->Form->control('hall_filter.price_for_the_night', ['type'=>'number', 'step'=>0.01]);
        ?>
    </fieldset>
    <?php include('offer_add_contents.php') ?>
    <?= $this->Form->end() ?>
</div>
