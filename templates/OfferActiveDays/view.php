<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OfferActiveDay $offerActiveDay
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Offer Active Day'), ['action' => 'edit', $offerActiveDay->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Offer Active Day'), ['action' => 'delete', $offerActiveDay->id], ['confirm' => __('Are you sure you want to delete # {0}?', $offerActiveDay->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Offer Active Days'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Offer Active Day'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="offerActiveDays view content">
            <h3><?= h($offerActiveDay->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Offer') ?></th>
                    <td><?= $offerActiveDay->has('offer') ? $this->Html->link($offerActiveDay->offer->name, ['controller' => 'Offers', 'action' => 'view', $offerActiveDay->offer->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($offerActiveDay->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($offerActiveDay->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Monday') ?></th>
                    <td><?= $offerActiveDay->monday ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Tuesday') ?></th>
                    <td><?= $offerActiveDay->tuesday ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Wednesday') ?></th>
                    <td><?= $offerActiveDay->wednesday ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Thursday') ?></th>
                    <td><?= $offerActiveDay->Thursday ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Friday') ?></th>
                    <td><?= $offerActiveDay->friday ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Saturday') ?></th>
                    <td><?= $offerActiveDay->saturday ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Sunday') ?></th>
                    <td><?= $offerActiveDay->sunday ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
