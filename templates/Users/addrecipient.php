<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 * @var \Cake\Collection\CollectionInterface|string[] $accountTypes
 */
?>
<?= $this->Html->css('add') ?>
<div class="row">
    <!--<aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>-->
    <div class="column-responsive column-80">
        <?= $this->Form->create($user) ?>
        <fieldset>
            <!--<legend><?= __('Add User recipient') ?></legend>-->
            <div class="legend_container">
                <legend class="legend_first" id="uslugodawca">USŁUGOBIORCA</legend>
                <legend class="legend_second" id="uslugobiorca"><?= $this->Html->link("USŁUGODAWCA", ['action' => 'add', 2]) ?></legend>
            </div>
            <div class="users form content">
                <div class="inputs_wrapper">
                    <div class="form_column">
                        <?php
                        echo $this->Form->hidden('account_type_id');
                        echo $this->Form->control('name', ['required' => false, 'placeholder' => ' Imię (opcjonalnie)']);
                        echo $this->Form->control('surname', ['required' => true, 'placeholder' => ' Nazwisko (opcjonalnie)', 'class' => 'require_data']);
                        echo $this->Form->control('email', ['required' => true, 'placeholder' => ' Adres e-mail', 'class' => 'require_data']);
                        echo $this->Form->control('phone_number', ['required' => true, 'placeholder' => ' Numer telefonu', 'class' => 'require_data']);
                        echo $this->Form->control('password', ['required' => true, 'placeholder' => ' Hasło', 'class' => 'require_data']);
                        //                    echo $this->Form->control('confirmed_password');
                        ?>
                    </div>
                    <div class="form_column">
                        <input type="password" name="" placeholder=" Potwierdź hasło" class="require_data">
                        <?php
                        echo $this->Form->control('company_name', ['required' => true, 'placeholder' => ' Nazwa działalności', 'class' => 'require_data']);
                        echo $this->Form->control('krs', ['required' => true, 'placeholder' => ' KRS', 'class' => 'require_data']);
                        echo $this->Form->control('nip', ['required' => true, 'placeholder' => ' NIP', 'class' => 'require_data']);
                        echo $this->Form->control('regon', ['required' => false, 'placeholder' => ' REGON (opcjonalnie)']);
                        //                    echo $this->Form->control('enabled');
                        //                    echo $this->Form->control('confirmed_email');
                        //                    echo $this->Form->control('account_type_id', ['options' => $accountTypes]);
                        ?>
                    </div>
                </div>
                <div class="form_end_content">
                    <label style="color: red;"><input type="checkbox" name="">Akceptuję regulamin<br></label>
                    <?= $this->Form->button(__('Zarejestruj się')) ?>
                </div>
            </div>
        </fieldset>

        <?= $this->Form->end() ?>
    </div>
</div>
