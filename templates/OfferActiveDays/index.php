<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OfferActiveDay[]|\Cake\Collection\CollectionInterface $offerActiveDays
 */
?>
<div class="offerActiveDays index content">
    <?= $this->Html->link(__('New Offer Active Day'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Offer Active Days') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('offer_id') ?></th>
                <th><?= $this->Paginator->sort('monday') ?></th>
                <th><?= $this->Paginator->sort('tuesday') ?></th>
                <th><?= $this->Paginator->sort('wednesday') ?></th>
                <th><?= $this->Paginator->sort('Thursday') ?></th>
                <th><?= $this->Paginator->sort('friday') ?></th>
                <th><?= $this->Paginator->sort('saturday') ?></th>
                <th><?= $this->Paginator->sort('sunday') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($offerActiveDays as $offerActiveDay) : ?>
                <tr>
                    <td><?= $this->Number->format($offerActiveDay->id) ?></td>
                    <td><?= $offerActiveDay->has('offer') ? $this->Html->link($offerActiveDay->offer->name, ['controller' => 'Offers', 'action' => 'view', $offerActiveDay->offer->id]) : '' ?></td>
                    <td><?= h($offerActiveDay->monday) ?></td>
                    <td><?= h($offerActiveDay->tuesday) ?></td>
                    <td><?= h($offerActiveDay->wednesday) ?></td>
                    <td><?= h($offerActiveDay->Thursday) ?></td>
                    <td><?= h($offerActiveDay->friday) ?></td>
                    <td><?= h($offerActiveDay->saturday) ?></td>
                    <td><?= h($offerActiveDay->sunday) ?></td>
                    <td><?= h($offerActiveDay->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $offerActiveDay->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $offerActiveDay->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $offerActiveDay->id], ['confirm' => __('Are you sure you want to delete # {0}?', $offerActiveDay->id)]) ?>
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
