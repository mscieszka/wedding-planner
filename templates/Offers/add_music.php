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

    <?= $this->Form->create($offer, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Add Music Filter') ?></legend>
        <?php
        echo $this->Form->control('music_filter.disco_polo', ['type' => 'checkbox']);
        echo $this->Form->control('music_filter.pop', ['type' => 'checkbox']);
        echo $this->Form->control('music_filter.rock', ['type' => 'checkbox']);
        echo $this->Form->control('music_filter.oldies', ['type' => 'checkbox']);
        echo $this->Form->control('music_filter.world_music', ['type' => 'checkbox']);
        echo $this->Form->control('music_filter.running_games', ['type' => 'checkbox']);
        echo $this->Form->control('attachment[]', ['type' => 'file','multiple'=>true]);
        ?>
    </fieldset>
    <?php include('offer_add_contents.php') ?>
    <?= $this->Form->end() ?>
</div>
