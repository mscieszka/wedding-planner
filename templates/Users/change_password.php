<?= $this->Html->css('login') ?>
<div class="users form">
    <?= $this->Flash->render() ?>
    <?= $this->Form->create(null, ['id'=>'reset_form']) ?>
    <fieldset>
        <?= $this->Form->control('old_password', ['type'=>'password', 'required' => true, 'placeholder' => 'Old password']) ?>
        <?= $this->Form->control('password', ['type'=>'password', 'required' => true, 'placeholder' => 'Wpisz hasło']) ?>
        <?= $this->Form->control('password_', ['type'=>'password', 'required' => true, 'placeholder' => 'Wpisz hasło']) ?>
    </fieldset>
    <?= $this->Form->submit(__('Reset password')); ?>
    <?= $this->Form->end() ?>
</div>
<script>
    $(document).ready(function() {
        $("#reset_form").submit(function(e) {
            if($('[name = "password"]').val() === $('[name = "password_"]').val()) {
                return true;
            }
            else {
                e.preventDefault();
                alert("Passwords not equal!");
            }
        })
    });
</script>
