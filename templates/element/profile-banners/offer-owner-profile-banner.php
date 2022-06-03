<div class="profile-banner">
    <a class="user-image">
        <?= $this->Html->image('userProfileImage/userProfileImage3.jpg', [
            'alt' => 'Zdjęcie profilowe użytkownika',
            'class' => 'user-profile-picture'
        ]) ?>
    </a>
    <div class="user-details">
        <div class="user-name">
            <h2><?= h($offer->user->name); ?></h2>
            <h2><?= h($offer->user->surname); ?></h2>
        </div>
        <div class="user-contact-info">
            <div class="contact-info-email flex-row">
                <?= $this->Html->image('icons/icon-email.svg', [
                    'alt' => 'Email icon'
                ]); ?>
                <h2><?= h($offer->user->email); ?></h2>
            </div>
            <div class="contact-info-phone flex-row">
                <?= $this->Html->image('icons/icon-phone.svg', [
                    'alt' => 'Phone icon'
                ]); ?>
                <h2><?= h($offer->user->phone_number); ?></h2>
            </div>
        </div>
    </div>
    <div class="owner-profile-link">
        <?= $offer->has('user') ? $this->Html->link("Zobacz więcej ofert użytkownika", ['controller' => 'Users', 'action' => 'profile', 1, $offer->user->id]) : '' ?>
    </div>
</div>
