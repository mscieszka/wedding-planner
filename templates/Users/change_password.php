<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Offer $offer
 */
?>

<div class="content_wrapper_forgot_password">
    <?= $this->Flash->render() ?>
    <?= $this->Form->create(null, ['id' => 'reset_form']) ?>
    <fieldset>
        <div class="pass-div">
            <?= $this->Form->control('old_password', ['type' => 'password', 'required' => true, 'placeholder' => 'Stare hasło', 'class' => 'insert_email', 'id' => 'old-pass']) ?>
        </div>
        <div class="pass-div">
            <?= $this->Form->control('password', ['type' => 'password', 'required' => true, 'placeholder' => 'Nowe hasło', 'class' => 'insert_email', 'id' => 'new-pass']) ?>
        </div>
        <div class="pass-div">
            <?= $this->Form->control('password_', ['type' => 'password', 'required' => true, 'placeholder' => 'Powtórz nowe hasło', 'class' => 'insert_email', 'id' => 'conf-new-pass']) ?>
        </div>
    </fieldset>
    <div id="password-reset-submit">
        <?= $this->Form->submit(__('Reset password', ['margin-right' => '0'])); ?>
    </div>
    <?= $this->Form->end() ?>
</div>
<script>
    $(document).ready(function() {
        $("#reset_form").submit(function(e) {
            if ($('[name = "password"]').val() === $('[name = "password_"]').val()) {
                return true;
            } else {
                e.preventDefault();
                alert("Passwords not equal!");
            }
        })
    });
</script>
