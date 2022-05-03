<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Address $address
 * @var \Cake\Collection\CollectionInterface|string[] $users
 * @var \Cake\Collection\CollectionInterface|string[] $provinces
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Addresses'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="addresses form content">
            <?= $this->Form->create($address) ?>
            <fieldset>
                <legend><?= __('Add Address') ?></legend>
                <?php
                    echo $this->Form->control('street');
                    echo $this->Form->control('house_number');
                    echo $this->Form->control('postal_code');
                    echo $this->Form->control('city');
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('province_id', ['options' => $provinces, 'empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
