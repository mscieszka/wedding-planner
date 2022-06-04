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
        <label for="filter-additional">Dodatki</label>
        <div class="filter-additional">
            <?php
            echo $this->Form->control('hall_filter.air_conditioning', [
            'type' => 'checkbox',
            'label' => __('Klimatyzacja')
            ]);
            echo $this->Form->control('hall_filter.garden', [
            'type' => 'checkbox',
            'label' => __('Ogród')
            ]);
            echo $this->Form->control('hall_filter.terrace', [
            'type' => 'checkbox',
            'label' => __('Taras')
            ]);
            echo $this->Form->control('hall_filter.bar', [
            'type' => 'checkbox',
            'label' => __('Bar')
            ]);
            echo $this->Form->control('hall_filter.stage', [
            'type' => 'checkbox',
            'label' => __('Scena')
            ]);
            ?>
        </div>
        <?php
        echo $this->Form->control('hall_filter.hall_type_id', [
            'options' => $hallTypes,
            'label' => __('Rodzaj lokalu')
        ]);

        echo $this->Form->control('hall_filter.number_beds', [
            'type' => 'number',
            'label' => __('Miejsc noclegowych'),
            'min' => 0
        ]);
        echo $this->Form->control('hall_filter.number_people', [
            'type' => 'number',
            'label' => __('Maksymalna liczba gości'),
            'min' => 1
        ]);
        echo $this->Form->control('hall_filter.price_for_the_night', [
            'type' => 'number',
            'step' => 1,
            'min' => 0,
            'label' => __('Cena noclegu za osobę')
        ]);
        ?>
    </fieldset>
    <?php include('offer_add_contents.php') ?>
    <?= $this->Form->end() ?>
</div>
