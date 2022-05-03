<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CateringFilter[]|\Cake\Collection\CollectionInterface $cateringFilters
 */
?>
<div class="cateringFilters index content">
    <?= $this->Html->link(__('New Catering Filter'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Catering Filters') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('offer_id') ?></th>
                    <th><?= $this->Paginator->sort('polish') ?></th>
                    <th><?= $this->Paginator->sort('italian') ?></th>
                    <th><?= $this->Paginator->sort('american') ?></th>
                    <th><?= $this->Paginator->sort('french') ?></th>
                    <th><?= $this->Paginator->sort('asian') ?></th>
                    <th><?= $this->Paginator->sort('vegan') ?></th>
                    <th><?= $this->Paginator->sort('vegetarian') ?></th>
                    <th><?= $this->Paginator->sort('gluten_free') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cateringFilters as $cateringFilter): ?>
                <tr>
                    <td><?= $this->Number->format($cateringFilter->id) ?></td>
                    <td><?= $cateringFilter->has('offer') ? $this->Html->link($cateringFilter->offer->name, ['controller' => 'Offers', 'action' => 'view', $cateringFilter->offer->id]) : '' ?></td>
                    <td><?= h($cateringFilter->polish) ?></td>
                    <td><?= h($cateringFilter->italian) ?></td>
                    <td><?= h($cateringFilter->american) ?></td>
                    <td><?= h($cateringFilter->french) ?></td>
                    <td><?= h($cateringFilter->asian) ?></td>
                    <td><?= h($cateringFilter->vegan) ?></td>
                    <td><?= h($cateringFilter->vegetarian) ?></td>
                    <td><?= h($cateringFilter->gluten_free) ?></td>
                    <td><?= h($cateringFilter->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $cateringFilter->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cateringFilter->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cateringFilter->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cateringFilter->id)]) ?>
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
