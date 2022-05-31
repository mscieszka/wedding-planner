<header>
    <nav class="top-nav">
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
