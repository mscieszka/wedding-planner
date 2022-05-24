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
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Offers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="offers form content">
            <?= $this->Form->create($offer) ?>
            <fieldset>
                <legend><?= __('Add Offer') ?></legend>
<!--                TODO: match form fields with prototype-->
<!--                --><?php //echo $this->Form->control('user_id', ['options' => $users]); ?>
<!--                --><?php //echo $this->Form->control('advance_payment'); ?>
                <div class="grid-add-offers">
                    <div class="add-offers-type">
                        <h3>Wybierz rodzaj usługi</h3>
<!--                        Sale | Zespół muzyczny / DJ | Katering-->
                        <?php echo $this->Form->control('category_id', ['options' => $categories]); ?>
                    </div>
                    <div class="add-offers-params">
                        <h3>Parametry oferty</h3>
                        <!--                    Nazwa zespołu / DJ-->
                        <?php echo $this->Form->control('name'); ?>

                        <!--                    Cena za event-->
                        <?php echo $this->Form->control('price', ['min' => 1, 'max' => 100000]); ?>

                        <!--                    <h4>Gatunek muzyki</h4>-->
                        <!--                    <h4>Dodatkowe informacje</h4>-->
                    </div>
                    <div class="add-offers-address">
                        <h3>Adres</h3>
                                <?= $this->Form->create($address) ?>
                                <fieldset>
                                    <legend><?= __('Add Address') ?></legend>
                                    <?php
                                    echo $this->Form->control('street');
                                    echo $this->Form->control('house_number');
                                    echo $this->Form->control('postal_code');
                                    echo $this->Form->control('city');
                                    echo $this->Form->control('province_id', ['options' => $provinces, 'empty' => true]);
                                    ?>
                                </fieldset>
                               <!-- <?= $this->Form->button(__('Submit')) ?> -->
                                <!--<?= $this->Form->end() ?>-->

                    </div>
                    <div class="add-offers-description">
                        <h3>Opis</h3>
                        <!--                    Pole tekstowe na opis -->
                        <?php echo $this->Form->control('description', ['placeholder' => 'Dodaj opis oferty...']); ?>

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
            <?= $this->Form->button(__('Dodaj ofertę')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
