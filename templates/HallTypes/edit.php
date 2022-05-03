<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\HallType $hallType
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $hallType->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $hallType->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Hall Types'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="hallTypes form content">
            <?= $this->Form->create($hallType) ?>
            <fieldset>
                <legend><?= __('Edit Hall Type') ?></legend>
                <?php
                    echo $this->Form->control('type');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
