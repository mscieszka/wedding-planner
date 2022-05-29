<?= $this->Html->css('loginUser') ?>
<div class="users form">
    <?= $this->Flash->render() ?>
    <?php // echo $this->Html->image('logo_full.svg', ['alt' => 'Wedding Planner']); ?>
    <?= $this->Form->create() ?>
    <fieldset>
        <?= $this->Form->control('email', ['required' => true, 'placeholder' => 'Wpisz adres e-mail']) ?>
        <?= $this->Form->control('password', ['required' => true, 'placeholder' => 'Wpisz hasło']) ?>
    </fieldset>
    <?= $this->Form->submit(__('Zaloguj się')); ?>
    <?= $this->Form->end() ?>
    <div class="users_form_links">
        <p class="first_link"><?= $this->Html->link("Nie pamiętam hasła", ['action' => '']) ?></p>
        <p class="second_link"><?= $this->Html->link("Resetuj hasło", ['action' => '']) ?></p>
        <div class="third_link"><?= $this->Html->link("Zarejestruj się", ['action' => 'add']) ?></div>
    </div>
</div>
