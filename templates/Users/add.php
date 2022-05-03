<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 * @var \Cake\Collection\CollectionInterface|string[] $accountTypes
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users form content">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('Add User') ?></legend>
                <?php
                    echo $this->Form->control('email');
                    echo $this->Form->control('password');
                    echo $this->Form->control('name');
                    echo $this->Form->control('surname');
                    echo $this->Form->control('phone_number');
                    echo $this->Form->control('enabled');
                    echo $this->Form->control('confirmed_email');
                    echo $this->Form->control('company_name');
                    echo $this->Form->control('krs');
                    echo $this->Form->control('nip');
                    echo $this->Form->control('regon');
                    echo $this->Form->control('account_type_id', ['options' => $accountTypes]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
