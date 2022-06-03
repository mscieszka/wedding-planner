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
<div class="go-back-to-parent-category">
    <?= $this->Html->link($offer->category->name, ['controller' => 'categories', 'action' => 'view', $offer->category_id], ['class' => 'side-nav-item button float-right']) ?>
</div>
<div class="offer-container">
    <div class="offer-gallery">
        <div class="title-location">
            <div class="offer-title">
                <h3><?= h($offer->name) ?></h3>
            </div>
            <div class="offer-location">
                <?= h($offer->address->city) ?>
            </div>
        </div>
        <div class="offer-gallery-img">

            <?php foreach($files as $file): ?>
                <?php $filePath = 'offerImages/'.(int)$offer->get('id').'/'.$file; ?>
                <?= $this->Html->image($filePath, ['alt' => 'Offer image', 'class' => 'offer-pic']) ?>
            <?php endforeach; ?>

        </div>
    </div>

    <div class="offer-details">
        <div class="offer-description">
            <div class="offer-description-main">
                <h4>Opis oferty</h4>
            </div>
            <?= $this->Text->autoParagraph(h($offer->description)); ?>
        </div>
        <div class="offer-address">
            <?= $offer->has('address') ? $this->Html->link('Kliknij, aby zobaczyć adres', ['controller' => 'Addresses', 'action' => 'view', $offer->address->id]) : '' ?>
        </div>
        <div class="offer-website">
            <h4>
                <?= "Nasza strona: " . h($offer->website) ?>
            </h4>
        </div>
        <div class="offer-price">
            <div class="offer-description-bold">
                <?php if ($offer->category_id == 2) : ?>
                    <!-- DJ -->
                    <h4>Cena za godzinę: </h4>
                <?php else : ?>
                    <h4>Cena za osobę: </h4>
                <?php endif; ?>
            </div>
            <div class="offer-price-amount">
                <?= $this->Number->format($offer->price) . " zł" ?>
            </div>
        </div>

        <div class="offer-advance-payment">
            <div class="offer-description-bold">
                <h4>Wysokość zaliczki: </h4>
            </div>
            <div class="offer-advance-payment-price">
                <?= $this->Number->format($offer->advance_payment) . " %" ?>
            </div>
        </div>
        <div>
            <?php if ($account_type_id == 1) : ?>
                <?php if (in_array($offer->id, $saved_user_offers)) : ?>
                    <?= $this->Form->postLink(__('Usun z ulubionych'), ['controller' => 'SavedUserOffers', 'action' => 'delete', $offer->id], ['confirm' => __('Czy napewno chcesz usunac te oferte z ulubionych?'), 'class' => 'button',]) ?>
                <?php else : ?>
                    <?= $this->Html->link(__('Dodaj do ulubionych'), ['controller' => 'SavedUserOffers', 'action' => 'add', $offer->id], ['class' => 'button']) ?>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>

    <div class="offer-reservation">
        <?= $this->Form->create($booking, ['url' => ['controller' => 'Bookings', 'action' => 'add']]) ?>
        <fieldset>
            <div class="make-reservation">
                <?= $this->Form->control('booking_date', ['options' => $active_offer_days, 'class' => 'reservation-date', 'label' => 'Dokonaj rezerwacji', 'empty' => 'Wybierz datę rezerwacji', 'required' => true]); ?>
                <?= $this->Form->hidden('offer_id'); ?>
                <div>
                    <?= $this->Form->button(__('Zarezerwuj'), ['class' => 'button-reserve']) ?>
                </div>
            </div>

        </fieldset>
        <?= $this->Form->end() ?>
    </div>

    <?= $this->element('profile-banners/offer-owner-profile-banner'); ?>

    <div class="offer-opinions">
        <div class="rating">
            <h2>Ocena</h2>
            <div class="rate-box">
                <h1>5,0</h1>
            </div>
        </div>
        <div class="opinions">
            <h2>Opinie</h2>
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
                    <div class="opinion-box">
                        <a class="user-img">
                            <?= $this->Html->image('userProfileImage/userProfileImage1.jpg', ['alt' => 'User profile image', 'class' => 'userimg'])  ?>
                        </a>
                        <div class="rest-of-opinion">
                            <div class="upper-box">
                                <h3><?= $rating->has('user') ? $this->Html->link($rating->user->name, ['controller' => 'Users', 'action' => 'profile', 1, $rating->user->id]) : '' ?></h3>
                                <h4><?= $rating->has('offer') ? $this->Html->link($rating->offer->name, ['controller' => 'Offers', 'action' => 'view', $rating->offer->id]) : '' ?></h4>
                                <h4><?= h($rating->opinion_date) ?></h4>
                            </div>
                            <div class="opinion-content">
                                <blockquote>
                                    <?= $this->Text->autoParagraph(h($rating->description)); ?>
                                </blockquote>

                                <?php if ($rating->user_id == $id_user_log) : ?>
                                    <td class="offer-name"><?= $this->Form->postLink(__('Usun komentarz'), ['controller' => 'Ratings', 'action' => 'delete', $rating->id], ['confirm' => __('Are you sure you want to remove this comment?')]) ?></td>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
    <div>
        <?= $this->Html->link(__('Wróć'), ['controller' => 'categories', 'action' => 'view', $offer->category_id], ['class' => 'side-nav-item button float-right']) ?>
    </div>
    <div class="">
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
                    prev: 'PREV',
                    next: 'NEXT'
                },

                action: function() {
                    myDateFunction(this.id);
                }
            });

            function myDateFunction(id) {
                var e = $("#" + id).children('div').hasClass('free');
                var date = $("#" + id).data("date");
                //var hasEvent = $("#" + id).data("hasEvent");
                // console.log(e);
                // console.log(date);
                // console.log(hasEvent);
                if (e) {
                    $("#booking-date").val(date);
                }
            }
        });
    </script>
</div>
