<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OfferActiveDay $offerActiveDay
 * @var \Cake\Collection\CollectionInterface|string[] $offers
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Offer Active Days'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="offerActiveDays form content">
            <?= $this->Form->create($offerActiveDay) ?>
            <fieldset>
                <legend><?= __('Add Offer Active Day') ?></legend>
                <?php
                echo $this->Form->control('offer_id', ['options' => $offers]);
                echo $this->Form->control('monday');
                echo $this->Form->control('tuesday');
                echo $this->Form->control('wednesday');
                echo $this->Form->control('Thursday');
                echo $this->Form->control('friday');
                echo $this->Form->control('saturday');
                echo $this->Form->control('sunday');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
