<?= $this->Html->css('loginUser') ?>
<div class="users form flex-col">
    <?= $this->Flash->render() ?>
    <?= $this->Form->create(null, ['class' => 'flex-col']) ?>
    <fieldset>
        <?= $this->Form->control('email', ['required' => true, 'placeholder' => 'Wpisz adres e-mail']) ?>
        <?= $this->Form->control('password', ['required' => true, 'placeholder' => 'Wpisz hasło']) ?>
    </fieldset>
    <?= $this->Form->submit(__('Zaloguj się')); ?>
    <?= $this->Form->end() ?>
    <div class="users_form_links">
        <p class="first_link"><?= $this->Html->link("Nie pamiętam hasła", ['action' => 'change_password']) ?></p>
        <div class="third_link"><?= $this->Html->link("Zarejestruj się", ['action' => 'add']) ?></div>
    </div>
</div>
