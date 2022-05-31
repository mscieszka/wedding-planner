<div class="sidebar">
    <a class="category">Katering</a>

        <?php if($account_type_id == 2): ?>
    <div class="side-nav">
            <?= $this->Html->link(__('Dodaj nową ofertę'), ['controller' => 'Offers', 'action' => 'add', h($category->id)]) ?>
    </div>
        <?php endif; ?>

    <label id="label_sorting_type" for="select_sorting_type">Sortowanie</label>
    <select name="sorting_types" id="select_sorting_type">
        <option value="by_popularity">Domyślnie</option>
        <option value="by_popularity">Od najpopularniejszych</option>
        <option value="by_lowest_price">Od najtańszych</option>
        <option value="by_highest_price">Od najdroższych</option>
    </select>
    <div class="filters">
        <h3>Filtry</h3>
        <div class="filter_cuisine_type">
            <h4>Rodzaj kuchni</h4>
            <div class="checkbox-pair">
                <input type="checkbox" name="cuisine_type" id="cuisine_type_polish">
                <label for="cuisine_type_polish">Polska</label>
            </div>
            <div class="checkbox-pair">
                <input type="checkbox" name="cuisine_type" id="cuisine_type_italian">
                <label for="cuisine_type_italian">Włoska</label>
            </div>
            <div class="checkbox-pair">
                <input type="checkbox" name="cuisine_type" id="cuisine_type_usa">
                <label for="cuisine_type_usa">Amerykańska</label>
            </div>
            <div class="checkbox-pair">
                <input type="checkbox" name="cuisine_type" id="cuisine_type_french">
                <label for="cuisine_type_french">Francuska</label>
            </div>
            <div class="checkbox-pair">
                <input type="checkbox" name="cuisine_type" id="cuisine_type_asian">
                <label for="cuisine_type_asian">Azjatycka</label>
            </div>
        </div>
        <div class="filter_catering_additional_info">
            <h4>Dodatkowe informacje</h4>
            <div class="checkbox-pair">
                <input type="checkbox" name="catering_additional_info" id="additional_info_wegan">
                <label for="additional_info_wegan">Wegańska</label>
            </div>
            <div class="checkbox-pair">
                <input type="checkbox" name="catering_additional_info" id="additional_info_wegetarian">
                <label for="additional_info_wegetarian">Wegetariańska</label>
            </div>
            <div class="checkbox-pair">
                <input type="checkbox" name="cuisine_type" id="additional_info_gluten_free">
                <label for="additional_info_gluten_free">Bezglutenowa</label>
            </div>
        </div>
    </div>
</div>
