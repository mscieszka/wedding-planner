<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Address $address
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $provinces
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $address->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $address->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Addresses'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="addresses form content">
            <?= $this->Form->create($address) ?>
            <fieldset>
                <legend><?= __('Edit Address') ?></legend>
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
