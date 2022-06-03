<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Booking $booking
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $offers
 * @var string[]|\Cake\Collection\CollectionInterface $payments
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Anuluj rezerwację'),
                ['action' => 'delete', $booking->id],
                ['confirm' => __('Czy na pewno chcesz anulować rezerwację?', $booking->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('Wyświetl rezerwacje'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="bookings form content">
            <?= $this->Form->create($booking) ?>
            <fieldset>
                <legend><?= __('Edit Booking') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('offer_id', ['options' => $offers]);
                    echo $this->Form->control('payment_id', ['options' => $payments]);
                    echo $this->Form->control('booking_date', ['empty' => true]);
                    echo $this->Form->control('release_date', ['empty' => true]);
                    echo $this->Form->control('is_released');
                    echo $this->Form->control('is_canceled');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
