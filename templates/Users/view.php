<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 * @var \App\Model\Entity\Offer $offer
 * @var \Cake\Collection\CollectionInterface|string[] $offers
 */
?>


<?= $this->Html->css(['viewUser', 'miligram.min', 'normalize.min', 'viewProvider']) ?>
<div class="row">
    <nav>
            <?= $this->Html->link($this->Html->image('logo.svg'), array('controller' => 'Pages', 'action' => 'display', 'home'), array('escape' => false)); ?>

    </nav>
    <div class="column-responsive column-80 " >
        <div class="provider_container">
            <div class="provider_image">
                <a>
                    <img src="/img/userProfileImage/userProfileImage3.jpg" alt="Owner profile image" class="ownerimg">
                </a>
            </div>
            <div class="provider_info">
            <div class="provider_name">
                 <p class="property_name"><?= __('Name:   ') ?></p>
                    <p><?= h($user->name) ."   " ?></p>
                    <p><?= h($user->surname) ?></p>
            </div>
            <div class="provider_contact">
                <div class="provider_contact_detail">
                    <p class="property_name"><?= __('Phone Number:   ') ?></p>
                    <p><?= h($user->phone_number) ?></p>
                </div>
                <div class="provider_contact_detail">

                    <p class="property_name"><?= __('Email:') ?></p>
                    <p><?= h($user->email) ?></p>
                </div>
            </div>
            </div>
                <div class="provider_edit">
                    <?= $this->Html->link(__('Edytuj profil'), ['action' => 'edit', $user->id], ['class' => 'side-nav-item button float-right']) ?>
                    <?= $this->Html->link(__('Wyloguj'), ['action' => 'logout'], ['class' => 'side-nav-item button float-right']) ?>
                </div>
        </div>
        <div class="bookmarks_wrapper">
            <div class="current_bookmarks">Oferty użytkownika</div>
            <div><?= $this->Html->link(__('Otrzymane oceny'), ['action' => '']) ?></div>
            <div><?= $this->Html->link(__('Historia płatności'), ['action' => '']) ?></div>
        </div>









        <div class="users view content">
            <div style="display: flex; justify-content: space-around">
            </div>


            <?php if($account_type_id == 2): ?>



            <div class="offer_container">
                <div class="offer_container_header">
                    <h3>Oferty użytkownika</h3>
                    <div><?= $this->Html->link(__('Dodaj ofertę'), ['controller' => 'Offers', 'action' => 'add']) ?></div>
                </div>
                <div class="offer_container_wrapper">

                    <div class="related">
                    <?php if (!empty($user->offers)) : ?>
                        <?php foreach ($user->offers as $offers) : ?>

                    <div class="offer_container_wrapper_image">Zdjęcie</div>
                    <div class="offer_container_wrapper_description">
                        <div class="offer_container_wrapper_title">
                            <div><span style="font-weight: bold;"><?= h($offers->name) ?></span></div>
                            <?= $offers->has('address') ? $this->Html->link('Kliknij, aby zobaczyć adres', ['controller' => 'Addresses', 'action' => 'view', $offers->address->id]) : '' ?>
                        </div>
                        <div class="offer_container_wrapper_stars">*****</div>
                        <div class="offer_container_wrapper_description"><?= h($offers->description) ?></div>
                    </div>
                    <div class="offer_container_edit_button">
                            <?= $this->Html->link(__('Edit Offer'), ['controller' => 'Offers', 'action' => 'edit', $offers->id], ['class' => 'button float-right']) ?>
                            <?= $this->Html->link(__('Delete Offer'), ['controller' => 'Offers','action' => 'delete', $offers->id], ['class' => 'button float-right']) ?>
                    </div>

                        <?php endforeach; ?>
                    <?php endif; ?>
                    </div>
                </div>
            </div>


            <?php endif; ?>

































<!--            <h3><?= h($user->name) ?> To jest strona usługodawcy</h3>
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

        </div>
    </div>
</div>
