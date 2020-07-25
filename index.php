<?php
/**
 * Template Name: Default
 */
get_header(); 

while ( have_posts() ) :
    the_post();

the_content();

get_template_part('theme-helpers/template-parts/first','screen');

?>

<div class="uk-container uk-position-relativ my-100">
<p>
Займ под залог авто в <span style="background:yellow"><?= get_declension(get_the_title(),'1') ?></span> позволяет в течение нескольких часов получить крупную сумму для решения личных финансовых вопросов или преодоления кассовых разрывов в работе предпринимателя или компании. Однако в классическом варианте вам придется отдать автомобиль на хранение ломбарду до тех пор, пока не будут погашены обязательства по кредитному договору.
Этого недостатка можно избежать благодаря займу под залог ПТС. В качестве залога в этом случае ломбард принимает паспорт транспортного средства, а сама машина остается в пользовании ее владельца. Он может эксплуатировать ее по своему усмотрению, но не имеет права продавать или дарить до погашения взятого займа.
Наш автоломбард представляет займы физическим лицам и предпринимателям в <span style="background:yellow"><?= get_declension(get_the_title(),'1') ?></span> под залог паспортов транспортных средств. Для получения денег достаточно предоставить личные документы и ПТС, подтверждать финансовое состояние с помощью справок или налоговой отчетности не нужно.
</p>
<p>
Абзац для проверки других склонений.
Как говорят в <span style="background:yellow"><?= get_declension(get_the_title(),'16') ?></span> - <span style="background:yellow"><?= get_declension(get_the_title(),'20') ?></span> легко узнать по <span style="background:yellow"><?= get_declension(get_the_title(),'7') ?></span> говору.
</p>

<h3>Другие города</h3>

<ul>
<?php
$all_cities = get_posts([
    'post_type'  => 'page',
    'posts_per_page' => -1
    ]);
foreach($all_cities as $city){ ?>

<li>
<a href="<?= get_the_permalink($city->ID); ?>"><?= get_the_title($city->ID); ?></a>
</li>
<?php } ?>
</ul>
</div>
<?php
endwhile;
get_footer(); ?>
