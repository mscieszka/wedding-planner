<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 * @var \App\Model\Entity\Offer $offer
 * @var \Cake\Collection\CollectionInterface|string[] $offers
 */


?>
<?= $this->Html->css(['miligram.min', 'normalize.min', 'profile-banner', 'viewProvider', 'viewUser', 'ratings']) ?>

<?php if ($user->account_type_id == 2) {
    $wynik = 0.0;
    $licznik = -1;

    foreach ($averages as $average) {
        if (in_array($average['offer_id'], $his_offers)) {
            $wynik = $wynik + $average['avg'];
            $licznik = 1 + $licznik;
        }
    }
    if ($licznik != 0) {
        $wynik2 = $wynik / $licznik;
    } else {
        $wynik2 = 0;
    }
} ?>

<div class="row">
    <div class="column-responsive column-80">
        <div class="profile-container">
            <?= $this->element('profile-banners/user-profile-banner'); ?>
            <div class="user-bookmarks-container">
                <div class="bookmarks_wrapper">
                    <?php if ($user->account_type_id == 1) : ?>
                        <div><?= $this->Html->link(__('Oferty obserwowane'), ['action' => 'profile', 1, $user->id]) ?></div>
                        <div class="current_bookmarks">Dodane oceny</div>
                    <?php endif; ?>
                    <?php if ($user->account_type_id == 2) : ?>
                        <div><?= $this->Html->link(__('Oferty użytkownika'), ['action' => 'profile', 1, $user->id]) ?></div>
                        <div class="current_bookmarks">Otrzymane oceny</div>
                    <?php endif; ?>
                    <?php if ($user->id == $id_user_log) : ?>
                        <div><?= $this->Html->link(__('Zamówienia'), ['action' => 'profile', 3, $user->id]) ?></div>
                    <?php endif; ?>
                </div>
                <div class="offer-opinions">
                    <?php if ($user->account_type_id == 2) : ?>
                        <div class="rating">
                            <h4>Ocena</h4>
                            <div class="rate-box">
                                <div class="rating-combo">
                                    <?php if ($wynik2 > 0): ?>
                                        <?= $this->Html->image('rating-star.svg') ?>
                                        <h4><?= round($wynik2, 1) ?></h4>
                                    <?php else: ?>
                                        <h4>Brak ocen</h4>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="opinions">
                        <h4>Opinie</h4>
                        <div class="white-box">
                            <?php if (!empty($ratings)) : ?>
                                <?php if ($user->account_type_id == 2) : ?>
                                    <?php foreach ($ratings as $rating) : ?>
                                        <?php if (!(in_array($rating->offer_id, $his_offers))) { continue; };?>
                                        <?= $this->element('opinions', ['rating' => $rating]) ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>

                                <?php if ($user->account_type_id == 1) : ?>
                                    <?php foreach ($ratings as $rating) : ?>
                                        <?php if ($rating->user_id == $user->id) :  ?>
                                            <?= $this->element('opinions', ['rating' => $rating]) ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
