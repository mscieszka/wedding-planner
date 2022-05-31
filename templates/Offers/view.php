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
<div class="offer-container">
    <div class="offer-gallery">
        <div class="title-location">
            <div class="offer-title">
                <h3>
                    <?php if ($offer->category_id == 2): ?>
                Zespół muzyczny/DJ
                    <?php elseif ($offer->category_id == 1): ?>
                Sale
                    <?php elseif ($offer->category_id == 3): ?>
                Catering
                </h3>
                <?php endif; ?>

                    <h3><?= h($offer->name) ?></h3>
            </div>
            <div class="offer-location">
                <?=  h($offer->address->city) ?>
            </div>
        </div>
        <div class="offer-gallery-img">
            <?= $this->Html->image('offerImages/hall2_1.jpg', ['alt' => 'Offer main image', 'class' => 'offer-pic']) ?>
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
            <?= h($offer->website) ?>
        </div>
        <div class="offer-price">
            <div class="offer-description-bold">
                <?php if ($offer->category_id == 2): ?> <!-- DJ -->
                <h4>Cena za godzinę: </h4>
                <?php else: ?>
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
    </div>
    <div class="offer-reservation">
        <h2>Dokonaj rezerwacji</h2>
        <?= $this->Form->create($booking, ['url'=>['controller'=>'Bookings','action'=>'add']]) ?>
        <fieldset>
        <div class="make-reservation">
            <div>
            <?= $this->Form->control('booking_date', ['options' => $active_offer_days, 'class' => 'reservation-date', 'required' => true, 'empty' => 'Wybierz datę rezerwacji']); ?>
            <?= $this->Form->hidden('offer_id'); ?>
            </div>
            <div>
            <?= $this->Form->button(__('Zarezerwuj'), ['class' => 'button-reserve']) ?>
            </div>
        </div>
        </fieldset>
        <?= $this->Form->end() ?>
    </div>
    <div class="offer-owner-contacts">
        <a class="owner-img">
            <?= $this->Html->image('userProfileImage/userProfileImage3.jpg', ['alt' => 'Owner profile image', 'class' => 'ownerimg']) ?>
        </a>
        <div class="owner-name">
            <?= $offer->user->name; ?>
            <?= $offer->user->surname; ?>
        </div>
        <div class="owner-profile-link">
            <?= $offer->has('user') ? $this->Html->link("Zobacz więcej ofert użytkownika", ['controller' => 'Users', 'action' => 'view', $offer->user->id]) : '' ?>
        </div>
    </div>
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

                <div class="input-button-box">
                    <h3>Dodaj opinię</h3>
                    <div >
                    <?= $this->Form->create() ?>
                    <fieldset>


                        <?php echo $this->Form->control('description', ['type'=>'textarea']); ?>
                        <?php echo $this->Form->control('rating', ['type'=>'number','min'=>1,'max'=>'5' ,'class' => 'rating-selection']); ?>


                    </fieldset>
                        <?= $this->Form->button(__('Submit')) ?>
                        <?= $this->Form->end() ?>
                </div>
            </div>

            <?php foreach ($ratings as $rating): ?>
            <div class="opinion-box">
                <a class="user-img">
                    <?= $this->Html->image('userProfileImage/userProfileImage1.jpg', ['alt' => 'User profile image', 'class' => 'userimg']) ?>
                </a>
                <div class="rest-of-opinion">
                    <div class="upper-box">
                        <h3><?= $rating->has('user') ? $this->Html->link($rating->user->name, ['controller' => 'Users', 'action' => 'profile', $rating->user->id]) : '' ?></h3>
                        <h4><?= $rating->has('offer') ? $this->Html->link($rating->offer->name, ['controller' => 'Offers', 'action' => 'view', $rating->offer->id]) : '' ?></h4>
                        <h4><?= h($rating->opinion_date) ?></h4>
                    </div>
                    <div class="opinion-content">
                        <blockquote>
                            <?= $this->Text->autoParagraph(h($rating->description)); ?>
                        </blockquote>

                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
    <div>
        <?= $this->Html->link(__('Wroć'), ['controller' => 'categories', 'action' => 'view', $offer->category_id], ['class' => 'side-nav-item button float-right']) ?>
    </div>
