<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Offer $offer
 * @var \App\Model\Entity\Rating $rating
 * @var \Cake\Collection\CollectionInterface|string[] $users
 * @var \Cake\Collection\CollectionInterface|string[] $offers
 */

?>
<?= $this->Html->css('viewOffer') ?>
<?= $this->Html->css('calendar') ?>
<?= $this->Html->css('profile-banner') ?>
<?= $this->Html->css('ratings') ?>

<div class="go-back-to-parent-category">
    <?= $this->Html->link($offer->category->name, ['controller' => 'categories', 'action' => 'view', $offer->category_id], ['class' => 'side-nav-item button float-right']) ?>
</div>
<div class="offer-container">
    <div class="offer-gallery">
        <div class="title-location">
            <div class="offer-title">
                <h3><?= h($offer->name) ?></h3>
                <div class="offer-view-fav-button">
                    <?php if ($account_type_id == 1) : ?>
                        <?php if (in_array($offer->id, $saved_user_offers)) : ?>
                            <?= $this->Form->postLink(__($this->Html->image('heart-icon.svg', ['alt' => 'Heart icon'])), ['controller' => 'SavedUserOffers', 'action' => 'delete', $offer->id], ['confirm' => __('Czy napewno chcesz usunac te oferte z ulubionych?'), 'escape' => false]) ?>
                        <?php else : ?>
                            <?= $this->Html->link(__($this->Html->image('heart-icon2.svg', ['alt' => 'Heart icon'])), ['controller' => 'SavedUserOffers', 'action' => 'add', $offer->id], ['escape' => false]) ?>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
            <h5 class="offer-location">
                <?= h($offer->address->city) ?>
            </h5>
        </div>
        <div class="offer-gallery-img">
            <?php if (!empty($files)) : ?>
                <?php foreach ($files as $file) : ?>
                    <?php $filePath = 'offerImages/' . (int)$offer->get('id') . '/' . $file; ?>
                    <?= $this->Html->image($filePath, ['alt' => 'Offer image', 'class' => 'offer-pic']) ?>
                <?php endforeach; ?>
            <?php endif; ?>

            <?php if (empty($files)) : ?>
                <?= $this->Html->image('offerImages/dj1_1.jpg', ['alt' => 'Offer Image', 'class' => 'offer-img']) ?>
            <?php endif; ?>
        </div>
    </div>

    <div class="offer-details">
        <div class="offer-description">
            <div class="offer-description-main">
                <h4>Opis oferty</h4>
            </div>
            <?= $this->Text->autoParagraph(h($offer->description)); ?>
        </div>
        <div class="rest-offer-details">
            <div class="offer-price">
                <div class="offer-description-bold">
                    <?php if ($offer->category_id == 2) : ?>
                        <!-- DJ -->
                        <h5>Cena za godzinę: </h5>
                    <?php else : ?>
                        <h5>Cena za osobę: </h5>
                    <?php endif; ?>
                </div>
                <div class="offer-price-amount">
                    <?= $this->Number->format($offer->price) . " zł" ?>
                </div>
            </div>

            <div class="offer-advance-payment">
                <div class="offer-description-bold">
                    <h5>Wysokość zaliczki: </h5>
                </div>
                <div class="offer-advance-payment-price">
                    <?= $this->Number->format($offer->advance_payment) . " %" ?>
                </div>
            </div>
            <div class="offer-website">
                <div class="offer-description-bold">
                    <h5>Nasza strona: </h5>
                </div>
                <div class="offer-website-address">
                    <?= ($offer->website) ?>
                </div>
            </div>
            <div class="offer-address">
                <?= $offer->has('address') ? $this->Html->link('Kliknij, aby zobaczyć adres', ['controller' => 'Addresses', 'action' => 'view', $offer->address->id]) : '' ?>
            </div>
        </div>
    </div>

    <div class="offer-reservation">
        <?= $this->Form->create($booking, ['url' => ['controller' => 'Bookings', 'action' => 'add']]) ?>
        <fieldset>
            <div class="make-reservation">
                <div class="calendar-main-div">
                    <div class="offer-description-main">
                        <h4>Kalendarz</h4>
                    </div>
                    <div id="my-calendar"></div>
                </div>

                <script type="application/javascript">
                    $(document).ready(function() {
                        $("#my-calendar").zabuto_calendar({
                            year: 2022,
                            month: 5,
                            show_previous: false,
                            show_next: 12,
                            language: "pl",
                            data: <?php echo json_encode($calendar_data) ?>,
                            today: true,
                            show_days: true,
                            cell_border: true,
                            nav_icon: {
                                prev: '<',
                                next: '>'
                            },

                            action: function() {
                                myDateFunction(this.id);
                            }
                        });

                        function myDateFunction(id) {
                            var e = $("#" + id).children('div').hasClass('free');
                            var date = $("#" + id).data("date");
                            //var hasEvent = $("#" + id).data("hasEvent");
                            if (e) {
                                $("#booking-date").val(date);
                            }
                        }
                    });
                </script>
                <div class="reservation-input-and-button">
                    <div class="reservation-input-and-button-white-box">
                        <?= $this->Form->control('booking_date', ['options' => $active_offer_days, 'class' => 'reservation-date', 'label' => 'Dokonaj rezerwacji', 'empty' => 'Wybierz datę rezerwacji', 'required' => true]); ?>
                        <?= $this->Form->hidden('offer_id'); ?>
                        <div>
                            <?= $this->Form->button(__('Zarezerwuj'), ['class' => 'button-reserve']) ?>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
        <?= $this->Form->end() ?>
    </div>

    <?= $this->element('profile-banners/offer-owner-profile-banner'); ?>

    <div class="offer-opinions">
        <div class="rating">
            <h4>Ocena</h4>
            <div class="rate-box">
                <?php foreach ($averages as $average) : ?>
                    <?php if ($average['offer_id'] == $offer->id) : ?>
                        <div class="rating-combo">
                            <?= $this->Html->image('rating-star.svg') ?>
                            <h4><?= $average['avg'] ?></h4>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="opinions">
            <h4>Opinie</h4>
            <div class="white-box">
                <?php if ($account_type_id == 1) : ?>
                <div class="input-button-box">
                    <div>
                        <?= $this->Form->create() ?>
                        <fieldset>
                            <?php echo $this->Form->control('description', ['type' => 'textarea', 'label' => 'Dodaj opinię']); ?>
                            <?php echo $this->Form->control(
                                'rating',
                                ['type' => 'number', 'min' => 1, 'max' => '5', 'class' => 'rating-selection', 'label' => 'Ocena']
                            ); ?>
                        </fieldset>
                        <?= $this->Form->button(__('Dodaj opinię'), ['type' => 'submit']) ?>
                        <?= $this->Form->end() ?>
                    </div>
                    <?php endif; ?>
                </div>

                <?php foreach ($ratings as $rating) : ?>
                    <?= $this->element('opinions', ['rating' => $rating]) ?>
                <?php endforeach; ?>

            </div>
        </div>

    </div>
    <div>
        <?= $this->Html->link(__('Wróć'), ['controller' => 'categories', 'action' => 'view', $offer->category_id], ['class' => 'side-nav-item button float-right']) ?>
    </div>

</div>
