<header>
    <nav class="top-nav">
        <div class="top-nav-title">
            <div class="top-nav-logo">
                <a href="<?= $this->Url->build('/') ?>">
                    <?php echo $this->Html->image("logo.svg")?>
                </a>
            </div>
        </div>
        <div class="top-nav-links">
            <div class="profile-icon">
                <?= $this->Html->image('profile_icon.png', [
                    'alt' => 'Profile icon',
                    'url' => ['controller' => 'Users', 'action' => 'profile']
                ]); ?>
            </div>
        </div>
    </nav>
</header>
