<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Address $address
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Address'), ['action' => 'edit', $address->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Address'), ['action' => 'delete', $address->id], ['confirm' => __('Are you sure you want to delete # {0}?', $address->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Addresses'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Address'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="addresses view content">
            <h3><?= h($address->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Street') ?></th>
                    <td><?= h($address->street) ?></td>
                </tr>
                <tr>
                    <th><?= __('House Number') ?></th>
                    <td><?= h($address->house_number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Postal Code') ?></th>
                    <td><?= h($address->postal_code) ?></td>
                </tr>
                <tr>
                    <th><?= __('City') ?></th>
                    <td><?= h($address->city) ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $address->has('user') ? $this->Html->link($address->user->name, ['controller' => 'Users', 'action' => 'view', $address->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Province') ?></th>
                    <td><?= $address->has('province') ? $this->Html->link($address->province->name, ['controller' => 'Provinces', 'action' => 'view', $address->province->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($address->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($address->created) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Offers') ?></h4>
                <?php if (!empty($address->offers)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Category Id') ?></th>
                            <th><?= __('Address Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Price') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Advance Payment') ?></th>
                            <th><?= __('Website') ?></th>
                            <th><?= __('Created') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($address->offers as $offers) : ?>
                        <tr>
                            <td><?= h($offers->id) ?></td>
                            <td><?= h($offers->user_id) ?></td>
                            <td><?= h($offers->category_id) ?></td>
                            <td><?= h($offers->address_id) ?></td>
                            <td><?= h($offers->name) ?></td>
                            <td><?= h($offers->price) ?></td>
                            <td><?= h($offers->description) ?></td>
                            <td><?= h($offers->advance_payment) ?></td>
                            <td><?= h($offers->website) ?></td>
                            <td><?= h($offers->created) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Offers', 'action' => 'view', $offers->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Offers', 'action' => 'edit', $offers->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Offers', 'action' => 'delete', $offers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $offers->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
