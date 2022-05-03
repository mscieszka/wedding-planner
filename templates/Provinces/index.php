<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Province[]|\Cake\Collection\CollectionInterface $provinces
 */
?>
<div class="provinces index content">
    <?= $this->Html->link(__('New Province'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Provinces') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($provinces as $province): ?>
                <tr>
                    <td><?= $this->Number->format($province->id) ?></td>
                    <td><?= h($province->name) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $province->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $province->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $province->id], ['confirm' => __('Are you sure you want to delete # {0}?', $province->id)]) ?>
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
