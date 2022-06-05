<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 * @var \App\Model\Entity\Offer $offer
 * @var \Cake\Collection\CollectionInterface|string[] $offers
 */
?>

<?= $this->Html->css(['viewUser', 'miligram.min', 'normalize.min', 'viewProvider', 'ordersProfile', 'profile-banner']) ?>
<div class="row">
    <div class="column-responsive column-80 ">
        <div class="profile-container">
            <?= $this->element('profile-banners/user-profile-banner'); ?>
            <div class="user-bookmarks-container">
                <div class="bookmarks_wrapper">
                    <?php if ($user->account_type_id == 1) : ?>
                        <div><?= $this->Html->link(__('Oferty obserwowane'), ['action' => 'profile', 1, $user->id]) ?></div>
                        <div><?= $this->Html->link(__('Dodane oceny'), ['action' => 'profile', 2, $user->id]) ?></div>
                    <?php endif; ?>
                    <?php if ($user->account_type_id == 2) : ?>
                        <div><?= $this->Html->link(__('Oferty użytkownika'), ['action' => 'profile', 1, $user->id]) ?></div>
                        <div><?= $this->Html->link(__('Otrzymane oceny'), ['action' => 'profile', 2, $user->id]) ?></div>
                    <?php endif; ?>
                    <?php if ($user->id == $id_user_log) : ?>
                        <div class="current_bookmarks">Zamówienia</div>
                    <?php endif; ?>
                </div>
                <div class="users view content">
                    <!--<div style="display: flex; justify-content: space-around">
                    </div>-->
                    <div class="offer_container">
                        <table class="order_client">
                            <tr>
                                <th>Data złożenia zamówienia</th>
                                <th>Data wykonania usługi</th>
                                <?php if ($user->account_type_id == 2) : ?>
                                    <th>Użytkownik</th>
                                <?php endif; ?>
                                <th>Oferta</th>
                                <th>Status</th>
                            </tr>
                            <?php if ($user->account_type_id == 1) : ?>
                                <?php foreach ($bookings as $booking) : ?>
                                    <?php if ($booking->user_id == $user->id) : ?>
                                        <tr>
                                            <!--<div class="profile-order-container">-->
                                            <!--<div class="profile-order-property">-->
                                            <!--<p class="property_name"><?= __('Data zlozenia zamowienia:   ') ?></p>-->
                                            <td><?= h($booking->created) ?></td>
                                            <!--<p class="property_name"><?= __('Data wykonania uslugi:   ') ?></p>-->
                                            <td><?= h($booking->booking_date) ?></td>
                                            <!--</div>-->
                                            <!--<div class="profile-order-property">-->
                                            <td><?= $booking->has('offer') ? $this->Html->link($booking->offer->name, ['controller' => 'Offers', 'action' => 'view',  $booking->offer->id]) : '' ?></td>
                                            <!--</div>-->
                                            <!--<div class="profile-order-property">-->
                                            <!--<td class="actions">-->
                                            <!--<div class="profile-order-actions">-->
                                            <?php if ($booking->user_id == $id_user_log) : ?>
                                                <?php if ($booking->booking_date < date("Y-m-d")) : ?>

                                                    <td class="order_client_button"><?= $this->Form->postLink(__('Anuluj'), ['controller' => 'Bookings', 'action' => 'delete', $booking->id], ['confirm' => __('Are you sure you want to delete # {0}?', $booking->id), 'class' => 'button profile-order-btn profile-order-btn-red override_button']) ?></td>

                                                <?php endif; ?>

                                                <?php if ($booking->booking_date >= date("Y-m-d")) : ?>
                                                    <td>
                                                        <p>Zamowienie zakonczone</p>
                                                    </td>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                            <!--</div>-->
                                            <!--</td>-->
                                            <!--</div>-->
                                            <!--</div>-->
                                        </tr>
                                    <?php endif; ?>

                                <?php endforeach; ?>

                            <?php endif; ?>


                            <?php if ($user->account_type_id == 2) : ?>
                                <?php foreach ($bookings as $booking) : ?>
                                    <?php if (!(in_array($booking->offer_id, $his_offers))) : continue; ?>
                                    <?php endif; ?>
                                    <tr>
                                        <!--<div class="profile-order-container">-->
                                        <!--<div class="profile-order-property">-->
                                        <!--<p class="property_name"><?= __('Data zlozenia zamowienia:   ') ?></p>-->
                                        <td><?= h($booking->created) ?></td>
                                        <!--<p class="property_name"><?= __('Data wykonania uslugi:   ') ?></p>-->
                                        <td><?= h($booking->booking_date) ?></td>
                                        <!--</div>-->
                                        <!--<div class="profile-order-property">-->
                                        <td><?= $booking->has('user') ? $this->Html->link($booking->user->name, ['controller' => 'Offers', 'action' => 'view',  $booking->offer->id]) : '' ?></td>
                                        <td><?= $booking->has('offer') ? $this->Html->link($booking->offer->name, ['controller' => 'Offers', 'action' => 'view',  $booking->offer->id]) : '' ?></td>
                                        <!--</div>-->
                                        <!--<div class="profile-order-property">-->
                                        <!--<td class="actions">-->
                                        <!--<div class="profile-order-actions">-->
                                        <?php if ($booking->booking_date < date("Y-m-d")) : ?>
                                            <td>
                                                <p>Zamowienie w trakcie realizacji</p>
                                            </td>
                                        <?php endif; ?>

                                        <?php if ($booking->booking_date >= date("Y-m-d")) : ?>
                                            <td>
                                                <p>Zamowienie zakonczone</p>
                                            </td>
                                        <?php endif; ?>
                                        <!--</div>-->
                                        <!--</td>-->
                                        <!--</div>-->
                                        <!--</div>-->
                                    </tr>

                                <?php endforeach; ?>

                            <?php endif; ?>
                        </table>

                        <!--  <?= $this->Html->link(__('Edit'), ['controller' => 'SavedUserBookings', 'action' => 'edit', $booking->id], ['class' => 'button profile-order-btn']) ?> -->
                        <!-- <?= $this->Form->postLink(__('Delete'), ['controller' => 'SavedUserBookings', 'action' => 'delete', $booking->id], ['confirm' => __('Are you sure you want to delete # {0}?', $booking->id), 'class' => 'button profile-order-btn profile-order-btn-red']) ?> -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

