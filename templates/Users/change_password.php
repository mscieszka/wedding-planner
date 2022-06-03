<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Offer $offer
 */
?>

<?= $this->Html->css('changePassword') ?>

<?= $this->Flash->render() ?>
<?= $this->Form->create(null, ['id' => 'reset_form', 'class' => 'flex-col']) ?>
<fieldset>
    <div class="change-password-title">
        <h3>Zmień hasło</h3>
    </div>
    <div class="pass-div">
        <?= $this->Form->control('old_password', [
            'type' => 'password',
            'required' => true,
            'placeholder' => 'Stare hasło',
            'id' => 'old-pass'
        ]) ?>
    </div>
    <div class="pass-div">
        <?= $this->Form->control('password', [
            'type' => 'password',
            'required' => true,
            'placeholder' => 'Nowe hasło',
            'id' => 'new-pass'
        ]) ?>
    </div>
    <div class="pass-div">
        <?= $this->Form->control('password_', [
            'type' => 'password',
            'required' => true,
            'placeholder' => 'Powtórz nowe hasło',
            'id' => 'conf-new-pass'
        ]) ?>
    </div>
</fieldset>
<div id="password-reset-submit">
    <?= $this->Form->submit(__('Potwierdź zmianę hasła')); ?>
</div>
<?= $this->Form->end() ?>

<script>
    $(document).ready(function() {
        $("#reset_form").submit(function(e) {
            if ($('[name = "password"]').val() === $('[name = "password_"]').val()) {
                return true;
            } else {
                e.preventDefault();
                alert("Podane hasła nie sa jednakowe");
            }
        })
    });
</script>
