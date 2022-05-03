<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Offer $offer
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $categories
 * @var string[]|\Cake\Collection\CollectionInterface $addresses
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $offer->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $offer->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Offers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="offers form content">
            <?= $this->Form->create($offer) ?>
            <fieldset>
                <legend><?= __('Edit Offer') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('category_id', ['options' => $categories]);
                    echo $this->Form->control('address_id', ['options' => $addresses]);
                    echo $this->Form->control('name');
                    echo $this->Form->control('price');
                    echo $this->Form->control('description');
                    echo $this->Form->control('advance_payment');
                    echo $this->Form->control('website');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
