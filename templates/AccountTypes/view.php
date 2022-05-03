<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AccountType $accountType
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Account Type'), ['action' => 'edit', $accountType->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Account Type'), ['action' => 'delete', $accountType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $accountType->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Account Types'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Account Type'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="accountTypes view content">
            <h3><?= h($accountType->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Account Name') ?></th>
                    <td><?= h($accountType->account_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($accountType->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($accountType->created) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Users') ?></h4>
                <?php if (!empty($accountType->users)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Email') ?></th>
                            <th><?= __('Password') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Surname') ?></th>
                            <th><?= __('Phone Number') ?></th>
                            <th><?= __('Enabled') ?></th>
                            <th><?= __('Confirmed Email') ?></th>
                            <th><?= __('Company Name') ?></th>
                            <th><?= __('Krs') ?></th>
                            <th><?= __('Nip') ?></th>
                            <th><?= __('Regon') ?></th>
                            <th><?= __('Account Type Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($accountType->users as $users) : ?>
                        <tr>
                            <td><?= h($users->id) ?></td>
                            <td><?= h($users->email) ?></td>
                            <td><?= h($users->password) ?></td>
                            <td><?= h($users->name) ?></td>
                            <td><?= h($users->surname) ?></td>
                            <td><?= h($users->phone_number) ?></td>
                            <td><?= h($users->enabled) ?></td>
                            <td><?= h($users->confirmed_email) ?></td>
                            <td><?= h($users->company_name) ?></td>
                            <td><?= h($users->krs) ?></td>
                            <td><?= h($users->nip) ?></td>
                            <td><?= h($users->regon) ?></td>
                            <td><?= h($users->account_type_id) ?></td>
                            <td><?= h($users->created) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
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
