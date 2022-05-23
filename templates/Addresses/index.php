<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Address[]|\Cake\Collection\CollectionInterface $addresses
 */
?>
<div class="addresses index content">
    <?php if($account_type_id == 2): ?>
        <?= $this->Html->link(__('New Address'), ['action' => 'add'], ['class' => 'button float-right']) ?>
        <h3><?= __('My Addresses') ?></h3>
    <?php endif; ?>

    <?php if($account_type_id == 1): ?>
        <h3><?= __('My Address') ?></h3>
    <?php endif; ?>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('street') ?></th>
                    <th><?= $this->Paginator->sort('house_number') ?></th>
                    <th><?= $this->Paginator->sort('postal_code') ?></th>
                    <th><?= $this->Paginator->sort('city') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('province_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($addresses as $address): ?>
                <tr>
                    <td><?= $this->Number->format($address->id) ?></td>
                    <td><?= h($address->street) ?></td>
                    <td><?= h($address->house_number) ?></td>
                    <td><?= h($address->postal_code) ?></td>
                    <td><?= h($address->city) ?></td>
                    <td><?= $address->has('user') ? $this->Html->link($address->user->name, ['controller' => 'Users', 'action' => 'view', $address->user->id]) : '' ?></td>
                    <td><?= $address->has('province') ? $this->Html->link($address->province->name, ['controller' => 'Provinces', 'action' => 'view', $address->province->id]) : '' ?></td>
                    <td><?= h($address->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $address->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $address->id]) ?>
                        <?php if($account_type_id == 2): ?>

                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $address->id], ['confirm' => __('Are you sure you want to delete # {0}?', $address->id)]) ?>
                        <?php endif; ?>



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
