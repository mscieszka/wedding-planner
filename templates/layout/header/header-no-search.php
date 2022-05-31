<header>
    <nav class="top-nav">
        <div class="top-nav-title">
            <div class="top-nav-logo">
                <a href="<?= $this->Url->build('/') ?>">
                    <?php echo $this->Html->image("logo.svg")?>
                </a>
            </div>
        </div>
        <div class="top-nav-links flex-row">
        <?php if($account_type_id == 1): ?>
            <div>
                <?= $this->Html->link(__('My saved offers'), ['controller' => 'Offers', 'action' => 'index', 2],  ['class' => 'button']) ?>
            </div>
        <?php endif; ?>
        <?php if($account_type_id == 2): ?>
            <div>
                <?= $this->Html->link(__('My Offer'), ['controller' => 'Offers', 'action' => 'index',1],['class' => 'button']) ?>
            </div>
        <?php endif; ?>
            <div>
                <?= $this->Html->link(__('Profil'), ['controller' => 'Users', 'action' => 'profile'], ['class' => 'button']) ?>
            </div>
        </div>
    </nav>
</header>
