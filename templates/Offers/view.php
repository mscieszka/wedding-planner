<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Offer $offer
 */
?>
<?= $this->Html->css('viewOffer') ?>
<div class="offer-container">
    <div class="offer-gallery">
        <div class="title-location">
            <div class="offer-title">
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
            <?= $this->Form->control(' ', ['options' => $active_offer_days, 'class' => 'reservation-date', 'required' => true, 'empty' => 'Wybierz datę rezerwacji']); ?>
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
                <h3>Dodaj opinię</h3>
                <div class="input-button-box">
                    <label>
                        <textarea></textarea>
                    </label>
                    <button class="send-opinion">Dodaj</button>
                </div>
            </div>
            <div class="opinion-box">
                <a class="user-img">
                    <?= $this->Html->image('userProfileImage/userProfileImage1.jpg', ['alt' => 'User profile image', 'class' => 'userimg']) ?>
                </a>
                <div class="rest-of-opinion">
                    <div class="upper-box">
                        <h3>Anna Nowak</h3>
                        <h4>La Boheme Restaurant</h4>
                        <h4>2022/04/06</h4>
                    </div>
                    <div class="opinion-content">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, porro ullam. Inventore, quidem?
                            Placeat adipisci natus, deserunt deleniti quibusdam earum aspernatur illo quae, commodi
                            similique sit, veritatis numquam libero! Consectetur sequi natus laudantium ipsum corrupti velit
                            voluptatum excepturi possimus omnis tenetur blanditiis, hic optio inventore accusamus voluptate,
                            culpa consequatur facere expedita veniam eveniet libero quod odio nihil saepe! Iste, error!</p>
                    </div>
                </div>
            </div>
            <div class="opinion-box">
                <a class="user-img">
                    <?= $this->Html->image('userProfileImage/userProfileImage2.jpg', ['alt' => 'User profile image', 'class' => 'userimg']) ?>
                </a>
                <div class="rest-of-opinion">
                    <div class="upper-box">
                        <h3>Anna Nowak</h3>
                        <h4>La Boheme Restaurant</h4>
                        <h4>2022/04/06</h4>
                    </div>
                    <div class="opinion-content">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. In earum, sunt autem architecto ullam
                            saepe. Nulla esse sint ipsum praesentium.</p>
                    </div>
                </div>
            </div>
            <div class="opinion-box">
                <a class="user-img">
                    <?= $this->Html->image('userProfileImage/userProfileImage3.jpg', ['alt' => 'User profile image', 'class' => 'userimg']) ?>
                </a>
                <div class="rest-of-opinion">
                    <div class="upper-box">
                        <h3>Anna Nowak</h3>
                        <h4>La Boheme Restaurant</h4>
                        <h4>2022/04/06</h4>
                    </div>
                    <div class="opinion-content">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore ipsam nemo sed. Veniam ipsa
                            quos, nobis laudantium dolore quam, in neque minus facilis ullam, sint sapiente odit quo aliquam
                            quae hic accusamus delectus ipsam autem consectetur earum velit eum. Officia, quasi nihil
                            commodi amet veniam quas incidunt provident quis expedita deserunt deleniti rem quaerat
                            assumenda corrupti tempora vero dolorum eligendi reiciendis esse vel eius. Delectus atque quo
                            voluptas ex tenetur fuga voluptatum assumenda laboriosam ipsam, tempora ratione illo, architecto
                            beatae odit iste perspiciatis. Repellendus ratione reiciendis architecto aliquid ex saepe, et
                            quis velit aliquam tenetur nostrum iure molestiae quia obcaecati.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
