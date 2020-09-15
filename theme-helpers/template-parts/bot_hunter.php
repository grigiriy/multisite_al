<?php
global $cities;

$start_date = date_create('2020-09-16');
$current_date = date_create();
$date_diff = date_diff($start_date,$current_date);
$offset = 10*($date_diff->format('%a'));
$_cities = array_slice($cities,$offset,10);
?>

<div id="bot_hunter" class="px-4 pb-5">
    <div class="row mt-4">
        <div class="col-12 text-center">
            <h2 class="mx-auto">Возможно, вы находитесь в другом городе?</h2>
            <hr class="lil-hr lil-hr-main">
        </div>
    </div>
    <div class="slick row">
    <?php foreach($_cities as $city){
        $prefix = $city[1]!==''?'.' : '';
        $prefix .= 'autolombard-autozalog.ru/';
        $postfix = $post->post_name==='main' ? '' : $post->post_name;
    ?>
        <div class="col px-2 py-4">
            <div class="shadow p-3 overflow-hidden position-relative">
                    <a href="https://<?= $city[1].$prefix.$postfix; ?>">
                        <div class="half-circle-left h1">·</div>
                        <p class="ml-max h4 text-nowrap">
                            <?= $city[2]; ?>
                        </p>
                    </a>
            </div>
        </div>
    <?php } ?>
    </div>
</div>