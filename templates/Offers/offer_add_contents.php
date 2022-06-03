<fieldset>
    <legend><?= __('Parametry oferty') ?></legend>
    <div class="grid-add-offers">
        <div class="add-offers-type">
            <?php echo $this->Form->hidden('category_id', ['options' => $categories, 'disabled' => true]); ?>
            <?php echo $this->Form->hidden('category_id'); ?>
        </div>
        <div class="add-offers-params">
            <?php echo $this->Form->control('name'); ?>
            <?php echo $this->Form->control('price', ['min' => 1, 'max' => 10000, 'step' => 1]); ?>
            <?php echo $this->Form->control('advance_payment', ['min' => 1, 'max' => 50, 'step' => 1]); ?>
        </div>
        <div class="add-offers-address">
            <h3>Adres</h3>
            <?php
            echo $this->Form->control('address.street');
            echo $this->Form->control('address.house_number');
            echo $this->Form->control('address.postal_code');
            echo $this->Form->control('address.city');
            echo $this->Form->control('address.province_id', ['options' => $provinces, 'empty' => true]);
            ?>
        </div>
        <div class="add-offers-description">
            <h3>Opis</h3>
            <?php echo $this->Form->control('description', ['type' => 'textarea', 'placeholder' => 'Dodaj opis oferty...']); ?>
        </div>
        <div class="add-offers-contact">
            <h3>Dane kontaktowe</h3>
            <?php echo $this->Form->control('website'); ?>
        </div>
        <div class="add-offers-photos">
            <h3>Zdjęcia</h3>
        </div>
    </div>
</fieldset>
<fieldset>
    <legend><?= __('Add Offer Active Day') ?></legend>
    <?php
    echo $this->Form->control('offer_active_day.monday', ['type' => 'checkbox']);
    echo $this->Form->control('offer_active_day.tuesday', ['type' => 'checkbox']);
    echo $this->Form->control('offer_active_day.wednesday', ['type' => 'checkbox']);
    echo $this->Form->control('offer_active_day.thursday', ['type' => 'checkbox']);
    echo $this->Form->control('offer_active_day.friday', ['type' => 'checkbox']);
    echo $this->Form->control('offer_active_day.saturday', ['type' => 'checkbox']);
    echo $this->Form->control('offer_active_day.sunday', ['type' => 'checkbox']);
    ?>
</fieldset>
<?= $this->Form->button(__('Save')) ?>
