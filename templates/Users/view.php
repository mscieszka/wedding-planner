<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users view content">
            <h3><?= h($user->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($user->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($user->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Surname') ?></th>
                    <td><?= h($user->surname) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone Number') ?></th>
                    <td><?= h($user->phone_number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Company Name') ?></th>
                    <td><?= h($user->company_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Krs') ?></th>
                    <td><?= h($user->krs) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nip') ?></th>
                    <td><?= h($user->nip) ?></td>
                </tr>
                <tr>
                    <th><?= __('Regon') ?></th>
                    <td><?= h($user->regon) ?></td>
                </tr>
                <tr>
                    <th><?= __('Account Type') ?></th>
                    <td><?= $user->has('account_type') ? $this->Html->link($user->account_type->id, ['controller' => 'AccountTypes', 'action' => 'view', $user->account_type->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($user->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($user->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Enabled') ?></th>
                    <td><?= $user->enabled ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Confirmed Email') ?></th>
                    <td><?= $user->confirmed_email ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Addresses') ?></h4>
                <?php if (!empty($user->addresses)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Street') ?></th>
                            <th><?= __('House Number') ?></th>
                            <th><?= __('Postal Code') ?></th>
                            <th><?= __('City') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Province Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->addresses as $addresses) : ?>
                        <tr>
                            <td><?= h($addresses->id) ?></td>
                            <td><?= h($addresses->street) ?></td>
                            <td><?= h($addresses->house_number) ?></td>
                            <td><?= h($addresses->postal_code) ?></td>
                            <td><?= h($addresses->city) ?></td>
                            <td><?= h($addresses->user_id) ?></td>
                            <td><?= h($addresses->province_id) ?></td>
                            <td><?= h($addresses->created) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Addresses', 'action' => 'view', $addresses->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Addresses', 'action' => 'edit', $addresses->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Addresses', 'action' => 'delete', $addresses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $addresses->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Bookings') ?></h4>
                <?php if (!empty($user->bookings)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Offer Id') ?></th>
                            <th><?= __('Payment Id') ?></th>
                            <th><?= __('Booking Date') ?></th>
                            <th><?= __('Release Date') ?></th>
                            <th><?= __('Is Released') ?></th>
                            <th><?= __('Is Canceled') ?></th>
                            <th><?= __('Created') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->bookings as $bookings) : ?>
                        <tr>
                            <td><?= h($bookings->id) ?></td>
                            <td><?= h($bookings->user_id) ?></td>
                            <td><?= h($bookings->offer_id) ?></td>
                            <td><?= h($bookings->payment_id) ?></td>
                            <td><?= h($bookings->booking_date) ?></td>
                            <td><?= h($bookings->release_date) ?></td>
                            <td><?= h($bookings->is_released) ?></td>
                            <td><?= h($bookings->is_canceled) ?></td>
                            <td><?= h($bookings->created) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Bookings', 'action' => 'view', $bookings->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Bookings', 'action' => 'edit', $bookings->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Bookings', 'action' => 'delete', $bookings->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bookings->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Offers') ?></h4>
                <?php if (!empty($user->offers)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Category Id') ?></th>
                            <th><?= __('Address Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Price') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Advance Payment') ?></th>
                            <th><?= __('Website') ?></th>
                            <th><?= __('Created') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->offers as $offers) : ?>
                        <tr>
                            <td><?= h($offers->id) ?></td>
                            <td><?= h($offers->user_id) ?></td>
                            <td><?= h($offers->category_id) ?></td>
                            <td><?= h($offers->address_id) ?></td>
                            <td><?= h($offers->name) ?></td>
                            <td><?= h($offers->price) ?></td>
                            <td><?= h($offers->description) ?></td>
                            <td><?= h($offers->advance_payment) ?></td>
                            <td><?= h($offers->website) ?></td>
                            <td><?= h($offers->created) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Offers', 'action' => 'view', $offers->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Offers', 'action' => 'edit', $offers->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Offers', 'action' => 'delete', $offers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $offers->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Ratings') ?></h4>
                <?php if (!empty($user->ratings)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Offer Id') ?></th>
                            <th><?= __('Rating') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Opinion Date') ?></th>
                            <th><?= __('Created') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->ratings as $ratings) : ?>
                        <tr>
                            <td><?= h($ratings->id) ?></td>
                            <td><?= h($ratings->user_id) ?></td>
                            <td><?= h($ratings->offer_id) ?></td>
                            <td><?= h($ratings->rating) ?></td>
                            <td><?= h($ratings->description) ?></td>
                            <td><?= h($ratings->opinion_date) ?></td>
                            <td><?= h($ratings->created) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Ratings', 'action' => 'view', $ratings->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Ratings', 'action' => 'edit', $ratings->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Ratings', 'action' => 'delete', $ratings->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ratings->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Saved User Bookings') ?></h4>
                <?php if (!empty($user->saved_user_bookings)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Booking Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->saved_user_bookings as $savedUserBookings) : ?>
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
            <div class="related">
                <h4><?= __('Related Saved User Offers') ?></h4>
                <?php if (!empty($user->saved_user_offers)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Offer Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->saved_user_offers as $savedUserOffers) : ?>
                        <tr>
                            <td><?= h($savedUserOffers->id) ?></td>
                            <td><?= h($savedUserOffers->user_id) ?></td>
                            <td><?= h($savedUserOffers->offer_id) ?></td>
                            <td><?= h($savedUserOffers->created) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'SavedUserOffers', 'action' => 'view', $savedUserOffers->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'SavedUserOffers', 'action' => 'edit', $savedUserOffers->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'SavedUserOffers', 'action' => 'delete', $savedUserOffers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $savedUserOffers->id)]) ?>
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
