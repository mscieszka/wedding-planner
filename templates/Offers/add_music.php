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
        <h3><?= __('Zdjęcia') ?></h3>
        <?= $this->Form->control('attachment[]', [
            'type' => 'file',
            'multiple'=>true,
            'label' => false
        ]); ?>
    </fieldset>

    <fieldset>
        <label for="filter-music-type"><?= __('Gatunek muzyki') ?></label>
        <div class="filter-music-type">
            <?php
            echo $this->Form->control('music_filter.disco_polo', [
                'type' => 'checkbox'
            ]);
            echo $this->Form->control('music_filter.pop', [
                'type' => 'checkbox'
            ]);
            echo $this->Form->control('music_filter.rock', [
                'type' => 'checkbox'
            ]);
            echo $this->Form->control('music_filter.oldies', [
                'type' => 'checkbox'
            ]);
            echo $this->Form->control('music_filter.world_music', [
                'type' => 'checkbox',
                'label' => __('Muzyka światowa')
            ]); ?>
        </div>
        <label for="filter-music-additional-info"><?= __('Dodatkowe informacje') ?></label>
        <div class="filter-music-additional-info">
            <?php echo $this->Form->control('music_filter.running_games', [
                'type' => 'checkbox',
                'label' => __('Prowadzenie zabaw')
            ]);
            ?>
        </div>
    </fieldset>
    <?php include('offer_add_contents.php') ?>
    <?= $this->Form->end() ?>
</div>
