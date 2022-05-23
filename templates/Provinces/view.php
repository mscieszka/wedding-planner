<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Province $province
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>

            <?= $this->Html->link(__('List Provinces'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>

        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="provinces view content">
            <h3><?= h($province->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($province->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($province->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Addresses') ?></h4>
                <?php if (!empty($province->addresses)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Street') ?></th>
                            <th><?= __('House Number') ?></th>
                            <th><?= __('Postal Code') ?></th>
                            <th><?= __('City') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Province Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($province->addresses as $addresses) : ?>
                        <tr>
                            <td><?= h($addresses->id) ?></td>
                            <td><?= h($addresses->street) ?></td>
                            <td><?= h($addresses->house_number) ?></td>
                            <td><?= h($addresses->postal_code) ?></td>
                            <td><?= h($addresses->city) ?></td>
                            <td><?= h($addresses->user_id) ?></td>
                            <td><?= h($addresses->province_id) ?></td>
                            <td><?= h($addresses->created) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Addresses', 'action' => 'view', $addresses->id]) ?>
                                <?php if($addresses->user_id == $id_user_log):?>
                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Addresses', 'action' => 'edit', $addresses->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Addresses', 'action' => 'delete', $addresses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $addresses->id)]) ?>
                                <?php endif; ?>



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
