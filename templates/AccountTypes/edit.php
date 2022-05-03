<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AccountType $accountType
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $accountType->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $accountType->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Account Types'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="accountTypes form content">
            <?= $this->Form->create($accountType) ?>
            <fieldset>
                <legend><?= __('Edit Account Type') ?></legend>
                <?php
                    echo $this->Form->control('account_name');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
