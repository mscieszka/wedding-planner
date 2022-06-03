<div class="sidebar">
    <a class="category">DJ / zespół muzyczny</a>
    <?php if ($account_type_id == 2) : ?>
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
                <input type="checkbox" name="music_type" id="music_type_disco_polo" class="filter">
                <label for="music_type_disco_polo">Disco polo</label>
            </div>
            <div class="checkbox-pair">
                <input type="checkbox" name="music_type" id="music_type_pop" class="filter">
                <label for="music_type_pop">Pop</label>
            </div>
            <div class="checkbox-pair">
                <input type="checkbox" name="music_type" id="music_type_rock" class="filter">
                <label for="music_type_rock">Rock</label>
            </div>
            <div class="checkbox-pair">
                <input type="checkbox" name="music_type" id="music_type_oldies" class="filter">
                <label for="music_type_oldies">Oldies</label>
            </div>
            <div class="checkbox-pair">
                <input type="checkbox" name="music_type" id="music_type_global" class="filter">
                <label for="music_type_global">Muzyka światowa</label>
            </div>
        </div>

        <div class="filter_dj_additional_info">
            <h4>Dodatkowe informacje</h4>
            <div class="checkbox-pair">
                <input type="checkbox" name="dj_additional_info" id="dj_additional_info_wedding_games" class="filter">
                <label for="dj_additional_info_wedding_games">Zabawy</label>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        function showOffer(category, elem) {
            var showOffer = false;
            if ($('#' + category).is(':checked')) {
                var attr = elem.attr(category);
                if (typeof attr !== 'undefined' && attr !== false) {
                    showOffer = true;
                }
            }

            var searchInfo = $('#input_search_description').val();
            console.log(searchInfo);
            console.log(elem.attr('info'));
            if (showOffer) {
                if (searchInfo == '') {
                    elem.show();
                } else {
                    if (elem.attr('info').toLowerCase().indexOf(searchInfo.toLowerCase()) >= 0) {
                        elem.show();
                    }
                }
            }
        }

        $('#input_search_description').change(function(){
            var isCategoryChecked = false;
            $('.filter').each(function(index, element) {
                // console.log(element);
                if($(this).is(':checked')) {
                    isCategoryChecked = true;
                }
            })

            if(isCategoryChecked) {
                search();
            } else {
                searchInfo();
            }
        })

        function searchInfo() {
            $('.offer').each(function (index, element) {
                $(this).hide();
            });

            var searchInfo = $('#input_search_description').val();
            $('.offer').each(function(index, element) {
                if( $(this).attr('info').toLowerCase().indexOf( searchInfo.toLowerCase() ) >= 0 ) {
                    $(this).show();
                }
            });
        }

        function search() {
            $('.offer').each(function (index, element) {
                $(this).hide();
            });

            $('.offer').each(function(index, element) {
                showOffer('music_type_disco_polo', $(this));
                showOffer('music_type_pop', $(this));
                showOffer('music_type_rock', $(this));
                showOffer('music_type_oldies', $(this));
                showOffer('music_type_global', $(this));
                showOffer('dj_additional_info_wedding_games', $(this));
            });

            var showAll = true;
            $('.filter').each(function(index, element) {
                // console.log(element);
                if($(this).is(':checked')) {
                    showAll = false;
                }
            })
            console.log(showAll);
            if(showAll) {
                $('.offer').each(function (index, element) {
                    $(this).show();
                });
                $('#input_search_description').trigger('change');
            }
        }

        $('.filter').click(function(e){
            // console.log($(this).attr('id'));
            search();
        })
    })
</script>
