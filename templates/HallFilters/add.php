<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\HallFilter $hallFilter
 * @var \Cake\Collection\CollectionInterface|string[] $offers
 * @var \Cake\Collection\CollectionInterface|string[] $hallTypes
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Hall Filters'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="hallFilters form content">
            <?= $this->Form->create($hallFilter) ?>
            <fieldset>
                <legend><?= __('Add Hall Filter') ?></legend>
                <?php
                    echo $this->Form->control('offer_id', ['options' => $offers]);
                    echo $this->Form->control('hall_type_id', ['options' => $hallTypes]);
                    echo $this->Form->control('air_conditioning');
                    echo $this->Form->control('garden');
                    echo $this->Form->control('terrace');
                    echo $this->Form->control('bar');
                    echo $this->Form->control('stage');
                    echo $this->Form->control('number_beds');
                    echo $this->Form->control('number_people');
                    echo $this->Form->control('price_for_the_night');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
