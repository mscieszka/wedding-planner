<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Category'), ['action' => 'edit', $category->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Category'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Categories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Category'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="categories view content">
            <h3><?= h($category->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($category->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($category->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($category->created) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Offers') ?></h4>
                <?php if (!empty($category->offers)) : ?>
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
                        <?php foreach ($category->offers as $offers) : ?>
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
