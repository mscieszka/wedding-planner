<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Offer[]|\Cake\Collection\CollectionInterface $offers
 */
?>
<div class="offers index content">
    <?= $this->Html->link(__('New Offer'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Found Offers') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('category_id') ?></th>
                    <th><?= $this->Paginator->sort('address_id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('price') ?></th>
                    <th><?= $this->Paginator->sort('advance_payment') ?></th>
                    <th><?= $this->Paginator->sort('website') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($offers as $offer): ?>
                <tr>
                    <td><?= $this->Number->format($offer->id) ?></td>
                    <td><?= $offer->has('user') ? $this->Html->link($offer->user->name, ['controller' => 'Users', 'action' => 'view', $offer->user->id]) : '' ?></td>
                    <td><?= $offer->has('category') ? $this->Html->link($offer->category->name, ['controller' => 'Categories', 'action' => 'view', $offer->category->id]) : '' ?></td>
                    <td><?= $offer->has('address') ? $this->Html->link($offer->address->id, ['controller' => 'Addresses', 'action' => 'view', $offer->address->id]) : '' ?></td>
                    <td><?= h($offer->name) ?></td>
                    <td><?= $this->Number->format($offer->price) ?></td>
                    <td><?= $this->Number->format($offer->advance_payment) ?></td>
                    <td><?= h($offer->website) ?></td>
                    <td><?= h($offer->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $offer->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $offer->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $offer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $offer->id)]) ?>
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
