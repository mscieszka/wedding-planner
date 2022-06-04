<fieldset>
    <h3><?= __('Parametry oferty') ?></h3>
    <div class="grid-add-offers">
        <div class="add-offers-type">
            <?php echo $this->Form->hidden('category_id', ['options' => $categories, 'disabled' => true]); ?>
            <?php echo $this->Form->hidden('category_id'); ?>
        </div>
        <div class="add-offers-params">
            <?php echo $this->Form->control('name', ['label' => __('Tytuł')]); ?>
            <?php echo $this->Form->control('price', [
                'label' => __('Cena'),
                'min' => 1,
                'max' => 10000,
                'step' => 1,
                'required' => true
            ]); ?>
            <?php echo $this->Form->control('advance_payment', [
                'label' => __('Wysokość zaliczki (w %)'),
                'min' => 1,
                'max' => 50,
                'step' => 1,
                'required' => true
            ]); ?>
        </div>
        <div class="add-offers-address">
            <h3>Adres</h3>
            <?php
            echo $this->Form->control('address.street', [
                'label' => __('Ulica'),
                'required' => true
            ]);
            echo $this->Form->control('address.house_number', [
                'label' => __('Numer'),
                'required' => true
            ]);
            echo $this->Form->control('address.postal_code', [
                'label' => __('Kod pocztowy'),
                'required' => true
            ]);
            echo $this->Form->control('address.city', [
                'label' => __('Miejscowość'),
                'required' => true
            ]);
            echo $this->Form->control('address.province_id', [
                'label' => __('Województwo'),
                'options' => $provinces,
                'empty' => true,
                'required' => true
            ]);
            ?>
        </div>
        <div class="add-offers-description">
            <h3>Opis</h3>
            <?php echo $this->Form->control('description', [
                'type' => 'textarea',
                'placeholder' => __('Dodaj opis oferty...'),
                'label' => false
            ]); ?>
        </div>
        <div class="add-offers-contact">
            <h3>Dane kontaktowe</h3>
            <?php echo $this->Form->control('website', [
                'label' => __('Strona internetowa')
            ]); ?>
        </div>
        <div class="add-offers-active-days">
            <h3><?= __('Dostępne dni') ?></h3>
            <?= $this->Form->control('offer_active_day.monday', [
                'label' => __('Poniedziałek'),
                'type' => 'checkbox'
            ]); ?>
            <?=  $this->Form->control('offer_active_day.tuesday', [
                'label' => __('Wtorek'),
                'type' => 'checkbox'
            ]); ?>
            <?=  $this->Form->control('offer_active_day.wednesday', [
                'label' => __('Środa'),
                'type' => 'checkbox'
            ]); ?>
            <?=  $this->Form->control('offer_active_day.thursday', [
                'label' => __('Czwartek'),
                'type' => 'checkbox'
            ]); ?>
            <?=  $this->Form->control('offer_active_day.friday', [
                'label' => __('Piątek'),
                'type' => 'checkbox'
            ]); ?>
            <?=  $this->Form->control('offer_active_day.saturday', [
                'label' => __('Sobota'),
                'type' => 'checkbox'
            ]); ?>
            <?=  $this->Form->control('offer_active_day.sunday', [
                'label' => __('Niedziela'),
                'type' => 'checkbox'
            ]); ?>
        </div>
    </div>
</fieldset>
<?= $this->Form->button(__('Dodaj ofertę')) ?>
