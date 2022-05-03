<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MusicFilter[]|\Cake\Collection\CollectionInterface $musicFilters
 */
?>
<div class="musicFilters index content">
    <?= $this->Html->link(__('New Music Filter'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Music Filters') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('offer_id') ?></th>
                    <th><?= $this->Paginator->sort('disco_polo') ?></th>
                    <th><?= $this->Paginator->sort('pop') ?></th>
                    <th><?= $this->Paginator->sort('rock') ?></th>
                    <th><?= $this->Paginator->sort('oldies') ?></th>
                    <th><?= $this->Paginator->sort('world_music') ?></th>
                    <th><?= $this->Paginator->sort('running_games') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($musicFilters as $musicFilter): ?>
                <tr>
                    <td><?= $this->Number->format($musicFilter->id) ?></td>
                    <td><?= $musicFilter->has('offer') ? $this->Html->link($musicFilter->offer->name, ['controller' => 'Offers', 'action' => 'view', $musicFilter->offer->id]) : '' ?></td>
                    <td><?= h($musicFilter->disco_polo) ?></td>
                    <td><?= h($musicFilter->pop) ?></td>
                    <td><?= h($musicFilter->rock) ?></td>
                    <td><?= h($musicFilter->oldies) ?></td>
                    <td><?= h($musicFilter->world_music) ?></td>
                    <td><?= h($musicFilter->running_games) ?></td>
                    <td><?= h($musicFilter->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $musicFilter->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $musicFilter->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $musicFilter->id], ['confirm' => __('Are you sure you want to delete # {0}?', $musicFilter->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
