<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 * @var \Cake\Collection\CollectionInterface|string[] $accountTypes
 */
?>
<?= $this->Html->css('addUser') ?>
<div class="row">
    <div class="column-responsive column-80">
        <?= $this->Form->create($user, ['type' => 'file']) ?>
        <fieldset>
            <div class="legend_container">
                <legend class="legend_second legend_second_recipient_mobile_border" id="uslugodawca"><?= $this->Html->link("USŁUGODAWCA", ['action' => 'add', 2]) ?></legend>
                <legend class="legend_first background_mobile_checked legend_first_recipient_mobile_border" id="uslugobiorca">USŁUGOBIORCA</legend>
            </div>
            <div class="users form content border_recipient">
                <div class="inputs_wrapper">
                    <div class="form_column">
                        <?php
                        echo $this->Form->hidden('account_type_id');
                        echo $this->Form->control('name', ['required' => true, 'placeholder' => ' Imię', 'class' => 'require_data']);
                        echo $this->Form->control('surname', ['required' => true, 'placeholder' => ' Nazwisko', 'class' => 'require_data']);
                        echo $this->Form->control('email', ['required' => true, 'placeholder' => ' Adres e-mail', 'class' => 'require_data']);
                        ?>
                    </div>
                    <div class="form_column">
                        <?php
                        echo $this->Form->control('phone_number', ['required' => true, 'placeholder' => ' Numer telefonu', 'class' => 'require_data']);
                        echo $this->Form->control('password', ['required' => true, 'placeholder' => ' Hasło', 'class' => 'require_data']);
                        ?>
                        <label>
                            <input type="password" name="" placeholder=" Potwierdź hasło" class="require_data">
                        </label>

                        <fieldset>
                            <legend><?= __('Zdjęcie profilowe') ?></legend>
                            <?= $this->Form->control('attachment[]', [
                                'type' => 'file',
                                'multiple'=>true,
                                'label' => false
                            ]); ?>
                        </fieldset>
                    </div>
                </div>
                <div class="form_end_content">
                    <label style="color: #FF7A7A;"><input type="checkbox" name="">Akceptuję regulamin<br></label>
                    <?= $this->Form->button(__('Zarejestruj się')) ?>
                </div>
            </div>
        </fieldset>
        <?= $this->Form->end() ?>
    </div>
</div>
