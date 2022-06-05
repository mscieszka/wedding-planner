<div class="sidebar">
    <a class="category">Katering</a>

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
        <div class="filter_cuisine_type">
            <h4>Rodzaj kuchni</h4>
            <div class="checkbox-pair">
                <input type="checkbox" name="cuisine_type" id="cuisine_type_polish" class="filter">
                <label for="cuisine_type_polish">Polska</label>
            </div>
            <div class="checkbox-pair">
                <input type="checkbox" name="cuisine_type" id="cuisine_type_italian" class="filter">
                <label for="cuisine_type_italian">Włoska</label>
            </div>
            <div class="checkbox-pair">
                <input type="checkbox" name="cuisine_type" id="cuisine_type_usa" class="filter">
                <label for="cuisine_type_usa">Amerykańska</label>
            </div>
            <div class="checkbox-pair">
                <input type="checkbox" name="cuisine_type" id="cuisine_type_french" class="filter">
                <label for="cuisine_type_french">Francuska</label>
            </div>
            <div class="checkbox-pair">
                <input type="checkbox" name="cuisine_type" id="cuisine_type_asian" class="filter">
                <label for="cuisine_type_asian">Azjatycka</label>
            </div>
        </div>
        <div class="filter_catering_additional_info">
            <h4>Dodatkowe informacje</h4>
            <div class="checkbox-pair">
                <input type="checkbox" name="catering_additional_info" id="additional_info_wegan" class="filter">
                <label for="additional_info_wegan">Wegańska</label>
            </div>
            <div class="checkbox-pair">
                <input type="checkbox" name="catering_additional_info" id="additional_info_wegetarian" class="filter">
                <label for="additional_info_wegetarian">Wegetariańska</label>
            </div>
            <div class="checkbox-pair">
                <input type="checkbox" name="cuisine_type" id="additional_info_gluten_free" class="filter">
                <label for="additional_info_gluten_free">Bezglutenowa</label>
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
                showOffer('cuisine_type_polish', $(this));
                showOffer('cuisine_type_italian', $(this));
                showOffer('cuisine_type_usa', $(this));
                showOffer('cuisine_type_french', $(this));
                showOffer('cuisine_type_asian', $(this));
                showOffer('additional_info_wegan', $(this));
                showOffer('additional_info_wegetarian', $(this));
                showOffer('additional_info_gluten_free', $(this));
            });

            var showAll = true;
            $('.filter').each(function(index, element) {
                if($(this).is(':checked')) {
                    showAll = false;
                }
            })
            if(showAll) {
                $('.offer').each(function (index, element) {
                    $(this).show();
                });
                $('#input_search_description').trigger('change');
            }
        }

        $('.filter').click(function(e){
            search();
        })
    })
</script>
