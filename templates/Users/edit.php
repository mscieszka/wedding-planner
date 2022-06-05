<?= $this->Html->css('changePassword') ?>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 * @var string[]|\Cake\Collection\CollectionInterface $accountTypes
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <?= $this->Html->link(__('Zmiana hasła'), ['action' => 'changePassword'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users-form-content">
            <?= $this->Form->create($user,  ['type' => 'file']) ?>
            <fieldset>
                <?php
                    echo $this->Form->control('email');
                    echo $this->Form->control('name', ['label' => __('Imię')]);
                    echo $this->Form->control('surname', ['label' => __('Nazwisko')]);
                    echo $this->Form->control('phone_number', ['label' => __('Numer telefonu')]);
                    if ($user->account_type_id == 2) {
                        echo $this->Form->control('company_name');
                        echo $this->Form->control('krs');
                        echo $this->Form->control('nip');
                    }
                    echo $this->Form->control('attachment[]', [
                        'required' => false,
                        'type' => 'file',
                        'multiple'=> true,
                        'label' => 'Zdjęcie profilowe'
                    ]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Potwierdź edycję')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
