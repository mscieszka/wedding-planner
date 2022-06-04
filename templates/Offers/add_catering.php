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
        <h3><?= __('Rodzaj kuchni') ?></h3>
        <?php
        echo $this->Form->control('catering_filter.polish', [
            'type' => 'checkbox',
            'label' => __('polska')
        ]);
        echo $this->Form->control('catering_filter.italian', [
            'type' => 'checkbox',
            'label' => __('włoska')
        ]);
        echo $this->Form->control('catering_filter.american', [
            'type' => 'checkbox',
            'label' => __('amerykańska')
        ]);
        echo $this->Form->control('catering_filter.french', [
            'type' => 'checkbox',
            'label' => __('francuska')
        ]);
        echo $this->Form->control('catering_filter.asian', [
            'type' => 'checkbox',
            'label' => __('azjatycka')
        ]);
        echo $this->Form->control('catering_filter.vegan', [
            'type' => 'checkbox',
            'label' => __('wegańska')
        ]);
        echo $this->Form->control('catering_filter.vegetarian', [
            'type' => 'checkbox',
            'label' => __('wegetariańska')
        ]);
        echo $this->Form->control('catering_filter.gluten_free', [
            'type' => 'checkbox',
            'label' => __('bezglutenowa')
        ]);
        ?>
    </fieldset>
    <?php include('offer_add_contents.php') ?>
    <?= $this->Form->end() ?>
</div>
