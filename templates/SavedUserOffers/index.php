<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SavedUserOffer[]|\Cake\Collection\CollectionInterface $savedUserOffers
 */
?>
<div class="savedUserOffers index content">
    <?= $this->Html->link(__('New Saved User Offer'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Saved User Offers') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('offer_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($savedUserOffers as $savedUserOffer): ?>
                <tr>
                    <td><?= $this->Number->format($savedUserOffer->id) ?></td>
                    <td><?= $savedUserOffer->has('user') ? $this->Html->link($savedUserOffer->user->name, ['controller' => 'Users', 'action' => 'view', $savedUserOffer->user->id]) : '' ?></td>
                    <td><?= $savedUserOffer->has('offer') ? $this->Html->link($savedUserOffer->offer->name, ['controller' => 'Offers', 'action' => 'view', $savedUserOffer->offer->id]) : '' ?></td>
                    <td><?= h($savedUserOffer->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $savedUserOffer->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $savedUserOffer->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $savedUserOffer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $savedUserOffer->id)]) ?>
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
