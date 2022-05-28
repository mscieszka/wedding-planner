<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>






<header>
    <?= $this->Html->link(__('List Categories'), ['action' => 'index'], ['class' => 'button float-right']) ?>


    <div class="search-bar">
        <div class="kind_of_search">
            <?php  echo $this->Html->image('lupa.svg', ['alt' => 'Wedding Planner']); ?>
            <input placeholder="Czego szukasz ?">
        </div>
        |
        <div class="place_search">
            <?php  echo $this->Html->image('miejsce.svg', ['alt' => 'Wedding Planner']); ?>
            <input placeholder="Cała Polska">
        </div>
    </div>


    <?php if($account_type_id == 1): ?>
        <?= $this->Html->link(__('My saved offers'), ['controller' => 'Offers', 'action' => 'index', 2],  ['class' => 'button float-right']) ?>
    <?php endif; ?>
    <?php if($account_type_id == 2): ?>
        <?= $this->Html->link(__('My Offer'), ['controller' => 'Offers', 'action' => 'index',1], ['class' => 'button float-right']) ?>
    <?php endif; ?>
    <?= $this->Html->link(__('Profil'), ['controller' => 'Users', 'action' => 'profile'], ['class' => 'button', 'id' => 'button float-right']) ?>
</header>











<div class="row">
    <aside class="column">
        <div class="side-nav">
            <!--<h4 class="heading"><?= __('Actions') ?></h4>-->
           <!-- <h4> <?= $this->Html->link(__('List Categories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?> </h4> -->

        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="categories view content">
            <h3><?= h($category->name) ?></h3>
            <div class="related">
                <h4><?= __('Related Offers') ?></h4>
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


                            <?php if($account_type_id == 2): ?>
                            <td class="actions">
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
