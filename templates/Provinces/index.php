<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Province[]|\Cake\Collection\CollectionInterface $provinces
 */
?>
<?= $this->Html->css('provinces') ?>
<div class="provinces index content">
    <h3><?= __('Wyświetl oferty wg województwa') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
            <tr>
                <th><?= $this->Paginator->sort('name', 'Województwo', ['direction' => 'asc']) ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($provinces as $province) : ?>
                <tr>
                    <td><?= $this->Html->link(h($province->name), ['action' => 'view', $province->id]) ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
