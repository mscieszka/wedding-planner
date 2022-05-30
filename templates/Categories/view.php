<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>


<div class="row">
    <aside class="column">
        <div class="side-nav">
            <!--<h4 class="heading"><?= __('Actions') ?></h4>-->

            <?php if($account_type_id == 2): ?>
                <?= $this->Html->link(__('New Offer of this category'), ['controller' => 'Offers', 'action' => 'add', h($category->id)], ['class' => 'button float-right']) ?>
            <?php endif; ?>


        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="categories view content">
            <h3><?= h($category->name) ?></h3>
            <div class="related">
                <h4><?= __('Powiązane oferty') ?></h4>
                <?php if (!empty($category->offers)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Price') ?></th>
                            <th><?= __('Description') ?></th>
                        </tr>
                        <?php foreach ($category->offers as $offers) : ?>
                        <tr>
                            <td><?= $this->Html->link(__($offers->name), ['controller' => 'Offers', 'action' => 'view', $offers->id]) ?></td>
                            <td><?= h($offers->price) ?></td>
                            <td><?= h($offers->description) ?></td>



                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Offers', 'action' => 'view', $offers->id]) ?>
                                <?php if($account_type_id == 2): ?>
                                    <?php if (($offers->user_id) == $id_user_log):?>
                                        <?= $this->Html->link(__('Edit'), ['controller' => 'Offers', 'action' => 'edit', $offers->id]) ?>
                                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'Offers', 'action' => 'delete', $offers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $offers->id)]) ?>
                                    <?php endif; ?>
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
