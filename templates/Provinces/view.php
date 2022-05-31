<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Province $province
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <?= $this->Html->link(__('Wyświetl oferty wg województwa'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="provinces view content">
            <?php function cmp($a,$b){
                return strcmp($a->city, $b->city);
            }
            usort($province->addresses, "cmp");
            ?>

            <h3>Województwo <?= h($province->name) ?></h3>
            <div class="related">
                <h4><?= __('Powiązane adresy z:  województwo') ?> <?= h($province->name) ?></h4>
                <?php if (!empty($province->addresses)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>

                            <th><?= __('Ulica') ?></th>
                            <th><?= __('Numer Domu') ?></th>
                            <th><?= __('Kod Pocztowy') ?></th>
                            <th><?= __('Miasto') ?></th>

                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($province->addresses as $addresses) : ?>
                        <tr>

                            <td><?= h($addresses->street) ?></td>
                            <td><?= h($addresses->house_number) ?></td>
                            <td><?= h($addresses->postal_code) ?></td>
                            <td><?= h($addresses->city) ?></td>

                            <td class="actions">
                                <?= $this->Html->link(__('Zobacz'), ['controller' => 'Addresses', 'action' => 'view', $addresses->id]) ?>
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
