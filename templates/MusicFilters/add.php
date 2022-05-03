<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MusicFilter $musicFilter
 * @var \Cake\Collection\CollectionInterface|string[] $offers
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Music Filters'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="musicFilters form content">
            <?= $this->Form->create($musicFilter) ?>
            <fieldset>
                <legend><?= __('Add Music Filter') ?></legend>
                <?php
                    echo $this->Form->control('offer_id', ['options' => $offers]);
                    echo $this->Form->control('disco_polo');
                    echo $this->Form->control('pop');
                    echo $this->Form->control('rock');
                    echo $this->Form->control('oldies');
                    echo $this->Form->control('world_music');
                    echo $this->Form->control('running_games');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
