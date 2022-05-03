<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\HallFilter $hallFilter
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Hall Filter'), ['action' => 'edit', $hallFilter->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Hall Filter'), ['action' => 'delete', $hallFilter->id], ['confirm' => __('Are you sure you want to delete # {0}?', $hallFilter->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Hall Filters'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Hall Filter'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="hallFilters view content">
            <h3><?= h($hallFilter->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Offer') ?></th>
                    <td><?= $hallFilter->has('offer') ? $this->Html->link($hallFilter->offer->name, ['controller' => 'Offers', 'action' => 'view', $hallFilter->offer->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Hall Type') ?></th>
                    <td><?= $hallFilter->has('hall_type') ? $this->Html->link($hallFilter->hall_type->id, ['controller' => 'HallTypes', 'action' => 'view', $hallFilter->hall_type->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($hallFilter->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Number Beds') ?></th>
                    <td><?= $this->Number->format($hallFilter->number_beds) ?></td>
                </tr>
                <tr>
                    <th><?= __('Number People') ?></th>
                    <td><?= $this->Number->format($hallFilter->number_people) ?></td>
                </tr>
                <tr>
                    <th><?= __('Price For The Night') ?></th>
                    <td><?= $this->Number->format($hallFilter->price_for_the_night) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($hallFilter->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Air Conditioning') ?></th>
                    <td><?= $hallFilter->air_conditioning ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Garden') ?></th>
                    <td><?= $hallFilter->garden ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Terrace') ?></th>
                    <td><?= $hallFilter->terrace ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Bar') ?></th>
                    <td><?= $hallFilter->bar ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Stage') ?></th>
                    <td><?= $hallFilter->stage ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
