<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rating $rating
 */
?>

<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Rating'), ['action' => 'edit', $rating->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Rating'), ['action' => 'delete', $rating->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rating->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Ratings'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Rating'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="ratings view content">
            <h3><?= h($rating->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $rating->has('user') ? $this->Html->link($rating->user->name, ['controller' => 'Users', 'action' => 'view', $rating->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Offer') ?></th>
                    <td><?= $rating->has('offer') ? $this->Html->link($rating->offer->name, ['controller' => 'Offers', 'action' => 'view', $rating->offer->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($rating->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rating') ?></th>
                    <td><?= $this->Number->format($rating->rating) ?></td>
                </tr>
                <tr>
                    <th><?= __('Opinion Date') ?></th>
                    <td><?= h($rating->opinion_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($rating->created) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($rating->description)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
