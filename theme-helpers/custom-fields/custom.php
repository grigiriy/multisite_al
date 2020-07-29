<?php


$sklons = [
    null => 'Город не указан',
    '0' => 'Город (Москва)',
    '1' => 'Сущ.Предложный (в Москве/в Ростове)',
    '2' => 'Сущ.Родительный (Москвы)',
    '3' => 'Сущ.Дательный (Москве/Ростову)',
    '4' => 'Сущ.Винительный (Москву)',
    '5' => 'Прилагательное (Московский)',
    '6' => 'Прил.Единств.Родительный (Московского)',
    '7' => 'Прил.Единств.Дательный (московскому)',
    '8' => 'Прил.Единств.Винительный (московский)',
    '9' => 'Прил.Единств.Предложный (московском)',
    '10' => 'Прил.Множеств.Родительный (московских)',
    '11' => 'Прил.Множеств.Дательный (московским)',
    '12' => 'Прил.Множеств.Вительный (московские)',
    '13' => 'Сленг (МСК)',
    '14' => 'Область (Московская область)',
    '15' => 'Область. Родительный (Московской области)',
    '16' => 'Область. Предложный (Московской области)',
    '17' => 'Житель (Москвич)',
    '18' => 'Житель.Родительный (москвича)',
    '19' => 'Житель.Дательный (москвичу)',
    '20' => 'Житель.Винительный (москвича)',
    '21' => 'Житель.предложный (москвиче)'
];



use Carbon_Fields\Container;
use Carbon_Fields\Field;


Container::make( 'post_meta', 'Тексты' )
    ->show_on_post_type( 'page' )
    ->add_fields([
        Field::make( 'rich text', 'types_text', 'Текст под типами' ),
        Field::make( 'rich text', 'adv_text', 'Текст под преимуществами' ),
        Field::make( 'rich text', 'terms_text', 'Текст под условиями' ),
        Field::make( 'rich text', 'steps_text', 'Текст под шагами' ),
        Field::make( 'rich text', 'requirements_text', 'Текст под требованиями' ),
        Field::make( 'rich text', 'big_form_text', 'Текст под формой' ),
        Field::make( 'complex', 'faq_text', 'FAQ' )
        ->set_collapsed( true )
        ->add_fields( [
            Field::make( 'text', 'subtitle', 'Вопрос (h3)' ),
            Field::make( 'rich_text', 'text', 'Ответ' ),
        ])
    ]);
?>