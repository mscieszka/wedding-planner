<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Province $province
 */
?>
<?= $this->Html->css('provincesView') ?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <?= $this->Html->link(__('Wyświetl oferty według województwa'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="provinces-view-content">
            <?php function cmp($a, $b)
            {
                return strcmp($a->city, $b->city);
            }
            usort($province->addresses, "cmp");
            ?>

            <h3>Województwo <?= h($province->name) ?></h3>
            <div class="related">
                <h4>Powiązane oferty</h4>
                <?php if (!empty($province->addresses)) : ?>
                    <div class="table-responsive">

                            <?php foreach ($province->addresses as $addresses) : ?>
                                <?php foreach ($offers as $offert) : ?>
                                    <?php if ($addresses->id == $offert->address_id) : ?>
                                        <div class="single-offer">
                                            <h5><?= $this->Html->link($offert->name, ['controller' => 'Offers', 'action' => 'view', $offert->id]) ?></h5>
                                            <h5><?= $this->Html->link($offert->category->name, ['controller' => 'Categories', 'action' => 'view', $offert->category->id]) ?></h5>
                                            <h5><?= $offert->has('user') ? $this->Html->link($offert->user->name, ['controller' => 'Users', 'action' => 'profile', 1, $offert->user->id]) : '' ?></h5>
                                            <h5><?= h($offert->price) . " zł" ?></h5>
                                            <h5><?= $this->Html->link(__('Zobacz Adres'), ['controller' => 'Addresses', 'action' => 'view', $addresses->id]) ?></h5>

                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                    </div>

                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
