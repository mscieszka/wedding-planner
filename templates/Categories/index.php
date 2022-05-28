<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category[]|\Cake\Collection\CollectionInterface $categories
 */
?>
<div class="categories index content">
    <h3><?= __('Kategorie') ?></h3>
    <div class="table-responsive">
        <table>
            <tbody>
                <?php foreach ($categories as $category): ?>
                <tr>
                    <td class="actions">
                        <?= $this->Html->link(__(h($category->name)), ['action' => 'view', $category->id]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>











