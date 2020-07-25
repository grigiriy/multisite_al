<div class="modal fade" id="citiesModal" tabindex="-1" role="dialog" aria-labelledby="citiesModal" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content px-3 py-4">
            <div class="modal-body">
            <div class="d-flex mb-4">
                <p class="h3  ml-auto">Выбрать город</p>
                <button type="button" class="ml-auto close align-self-start font-weight-light h1 mt-n3" data-dismiss="modal" aria-label="Close">
                    <svg version="1.1" fill="currentColor" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512.001 512.001" style="enable-background:new 0 0 512.001 512.001;" xml:space="preserve">
                            <!-- Icons made by Freepik (www.flaticon.com/authors/freepik) from Flaticon (www.flaticon.com) -->
                            <g>
                                <g>
                                    <path d="M284.286,256.002L506.143,34.144c7.811-7.811,7.811-20.475,0-28.285c-7.811-7.81-20.475-7.811-28.285,0L256,227.717
                                        L34.143,5.859c-7.811-7.811-20.475-7.811-28.285,0c-7.81,7.811-7.811,20.475,0,28.285l221.857,221.857L5.858,477.859
                                        c-7.811,7.811-7.811,20.475,0,28.285c3.905,3.905,9.024,5.857,14.143,5.857c5.119,0,10.237-1.952,14.143-5.857L256,284.287
                                        l221.857,221.857c3.905,3.905,9.024,5.857,14.143,5.857s10.237-1.952,14.143-5.857c7.811-7.811,7.811-20.475,0-28.285
                                        L284.286,256.002z"></path>
                                </g>
                            </g>
                        </svg>
                    </button>
                </div>
                <?php $cities = get_posts([
                    'post_type' => 'page',
                    'numberposts' => '-1',
                    'orderby' => 'title',
                    'order' => 'ASC',
                    'meta_query' => [
                        [
                            'key'   => '_wp_page_template', 
                            'value' => 'main.php'
                        ],
                    ]
                ]);
                $big_cities = get_posts([
                    'post_type' => 'page',
                    'category'    => 2,
                    'numberposts' => '-1',
                    'orderby' => 'title',
                    'order' => 'ASC',
                    'meta_query' => [
                        [
                            'key'   => '_wp_page_template', 
                            'value' => 'main.php'
                        ],
                    ]
                ]);
                ?>
                <div class="cities">
                    <div>
                    <?php
                        $letter_pr = '';
                        foreach ($big_cities as $city){
                        $letter = mb_substr(get_the_title($city->ID), 0, 1, "UTF-8");
                        if ($letter_pr !== $letter){
                        ?>
                        </div><div><h3 class="mt-2"><?= $letter; ?></h3>
                        <?php } ?>
                        <p>
                            <a href="<?= get_the_permalink($city->ID)?>"><?= get_the_title($city->ID); ?></a>
                        </p>
                        <?php
                        $letter_pr = $letter;
                        } ?>
                            <button type="button" class="btn btn-link" onclick="showCities(this)">
                            Все города
                        </button>
                    </div>
                </div>
                <div class="cities" style="display:none">
                <div>
                    <?php
                        $letter_pr = '';
                        foreach ($cities as $city){
                        $letter = mb_substr(get_the_title($city->ID), 0, 1, "UTF-8");
                        if ($letter_pr !== $letter){
                        ?>
                        </div><div><h3 class="mt-2"><?= $letter; ?></h3>
                        <?php } ?>
                        <p>
                            <a href="<?= get_the_permalink($city->ID)?>"><?= get_the_title($city->ID); ?></a>
                        </p>
                        <?php
                        $letter_pr = $letter;
                        } ?>
                            <button type="button" class="btn btn-link" onclick="showCities(this)">
                            Все города
                        </button>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>