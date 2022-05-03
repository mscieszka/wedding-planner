<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MusicFilter $musicFilter
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Music Filter'), ['action' => 'edit', $musicFilter->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Music Filter'), ['action' => 'delete', $musicFilter->id], ['confirm' => __('Are you sure you want to delete # {0}?', $musicFilter->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Music Filters'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Music Filter'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="musicFilters view content">
            <h3><?= h($musicFilter->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Offer') ?></th>
                    <td><?= $musicFilter->has('offer') ? $this->Html->link($musicFilter->offer->name, ['controller' => 'Offers', 'action' => 'view', $musicFilter->offer->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($musicFilter->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($musicFilter->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Disco Polo') ?></th>
                    <td><?= $musicFilter->disco_polo ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Pop') ?></th>
                    <td><?= $musicFilter->pop ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Rock') ?></th>
                    <td><?= $musicFilter->rock ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Oldies') ?></th>
                    <td><?= $musicFilter->oldies ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('World Music') ?></th>
                    <td><?= $musicFilter->world_music ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Running Games') ?></th>
                    <td><?= $musicFilter->running_games ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
