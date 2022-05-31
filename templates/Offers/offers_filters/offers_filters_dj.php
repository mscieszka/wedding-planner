<div class="sidebar">
    <a class="category">DJ / zespół muzyczny</a>

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
        <div class="filter_dj_music_type">
            <h4>Gatunek muzyki</h4>
            <div class="checkbox-pair">
                <input type="checkbox" name="music_type" id="music_type_disco_polo">
                <label for="music_type_disco_polo">Disco polo</label>
            </div>
            <div class="checkbox-pair">
                <input type="checkbox" name="music_type" id="music_type_pop">
                <label for="music_type_pop">Pop</label>
            </div>
            <div class="checkbox-pair">
                <input type="checkbox" name="music_type" id="music_type_rock">
                <label for="music_type_rock">Rock</label>
            </div>
            <div class="checkbox-pair">
                <input type="checkbox" name="music_type" id="music_type_oldies">
                <label for="music_type_oldies">Oldies</label>
            </div>
            <div class="checkbox-pair">
                <input type="checkbox" name="music_type" id="music_type_global">
                <label for="music_type_global">Muzyka światowa</label>
            </div>
        </div>

        <div class="filter_dj_additional_info">
            <h4>Dodatkowe informacje</h4>
            <div class="checkbox-pair">
                <input type="checkbox" name="dj_additional_info" id="dj_additional_info_wedding_games">
                <label for="dj_additional_info_wedding_games">Zabawy</label>
            </div>
        </div>
    </div>
</div>
