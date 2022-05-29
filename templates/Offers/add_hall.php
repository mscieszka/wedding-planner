<?= $this->Html->css('addOffer') ?>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Offer $offer
 * @var \Cake\Collection\CollectionInterface|string[] $users
 * @var \Cake\Collection\CollectionInterface|string[] $categories
 * @var \Cake\Collection\CollectionInterface|string[] $addresses
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <!--<h4 class="heading"><?= __('Actions') ?></h4> -->
           <!-- <?= $this->Html->link(__('List Offers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?> -->
        </div>
    </aside>
    <div class="column-responsive column-80">
        <?= $this->Html->link(__('New Offer of Catering'), ['action' => 'add', 3 ], ['class' => 'button float-right']) ?>
        <?= $this->Html->link(__('New Offer of Music'), ['action' => 'add', 2], ['class' => 'button float-right']) ?>
        <div class="offers form content">
            <?= $this->Form->create($offer) ?>
            <fieldset>
                <legend><?= __('Offer of Hall') ?></legend>
<!--                TODO: match form fields with prototype-->
<!--                --><?php //echo $this->Form->control('user_id', ['options' => $users]); ?>
<!--                --><?php //echo $this->Form->control('advance_payment'); ?>
                <div class="grid-add-offers">
                    <div class="add-offers-type">
                        <h3>Wybierz rodzaj usługi</h3>
<!--                        Sale | Zespół muzyczny / DJ | Katering-->
                        <?php echo $this->Form->control('category_id', ['options' => $categories, 'disabled'=>true]); ?>
                        <?php echo $this->Form->hidden('category_id'); ?>
                    </div>
                    <div class="add-offers-params">
                        <h3>Parametry oferty</h3>
                        <!--                    Nazwa zespołu / DJ-->
                        <?php echo $this->Form->control('name'); ?>

                        <!--                    Cena za event-->
                        <?php echo $this->Form->control('price', ['min' => 1, 'max' => 100000, 'step'=>0.01]); ?>
                        <?php echo $this->Form->control('advance_payment', ['min' => 1, 'max' => 100000, 'step'=>0.01]); ?>

                        <!--                    <h4>Gatunek muzyki</h4>-->
                        <!--                    <h4>Dodatkowe informacje</h4>-->
                    </div>
                    <div class="add-offers-address">
                        <h3>Adres</h3>
                                <fieldset>
                                    <legend><?= __('Add Address') ?></legend>
                                    <?php
                                    echo $this->Form->control('address.street');
                                    echo $this->Form->control('address.house_number');
                                    echo $this->Form->control('address.postal_code');
                                    echo $this->Form->control('address.city');
                                    echo $this->Form->control('address.province_id', ['options' => $provinces, 'empty' => true]);
                                    ?>
                                </fieldset>

                    </div>
                    <div class="add-offers-description">
                        <h3>Opis</h3>
                        <!--                    Pole tekstowe na opis -->
                        <?php echo $this->Form->control('description', ['type'=>'textarea', 'placeholder' => 'Dodaj opis oferty...']); ?>

                    </div>
                    <div class="add-offers-contact">
                        <h3>Dane kontaktowe</h3>
                        <!--                    Telefon-->
                        <!--                    Email-->
                        <!--                    Strona internetowa-->
                        <?php echo $this->Form->control('website'); ?>
                    </div>
                    <div class="add-offers-photos">
                        <h3>Zdjęcia</h3>
                        <!--                                        Przycisk na dodanie zdjęcia -->
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <legend><?= __('Add Hall Filter') ?></legend>
                <?php
                echo $this->Form->control('hall_filter.hall_type_id', ['options' => $hallTypes]);
                echo $this->Form->control('hall_filter.air_conditioning', ['type'=>'checkbox']);
                echo $this->Form->control('hall_filter.garden', ['type'=>'checkbox']);
                echo $this->Form->control('hall_filter.terrace', ['type'=>'checkbox']);
                echo $this->Form->control('hall_filter.bar', ['type'=>'checkbox']);
                echo $this->Form->control('hall_filter.stage', ['type'=>'checkbox']);
                echo $this->Form->control('hall_filter.number_beds', ['type'=>'number']);
                echo $this->Form->control('hall_filter.number_people', ['type'=>'number']);
                echo $this->Form->control('hall_filter.price_for_the_night', ['type'=>'number', 'step'=>0.01]);
                ?>
            </fieldset>
            <fieldset>
                <legend><?= __('Add Offer Active Day') ?></legend>
                <?php
                echo $this->Form->control('offer_active_day.monday', ['type'=>'checkbox']);
                echo $this->Form->control('offer_active_day.tuesday', ['type'=>'checkbox']);
                echo $this->Form->control('offer_active_day.wednesday', ['type'=>'checkbox']);
                echo $this->Form->control('offer_active_day.thursday', ['type'=>'checkbox']);
                echo $this->Form->control('offer_active_day.friday', ['type'=>'checkbox']);
                echo $this->Form->control('offer_active_day.saturday', ['type'=>'checkbox']);
                echo $this->Form->control('offer_active_day.sunday', ['type'=>'checkbox']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Save')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
