<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CateringFilter $cateringFilter
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Catering Filter'), ['action' => 'edit', $cateringFilter->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Catering Filter'), ['action' => 'delete', $cateringFilter->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cateringFilter->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Catering Filters'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Catering Filter'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="cateringFilters view content">
            <h3><?= h($cateringFilter->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Offer') ?></th>
                    <td><?= $cateringFilter->has('offer') ? $this->Html->link($cateringFilter->offer->name, ['controller' => 'Offers', 'action' => 'view', $cateringFilter->offer->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($cateringFilter->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($cateringFilter->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Polish') ?></th>
                    <td><?= $cateringFilter->polish ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Italian') ?></th>
                    <td><?= $cateringFilter->italian ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('American') ?></th>
                    <td><?= $cateringFilter->american ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('French') ?></th>
                    <td><?= $cateringFilter->french ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Asian') ?></th>
                    <td><?= $cateringFilter->asian ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Vegan') ?></th>
                    <td><?= $cateringFilter->vegan ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Vegetarian') ?></th>
                    <td><?= $cateringFilter->vegetarian ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Gluten Free') ?></th>
                    <td><?= $cateringFilter->gluten_free ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
