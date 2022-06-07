<fieldset>
    <div class="grid-add-offers">
        <div class="add-offers-photos">
            <label><?= __('Zdjęcia') ?></label>
            <?= $this->Form->control('attachment[]', [
                'type' => 'file',
                'multiple'=>true,
                'label' => false,
                'required' => false
            ]); ?>
        </div>
        <div class="add-offers-type">
            <?= $this->Form->hidden('category_id', ['options' => $categories, 'disabled' => true]); ?>
            <?= $this->Form->hidden('category_id'); ?>
        </div>
        <div class="add-offers-params">
            <?= $this->Form->control('name', [
                'label' => __('Tytuł'),
                'required' => true
            ]); ?>

            <?php
            $cena_napis = null;
            if ($offer->category_id == 2) {
                $cena_napis = 'Cena za godzinę (zł)' ;
                }
                else {
                    $cena_napis = 'Cena za osobę (zł)' ;
                }
            ?>

            <?= $this->Form->control('price', [
                'label' => __(       h($cena_napis)),
                'type' => 'number',
                'min' => 1,
                'max' => 10000,
                'step' => 1,
                'required' => true
            ]); ?>
            <?= $this->Form->control('advance_payment', [
                'label' => __('Wysokość zaliczki (%)'),
                'type' => 'number',
                'min' => 1,
                'max' => 50,
                'step' => 1,
                'required' => true
            ]); ?>
        </div>
        <h3>Adres</h3>
        <div class="add-offers-address">
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
<!--        <h3>Opis</h3>-->
        <div class="add-offers-combo">
            <div class="add-offers-description">
                <?php echo $this->Form->control('description', [
                    'type' => 'textarea',
                    'placeholder' => __('Dodaj opis oferty...'),
                    'label' => __('Opis'),
                    'maxlength' => 2000,
                    'required' => true
                ]); ?>
            </div>
            <div class="add-offers-contact">
                <?php echo $this->Form->control('website', [
                    'label' => __('Strona internetowa')
                ]); ?>
            </div>
        </div>

        <h3><?= __('Dostępne dni') ?></h3>
        <div class="add-offers-active-days">
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
<?= $this->Form->button(__('Zaakceptuj ofertę')) ?>
