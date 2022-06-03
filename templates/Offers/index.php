<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Offer[]|\Cake\Collection\CollectionInterface $offers
 */
?>
<?= $this->Html->css('offersIndex') ?>
<div class="offers index content">
    <?php if ($account_type_id == 2) : ?>
        <h3>Dodaj ofertę z kategorii:</h3>
        <div class="add-offer-buttons">
            <?= $this->Html->link(__('Katering'), ['action' => 'add', 3], ['class' => 'button float-right']) ?>
            <?= $this->Html->link(__('DJ / Zespół muzyczny'), ['action' => 'add', 2], ['class' => 'button float-right']) ?>
            <?= $this->Html->link(__('Sale'), ['action' => 'add', 1], ['class' => 'button float-right']) ?>
        </div>
    <?php endif; ?>

    <?php if ($onlymyoffer == null) : ?>
        <h3><?= __('Oferty') ?></h3>
    <?php endif; ?>

    <?php if ($onlymyoffer == 1) : ?>
        <h3><?= __('Moje oferty') ?></h3>
    <?php endif; ?>

    <?php if ($onlymyoffer == 2) : ?>
        <h3><?= __('Ulubione oferty') ?></h3>
    <?php endif; ?>

    <div class="table-responsive">
        <table>
            <thead>
            <tr>
                <th><?= $this->Paginator->sort('name', 'Oferta') ?></th>
                <th><?= $this->Paginator->sort('price', 'Cena') ?></th>
            </tr>
            </thead>
            <tbody>

            <?php foreach ($offers as $offer) : ?>

                <?php if ($onlymyoffer == 2) : ?>
                    <?php if (!(in_array($offer->id, $saved_user_offers))) : continue; ?>
                    <?php endif; ?>
                <?php endif; ?>

                <tr>
                    <td><?= $this->Html->link(h($offer->name), ['action' => 'view', $offer->id]) ?></td>
                    <td><?= $this->Number->format($offer->price) ?></td>
                    <td class="actions">
                        <?php if ($onlymyoffer == 1 || $onlymyoffer == null) : ?>
                            <?php if ($offer->user_id == $id_user_log) : ?>
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $offer->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $offer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $offer->id)]) ?>
                            <?php endif; ?>
                        <?php endif; ?>

                        <?php if ($account_type_id == 1) : ?>
                            <?php if (in_array($offer->id, $saved_user_offers)) : ?>
                                <?= $this->Form->postLink(__('Remove from favourites'), ['controller' => 'SavedUserOffers', 'action' => 'delete', $offer->id], ['confirm' => __('Are you sure you want to remove from favourites?')]) ?>
                            <?php else : ?>
                                <?= $this->Html->link(__('Add to favourite'), ['controller' => 'SavedUserOffers', 'action' => 'add', $offer->id]) ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
