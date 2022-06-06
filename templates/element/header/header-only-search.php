<div class="search-bar">
    <div class="search-description">
        <label for="input_search_description">
            <?= $this->Html->image('lupa.svg', ['alt' => 'Wedding Planner']); ?>
        </label>
        <input id="input_search_description" placeholder="Czego szukasz ?">
    </div>
    <div class="search-separator">
        <h3>|</h3>
    </div>
    <div class="place_search">
        <label for="input_search_place">
            <?= $this->Html->image('miejsce.svg', ['alt' => 'Wedding Planner']); ?>
        </label>
        <input type="text" id="input_search_place" onkeyup="searchOffersByCityOrProvince()" placeholder="Cała Polska">
    </div>
</div>
