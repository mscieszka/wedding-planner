

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Offer[]|\Cake\Collection\CollectionInterface $offers
 */
?>
<div class="offers index content">
    <?php if($account_type_id == 2): ?>
        <?= $this->Html->link(__('New Offer'), ['action' => 'add'], ['class' => 'button float-right']) ?>
        <?= $this->Html->link(__('My Offer'), ['action' => 'index',1], ['class' => 'button float-right']) ?>
    <?php endif; ?>
    <h3><?= __('Offers') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('category_id') ?></th>
                <th><?= $this->Paginator->sort('address_id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('price') ?></th>
                <th><?= $this->Paginator->sort('advance_payment') ?></th>
                <th><?= $this->Paginator->sort('website') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($offers as $offer): ?>


                <?php if ($onlymyoffer == 2): ?>
                    <?php if(!(in_array($offer->id, $saved_user_offers))): continue; ?>

                    <?php endif; ?>
                <?php endif; ?>

                <tr>
                    <td><?= $this->Number->format($offer->id) ?></td>
                    <td><?= $offer->has('user') ? $this->Html->link($offer->user->name, ['controller' => 'Users', 'action' => 'view', $offer->user->id]) : '' ?></td>
                    <td><?= $offer->has('category') ? $this->Html->link($offer->category->name, ['controller' => 'Categories', 'action' => 'view', $offer->category->id]) : '' ?></td>
                    <td><?= $offer->has('address') ? $this->Html->link('Kliknij, aby zobaczyć adres', ['controller' => 'Addresses', 'action' => 'view', $offer->address->id]) : '' ?></td>
                    <td><?= h($offer->name) ?></td>
                    <td><?= $this->Number->format($offer->price) ?></td>
                    <td><?= $this->Number->format($offer->advance_payment) ?></td>
                    <td><?= h($offer->website) ?></td>
                    <td><?= h($offer->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $offer->id]) ?>
                        <?php if ($onlymyoffer == 1): ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $offer->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $offer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $offer->id)]) ?>
                        <?php endif; ?>

                        <?php if($account_type_id == 1): ?>
                            <?php if(in_array($offer->id, $saved_user_offers)): ?>
                                <?= $this->Form->postLink(__('Remove from favourites'), ['controller' => 'SavedUserOffers', 'action' => 'delete', $offer->id], ['confirm' => __('Are you sure you want to remove from favourites?')]) ?>
                            <?php else: ?>
                                <?= $this->Html->link(__('Add to favourite'), ['controller' => 'SavedUserOffers', 'action' => 'add', $offer->id]) ?>
                            <?php endif; ?>

                        <?php endif; ?>
                    </td>
                </tr>



            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>

