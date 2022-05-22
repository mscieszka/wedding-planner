<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SavedUserOffer $savedUserOffer
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Saved User Offer'), ['action' => 'edit', $savedUserOffer->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Saved User Offer'), ['action' => 'delete', $savedUserOffer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $savedUserOffer->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Saved User Offers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Saved User Offer'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="savedUserOffers view content">
            <h3><?= h($savedUserOffer->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $savedUserOffer->has('user') ? $this->Html->link($savedUserOffer->user->name, ['controller' => 'Users', 'action' => 'view', $savedUserOffer->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Offer') ?></th>
                    <td><?= $savedUserOffer->has('offer') ? $this->Html->link($savedUserOffer->offer->name, ['controller' => 'Offers', 'action' => 'view', $savedUserOffer->offer->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($savedUserOffer->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($savedUserOffer->created) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
