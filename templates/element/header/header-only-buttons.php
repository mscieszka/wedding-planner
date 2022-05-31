<header>
    <nav class="top-nav">
        <div class="top-nav-links">
            <div>
                <?php if($account_type_id == 1): ?>
                    <?= $this->Html->link(__('My saved offers'), ['controller' => 'Offers', 'action' => 'index', 2],  ['class' => 'button']) ?>
                <?php endif; ?>
            </div>
            <div>
                <?php if($account_type_id == 2): ?>
                    <?= $this->Html->link(__('My Offer'), ['controller' => 'Offers', 'action' => 'index',1],['class' => 'button']) ?>
                <?php endif; ?>
            </div>
            <div>
                <?= $this->Html->link(__('Profil'), ['controller' => 'Users', 'action' => 'profile'], ['class' => 'button']) ?>
            </div>
        </div>
    </nav>
</header>
