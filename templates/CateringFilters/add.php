<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CateringFilter $cateringFilter
 * @var \Cake\Collection\CollectionInterface|string[] $offers
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Catering Filters'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="cateringFilters form content">
            <?= $this->Form->create($cateringFilter) ?>
            <fieldset>
                <legend><?= __('Add Catering Filter') ?></legend>
                <?php
                    echo $this->Form->control('offer_id', ['options' => $offers]);
                    echo $this->Form->control('polish');
                    echo $this->Form->control('italian');
                    echo $this->Form->control('american');
                    echo $this->Form->control('french');
                    echo $this->Form->control('asian');
                    echo $this->Form->control('vegan');
                    echo $this->Form->control('vegetarian');
                    echo $this->Form->control('gluten_free');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
