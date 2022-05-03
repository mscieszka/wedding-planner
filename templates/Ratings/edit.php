<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rating $rating
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $offers
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $rating->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $rating->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Ratings'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="ratings form content">
            <?= $this->Form->create($rating) ?>
            <fieldset>
                <legend><?= __('Edit Rating') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('offer_id', ['options' => $offers]);
                    echo $this->Form->control('rating');
                    echo $this->Form->control('description');
                    echo $this->Form->control('opinion_date');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
