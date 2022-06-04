<div class="users-profile-banner">
    <div class="profile-banner">
        <a class="user-image">



            <?php
            use Cake\Filesystem\Folder;
            $path = WWW_ROOT.'img'.DS.'userProfileImage'.DS. $user->id;
            if(!file_exists($path)) {
                $path = new Folder($path, true, 777);
            } else {
                $path = new Folder($path);
            }
            $files = $path->find();
            ?>

            <?php if (empty($files)) : ?>
                <?= $this->Html->image('userProfileImage/userProfileImage3.jpg', [
                    'alt' => 'Zdjęcie profilowe użytkownika',
                    'class' => 'user-profile-picture'
                ]) ?>
            <?php endif; ?>


            <?php if (!empty($files)) : ?>
                <?php foreach($files as $file): ?>
                    <?php $filePath = 'userProfileImage/'.(int)$user->get('id').'/'.$file; ?>
                    <?= $this->Html->image($filePath, [
                        'alt' => 'Zdjęcie profilowe użytkownika',
                        'class' => 'user-profile-picture'
                    ]) ?>
                    <?php break; ?>
                <?php endforeach; ?>
            <?php endif; ?>





        </a>
        <div class="user-details">
            <div class="user-name">
                <h2><?= h($user->name); ?></h2>
                <h2><?= h($user->surname); ?></h2>
            </div>
            <div class="user-contact-info">
                <div class="contact-info-email flex-row">
                    <?= $this->Html->image('icons/icon-email.svg', [
                        'alt' => 'Email icon'
                    ]); ?>
                    <h2><?= h($user->email); ?></h2>
                </div>
                <div class="contact-info-phone flex-row">
                    <?= $this->Html->image('icons/icon-phone.svg', [
                        'alt' => 'Phone icon'
                    ]); ?>
                    <h2><?= h($user->phone_number); ?></h2>
                </div>
            </div>
        </div>
        <?php if ($user->id == $id_user_log) : ?>
            <div class="provider-buttons">
                <?= $this->Html->link(__('Edytuj profil'), ['action' => 'edit', $user->id], ['class' => 'side-nav-item button float-right']) ?>
                <?= $this->Html->link(__('Wyloguj'), ['action' => 'logout'], ['class' => 'side-nav-item button float-right']) ?>
            </div>
        <?php endif; ?>
    </div>
</div>
