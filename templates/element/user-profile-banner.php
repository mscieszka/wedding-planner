<div class="provider_container">
    <div class="provider_image">
        <?= $this->Html->image('userProfileImage/userProfileImage3.jpg', ['alt' => 'Owner profile image', 'class' => 'ownerimg']) ?>
    </div>
    <div class="provider_info">
        <div class="provider_name">
            <p class="property_name"><?= __('Name:   ') ?></p>
            <p><?= h($user->name) . "   " ?></p>
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
        <?php if ($user->id == $id_user_log) : ?>
            <?= $this->Html->link(__('Edytuj profil'), ['action' => 'edit', $user->id], ['class' => 'side-nav-item button float-right']) ?>
            <?= $this->Html->link(__('Wyloguj'), ['action' => 'logout'], ['class' => 'side-nav-item button float-right']) ?>
        <?php endif; ?>
    </div>
</div>
