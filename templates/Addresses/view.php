<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Address $address
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <?php if($account_type_id == 2): ?>
                <?php if($address->user_id == $id_user_log):?>
                    <?= $this->Html->link(__('Edytuj adres'), ['action' => 'edit', $address->id], ['class' => 'side-nav-item']) ?>
                <?php endif; ?>
            <?php endif; ?>

            <?php if($account_type_id == 1): ?>
                <?php if($address->user_id == $id_user_log):?>
                    <?= $this->Html->link(__('Edit Address'), ['action' => 'edit', $address->id], ['class' => 'side-nav-item']) ?>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="addresses view content">
            <table>
                <tr>
                    <th><?= __('Ulica') ?></th>
                    <td><?= h($address->street) ?></td>
                </tr>
                <tr>
                    <th><?= __('Numer') ?></th>
                    <td><?= h($address->house_number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Kod pocztowy') ?></th>
                    <td><?= h($address->postal_code) ?></td>
                </tr>
                <tr>
                    <th><?= __('Miejscowość') ?></th>
                    <td><?= h($address->city) ?></td>
                </tr>
                <tr>
                    <th><?= __('Województwo') ?></th>
                    <td><?= $address->has('province') ? $this->Html->link($address->province->name, ['controller' => 'Provinces', 'action' => 'view', $address->province->id]) : '' ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
