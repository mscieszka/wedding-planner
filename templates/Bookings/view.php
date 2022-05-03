<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Booking $booking
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Booking'), ['action' => 'edit', $booking->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Booking'), ['action' => 'delete', $booking->id], ['confirm' => __('Are you sure you want to delete # {0}?', $booking->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Bookings'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Booking'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="bookings view content">
            <h3><?= h($booking->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $booking->has('user') ? $this->Html->link($booking->user->name, ['controller' => 'Users', 'action' => 'view', $booking->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Offer') ?></th>
                    <td><?= $booking->has('offer') ? $this->Html->link($booking->offer->name, ['controller' => 'Offers', 'action' => 'view', $booking->offer->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Payment') ?></th>
                    <td><?= $booking->has('payment') ? $this->Html->link($booking->payment->id, ['controller' => 'Payments', 'action' => 'view', $booking->payment->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($booking->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Booking Date') ?></th>
                    <td><?= h($booking->booking_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Release Date') ?></th>
                    <td><?= h($booking->release_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($booking->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Released') ?></th>
                    <td><?= $booking->is_released ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Canceled') ?></th>
                    <td><?= $booking->is_canceled ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Saved User Bookings') ?></h4>
                <?php if (!empty($booking->saved_user_bookings)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Booking Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($booking->saved_user_bookings as $savedUserBookings) : ?>
                        <tr>
                            <td><?= h($savedUserBookings->id) ?></td>
                            <td><?= h($savedUserBookings->user_id) ?></td>
                            <td><?= h($savedUserBookings->booking_id) ?></td>
                            <td><?= h($savedUserBookings->created) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'SavedUserBookings', 'action' => 'view', $savedUserBookings->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'SavedUserBookings', 'action' => 'edit', $savedUserBookings->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'SavedUserBookings', 'action' => 'delete', $savedUserBookings->id], ['confirm' => __('Are you sure you want to delete # {0}?', $savedUserBookings->id)]) ?>
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
