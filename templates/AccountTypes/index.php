<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AccountType[]|\Cake\Collection\CollectionInterface $accountTypes
 */
?>
<div class="accountTypes index content">
    <?= $this->Html->link(__('New Account Type'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Account Types') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('account_name') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($accountTypes as $accountType): ?>
                <tr>
                    <td><?= $this->Number->format($accountType->id) ?></td>
                    <td><?= h($accountType->account_name) ?></td>
                    <td><?= h($accountType->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $accountType->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $accountType->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $accountType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $accountType->id)]) ?>
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
