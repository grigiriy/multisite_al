<div class="modal fade" id="cityModal" tabindex="-1" role="dialog" aria-labelledby="cityModal" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered mt-n5">
        <div class="modal-content px-4 py-5">
            <div class="modal-body">
                <div class="mb-2 d-flex">
                    <div class="mx-auto">
                        <p class="h2 mt-3">Выбрать город</p>
                    </div>
                    <button type="button" class="position-absolute close text-main align-self-baseline" data-dismiss="modal" aria-label="Close">
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
                <div class="cities">
                    <div>
                    <?php 

                    global $cities;
                    $letter_pr = '';
                    foreach ($cities as $city){
                        $postfix = $city[1]!==''?'.' : '';
                        $postfix .= 'autolombard-autozalog.ru/';

                        $letter = mb_substr($city[2], 0, 1, "UTF-8");
                        if ($letter_pr !== $letter){     
                    // close and open div to set the wrapper for letter-inner
                    ?>
                    </div><div>
                    <h3 class="mt-2"><?= $letter; ?></h3>
                    <?php } ?>
                    <p><a href="https://<?= $city[1] . $postfix; ?>"><?= $city[2]; ?></a></p>
                    <?php $letter_pr = $letter;} ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


