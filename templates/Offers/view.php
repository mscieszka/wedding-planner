<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Offer $offer
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Offers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?php if($account_type_id == 2): ?>
                <?php if($offer->user_id == $id_user_log):?>
                    <?= $this->Html->link(__('Edit Offer'), ['action' => 'edit', $offer->id], ['class' => 'side-nav-item']) ?>
                    <?= $this->Form->postLink(__('Delete Offer'), ['action' => 'delete', $offer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $offer->id), 'class' => 'side-nav-item']) ?>
                <?php endif; ?>
                <?= $this->Html->link(__('New Offer'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
            <?php endif; ?>


        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="offers view content">
            <h3><?= h($offer->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $offer->has('user') ? $this->Html->link($offer->user->name, ['controller' => 'Users', 'action' => 'view', $offer->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Category') ?></th>
                    <td><?= $offer->has('category') ? $this->Html->link($offer->category->name, ['controller' => 'Categories', 'action' => 'view', $offer->category->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Address') ?></th>
                    <td><?= $offer->has('address') ? $this->Html->link('Kliknij, aby zobaczyć adres', ['controller' => 'Addresses', 'action' => 'view', $offer->address->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($offer->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Website') ?></th>
                    <td><?= h($offer->website) ?></td>
                </tr>
                <tr>
                    <th><?= __('Price') ?></th>
                    <td><?= $this->Number->format($offer->price) ?></td>
                </tr>
                <tr>
                    <th><?= __('Advance Payment') ?></th>
                    <td><?= $this->Number->format($offer->advance_payment) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($offer->description)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Bookings') ?></h4>
                <?php if (!empty($offer->bookings)) : ?>
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
                        <?php foreach ($offer->bookings as $bookings) : ?>
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
                <h4><?= __('Related Catering Filters') ?></h4>
                <?php if (!empty($offer->catering_filters)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Offer Id') ?></th>
                            <th><?= __('Polish') ?></th>
                            <th><?= __('Italian') ?></th>
                            <th><?= __('American') ?></th>
                            <th><?= __('French') ?></th>
                            <th><?= __('Asian') ?></th>
                            <th><?= __('Vegan') ?></th>
                            <th><?= __('Vegetarian') ?></th>
                            <th><?= __('Gluten Free') ?></th>
                            <th><?= __('Created') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($offer->catering_filters as $cateringFilters) : ?>
                        <tr>
                            <td><?= h($cateringFilters->id) ?></td>
                            <td><?= h($cateringFilters->offer_id) ?></td>
                            <td><?= h($cateringFilters->polish) ?></td>
                            <td><?= h($cateringFilters->italian) ?></td>
                            <td><?= h($cateringFilters->american) ?></td>
                            <td><?= h($cateringFilters->french) ?></td>
                            <td><?= h($cateringFilters->asian) ?></td>
                            <td><?= h($cateringFilters->vegan) ?></td>
                            <td><?= h($cateringFilters->vegetarian) ?></td>
                            <td><?= h($cateringFilters->gluten_free) ?></td>
                            <td><?= h($cateringFilters->created) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'CateringFilters', 'action' => 'view', $cateringFilters->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'CateringFilters', 'action' => 'edit', $cateringFilters->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'CateringFilters', 'action' => 'delete', $cateringFilters->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cateringFilters->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Hall Filters') ?></h4>
                <?php if (!empty($offer->hall_filters)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Offer Id') ?></th>
                            <th><?= __('Hall Type Id') ?></th>
                            <th><?= __('Air Conditioning') ?></th>
                            <th><?= __('Garden') ?></th>
                            <th><?= __('Terrace') ?></th>
                            <th><?= __('Bar') ?></th>
                            <th><?= __('Stage') ?></th>
                            <th><?= __('Number Beds') ?></th>
                            <th><?= __('Number People') ?></th>
                            <th><?= __('Price For The Night') ?></th>
                            <th><?= __('Created') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($offer->hall_filters as $hallFilters) : ?>
                        <tr>
                            <td><?= h($hallFilters->id) ?></td>
                            <td><?= h($hallFilters->offer_id) ?></td>
                            <td><?= h($hallFilters->hall_type_id) ?></td>
                            <td><?= h($hallFilters->air_conditioning) ?></td>
                            <td><?= h($hallFilters->garden) ?></td>
                            <td><?= h($hallFilters->terrace) ?></td>
                            <td><?= h($hallFilters->bar) ?></td>
                            <td><?= h($hallFilters->stage) ?></td>
                            <td><?= h($hallFilters->number_beds) ?></td>
                            <td><?= h($hallFilters->number_people) ?></td>
                            <td><?= h($hallFilters->price_for_the_night) ?></td>
                            <td><?= h($hallFilters->created) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'HallFilters', 'action' => 'view', $hallFilters->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'HallFilters', 'action' => 'edit', $hallFilters->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'HallFilters', 'action' => 'delete', $hallFilters->id], ['confirm' => __('Are you sure you want to delete # {0}?', $hallFilters->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Music Filters') ?></h4>
                <?php if (!empty($offer->music_filters)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Offer Id') ?></th>
                            <th><?= __('Disco Polo') ?></th>
                            <th><?= __('Pop') ?></th>
                            <th><?= __('Rock') ?></th>
                            <th><?= __('Oldies') ?></th>
                            <th><?= __('World Music') ?></th>
                            <th><?= __('Running Games') ?></th>
                            <th><?= __('Created') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($offer->music_filters as $musicFilters) : ?>
                        <tr>
                            <td><?= h($musicFilters->id) ?></td>
                            <td><?= h($musicFilters->offer_id) ?></td>
                            <td><?= h($musicFilters->disco_polo) ?></td>
                            <td><?= h($musicFilters->pop) ?></td>
                            <td><?= h($musicFilters->rock) ?></td>
                            <td><?= h($musicFilters->oldies) ?></td>
                            <td><?= h($musicFilters->world_music) ?></td>
                            <td><?= h($musicFilters->running_games) ?></td>
                            <td><?= h($musicFilters->created) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'MusicFilters', 'action' => 'view', $musicFilters->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'MusicFilters', 'action' => 'edit', $musicFilters->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'MusicFilters', 'action' => 'delete', $musicFilters->id], ['confirm' => __('Are you sure you want to delete # {0}?', $musicFilters->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Offer Active Days') ?></h4>
                <?php if (!empty($offer->offer_active_days)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Offer Id') ?></th>
                            <th><?= __('Monday') ?></th>
                            <th><?= __('Tuesday') ?></th>
                            <th><?= __('Wednesday') ?></th>
                            <th><?= __('Thursday') ?></th>
                            <th><?= __('Friday') ?></th>
                            <th><?= __('Saturday') ?></th>
                            <th><?= __('Sunday') ?></th>
                            <th><?= __('Created') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($offer->offer_active_days as $offerActiveDays) : ?>
                        <tr>
                            <td><?= h($offerActiveDays->id) ?></td>
                            <td><?= h($offerActiveDays->offer_id) ?></td>
                            <td><?= h($offerActiveDays->monday) ?></td>
                            <td><?= h($offerActiveDays->tuesday) ?></td>
                            <td><?= h($offerActiveDays->wednesday) ?></td>
                            <td><?= h($offerActiveDays->Thursday) ?></td>
                            <td><?= h($offerActiveDays->friday) ?></td>
                            <td><?= h($offerActiveDays->saturday) ?></td>
                            <td><?= h($offerActiveDays->sunday) ?></td>
                            <td><?= h($offerActiveDays->created) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'OfferActiveDays', 'action' => 'view', $offerActiveDays->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'OfferActiveDays', 'action' => 'edit', $offerActiveDays->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'OfferActiveDays', 'action' => 'delete', $offerActiveDays->id], ['confirm' => __('Are you sure you want to delete # {0}?', $offerActiveDays->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Ratings') ?></h4>
                <?php if (!empty($offer->ratings)) : ?>
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
                        <?php foreach ($offer->ratings as $ratings) : ?>
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
                <h4><?= __('Related Saved User Offers') ?></h4>
                <?php if (!empty($offer->saved_user_offers)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Offer Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($offer->saved_user_offers as $savedUserOffers) : ?>
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
