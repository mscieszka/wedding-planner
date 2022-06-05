<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Address $address
 */
?>
<?= $this->Html->css('addressesView') ?>
<div class="row">
    <aside class="column">
            <?php if($account_type_id == 2 || $account_type_id==1): ?>
        <div class="side-nav">
                <?php if($address->user_id == $id_user_log):?>
                    <h4> <?= $this->Html->link(__('Edytuj adres'), ['action' => 'edit', $address->id], ['class' => 'side-nav-item']) ?></h4>
                <?php endif; ?>
        </div>
            <?php endif; ?>

    </aside>
    <div class="column-responsive column-80">
        <div class="addresses-view-content">
                <div>
                    <h4><?= __('Miejscowość') ?></h4>
                    <h5><?= h($address->city) ?></h5>
                </div>
                <div>
                    <h4><?= __('Ulica') ?></h4>
                    <h5><?= h($address->street) ?></h5>
                </div>
                <div>
                    <h4><?= __('Numer') ?></h4>
                    <h5><?= h($address->house_number) ?></h5>
                </div>
                <div>
                    <h4><?= __('Kod pocztowy') ?></h4>
                    <h5><?= h($address->postal_code) ?></h5>
                </div>
                <div>
                    <h4><?= __('Województwo') ?></h4>
                    <h5 class="province"><?= $address->has('province') ? $this->Html->link($address->province->name, ['controller' => 'Provinces', 'action' => 'view', $address->province->id]) : '' ?></h5>
                </div>
            </div>
    </div>
</div>

