<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\HallFilter[]|\Cake\Collection\CollectionInterface $hallFilters
 */
?>
<div class="hallFilters index content">
    <?= $this->Html->link(__('New Hall Filter'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Hall Filters') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('offer_id') ?></th>
                    <th><?= $this->Paginator->sort('hall_type_id') ?></th>
                    <th><?= $this->Paginator->sort('air_conditioning') ?></th>
                    <th><?= $this->Paginator->sort('garden') ?></th>
                    <th><?= $this->Paginator->sort('terrace') ?></th>
                    <th><?= $this->Paginator->sort('bar') ?></th>
                    <th><?= $this->Paginator->sort('stage') ?></th>
                    <th><?= $this->Paginator->sort('number_beds') ?></th>
                    <th><?= $this->Paginator->sort('number_people') ?></th>
                    <th><?= $this->Paginator->sort('price_for_the_night') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($hallFilters as $hallFilter): ?>
                <tr>
                    <td><?= $this->Number->format($hallFilter->id) ?></td>
                    <td><?= $hallFilter->has('offer') ? $this->Html->link($hallFilter->offer->name, ['controller' => 'Offers', 'action' => 'view', $hallFilter->offer->id]) : '' ?></td>
                    <td><?= $hallFilter->has('hall_type') ? $this->Html->link($hallFilter->hall_type->id, ['controller' => 'HallTypes', 'action' => 'view', $hallFilter->hall_type->id]) : '' ?></td>
                    <td><?= h($hallFilter->air_conditioning) ?></td>
                    <td><?= h($hallFilter->garden) ?></td>
                    <td><?= h($hallFilter->terrace) ?></td>
                    <td><?= h($hallFilter->bar) ?></td>
                    <td><?= h($hallFilter->stage) ?></td>
                    <td><?= $this->Number->format($hallFilter->number_beds) ?></td>
                    <td><?= $this->Number->format($hallFilter->number_people) ?></td>
                    <td><?= $this->Number->format($hallFilter->price_for_the_night) ?></td>
                    <td><?= h($hallFilter->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $hallFilter->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $hallFilter->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $hallFilter->id], ['confirm' => __('Are you sure you want to delete # {0}?', $hallFilter->id)]) ?>
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
