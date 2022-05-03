<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\HallType $hallType
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Hall Type'), ['action' => 'edit', $hallType->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Hall Type'), ['action' => 'delete', $hallType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $hallType->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Hall Types'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Hall Type'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="hallTypes view content">
            <h3><?= h($hallType->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Type') ?></th>
                    <td><?= h($hallType->type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($hallType->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Hall Filters') ?></h4>
                <?php if (!empty($hallType->hall_filters)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Offer Id') ?></th>
                            <th><?= __('Hall Type Id') ?></th>
                            <th><?= __('Air Conditioning') ?></th>
                            <th><?= __('Garden') ?></th>
                            <th><?= __('Terrace') ?></th>
                            <th><?= __('Bar') ?></th>
                            <th><?= __('Stage') ?></th>
                            <th><?= __('Number Beds') ?></th>
                            <th><?= __('Number People') ?></th>
                            <th><?= __('Price For The Night') ?></th>
                            <th><?= __('Created') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($hallType->hall_filters as $hallFilters) : ?>
                        <tr>
                            <td><?= h($hallFilters->id) ?></td>
                            <td><?= h($hallFilters->offer_id) ?></td>
                            <td><?= h($hallFilters->hall_type_id) ?></td>
                            <td><?= h($hallFilters->air_conditioning) ?></td>
                            <td><?= h($hallFilters->garden) ?></td>
                            <td><?= h($hallFilters->terrace) ?></td>
                            <td><?= h($hallFilters->bar) ?></td>
                            <td><?= h($hallFilters->stage) ?></td>
                            <td><?= h($hallFilters->number_beds) ?></td>
                            <td><?= h($hallFilters->number_people) ?></td>
                            <td><?= h($hallFilters->price_for_the_night) ?></td>
                            <td><?= h($hallFilters->created) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'HallFilters', 'action' => 'view', $hallFilters->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'HallFilters', 'action' => 'edit', $hallFilters->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'HallFilters', 'action' => 'delete', $hallFilters->id], ['confirm' => __('Are you sure you want to delete # {0}?', $hallFilters->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
