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


Container::make( 'post_meta', 'Город' )
    ->show_on_post_type( 'page' )
    ->add_tab('Контактная информация',  [
        Field::make( 'text', 'address', 'Адрес' )
            ->set_width( 50 ),
        Field::make( 'text', 'coord', 'Координаты' )
            ->set_width( 50 ),
        ]);


        
Container::make( 'theme_options', 'Управление контентом' )
    ->add_tab( __('subtitles'), [
        Field::make( 'text', 'phone', 'Телефон' ),
        Field::make( 'complex', 'main', 'Заголовки главной' )
        ->set_collapsed( true )
        ->set_max( 1 )
        ->add_fields([
            Field::make( 'text', 'types_sub', 'Заголовок типов' )
                ->set_width( 50 ),
            Field::make( 'select', 'types_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'types_sub_after', 'Заголовок типов (после города)' )
                ->set_width( 30 ),
        
            Field::make( 'text', 'advantages_sub', 'Заголовок преимуществ' )
                ->set_width( 50 ),
            Field::make( 'select', 'advantages_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'advantages_sub_after', 'Заголовок преимуществ (после города)' )
                ->set_width( 30 ),
        
            Field::make( 'text', 'calc_sub', 'Заголовок калькулятора' )
            ->set_width( 50 ),
            Field::make( 'select', 'calc_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'calc_sub_after', 'Заголовок калькулятора (после города)' )
                ->set_width( 30 ),
        
            Field::make( 'text', 'terms_sub', 'Заголовок условий' )
            ->set_width( 50 ),
            Field::make( 'select', 'terms_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'terms_sub_after', 'Заголовок условий (после города)' )
                ->set_width( 30 ),
        
            Field::make( 'text', 'requirements_sub', 'Заголовок требований' )
            ->set_width( 50 ),
            Field::make( 'select', 'requirements_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'requirements_sub_after', 'Заголовок требований (после города)' )
                ->set_width( 30 ),
        
            Field::make( 'text', 'order_sub', 'Заголовок заявки' )
            ->set_width( 50 ),
            Field::make( 'select', 'order_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'order_sub_after', 'Заголовок заявки (после города)' )
                ->set_width( 30 ),

            Field::make( 'text', 'faq_sub', 'Заголовок вопросов' )
            ->set_width( 50 ),
            Field::make( 'select', 'faq_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'faq_sub_after', 'Заголовок вопросов (после города)' )
                ->set_width( 30 ),

        ]),



        Field::make( 'complex', 'credit_pts', 'Заголовки кредита под птс' )
        ->set_collapsed( true )
        ->set_max( 1 )
        ->add_fields( [
            Field::make( 'text', 'advantages_sub', 'Заголовок преимуществ' )
            ->set_width( 50 ),
            Field::make( 'select', 'advantages_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'advantages_sub_after', 'Заголовок преимуществ (после города)' )
                ->set_width( 30 ),

            Field::make( 'text', 'types_sub', 'Заголовок типов' )
                ->set_width( 50 ),
            Field::make( 'select', 'types_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'types_sub_after', 'Заголовок типов (после города)' )
                ->set_width( 30 ),

            Field::make( 'text', 'calc_sub', 'Заголовок калькулятора' )
            ->set_width( 50 ),
            Field::make( 'select', 'calc_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'calc_sub_after', 'Заголовок калькулятора (после города)' )
                ->set_width( 30 ),

            Field::make( 'text', 'terms_sub', 'Заголовок условий' )
            ->set_width( 50 ),
            Field::make( 'select', 'terms_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'terms_sub_after', 'Заголовок условий (после города)' )
                ->set_width( 30 ),
                
            Field::make( 'text', 'requirements_sub', 'Заголовок требований' )
            ->set_width( 50 ),
            Field::make( 'select', 'requirements_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'requirements_sub_after', 'Заголовок требований (после города)' )
                ->set_width( 30 ),

            Field::make( 'text', 'order_sub', 'Заголовок заявки' )
            ->set_width( 50 ),
            Field::make( 'select', 'order_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'order_sub_after', 'Заголовок заявки (после города)' )
                ->set_width( 30 ),

            Field::make( 'text', 'faq_sub', 'Заголовок вопросов' )
            ->set_width( 50 ),
            Field::make( 'select', 'faq_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'faq_sub_after', 'Заголовок вопросов (после города)' )
                ->set_width( 30 ),
        ]),



        Field::make( 'complex', 'credit_auto', 'Заголовки кредита под авто' )
        ->set_collapsed( true )
        ->set_max( 1 )
        ->add_fields( [
            Field::make( 'text', 'types_sub', 'Заголовок типов' )
                ->set_width( 50 ),
            Field::make( 'select', 'types_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'types_sub_after', 'Заголовок типов (после города)' )
                ->set_width( 30 ),

            Field::make( 'text', 'advantages_sub', 'Заголовок преимуществ' )
            ->set_width( 50 ),
            Field::make( 'select', 'advantages_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'advantages_sub_after', 'Заголовок преимуществ (после города)' )
                ->set_width( 30 ),

            Field::make( 'text', 'calc_sub', 'Заголовок калькулятора' )
            ->set_width( 50 ),
            Field::make( 'select', 'calc_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'calc_sub_after', 'Заголовок калькулятора (после города)' )
                ->set_width( 30 ),

            Field::make( 'text', 'terms_sub', 'Заголовок условий' )
            ->set_width( 50 ),
            Field::make( 'select', 'terms_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'terms_sub_after', 'Заголовок условий (после города)' )
                ->set_width( 30 ),

            Field::make( 'text', 'requirements_sub', 'Заголовок требований' )
            ->set_width( 50 ),
            Field::make( 'select', 'requirements_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'requirements_sub_after', 'Заголовок требований (после города)' )
                ->set_width( 30 ),

            Field::make( 'text', 'order_sub', 'Заголовок заявки' )
            ->set_width( 50 ),
            Field::make( 'select', 'order_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'order_sub_after', 'Заголовок заявки (после города)' )
                ->set_width( 30 ),

            Field::make( 'text', 'faq_sub', 'Заголовок вопросов' )
            ->set_width( 50 ),
            Field::make( 'select', 'faq_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'faq_sub_after', 'Заголовок вопросов (после города)' )
                ->set_width( 30 ),
        ]),



        Field::make( 'complex', 'zaim_pts', 'Заголовки займов под птс' )
        ->set_collapsed( true )
        ->set_max( 1 )
        ->add_fields( [
            Field::make( 'text', 'advantages_sub', 'Заголовок преимуществ' )
            ->set_width( 50 ),
            Field::make( 'select', 'advantages_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'advantages_sub_after', 'Заголовок преимуществ (после города)' )
                ->set_width( 30 ),

            Field::make( 'text', 'types_sub', 'Заголовок типов' )
                ->set_width( 50 ),
            Field::make( 'select', 'types_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'types_sub_after', 'Заголовок типов (после города)' )
                ->set_width( 30 ),

            Field::make( 'text', 'calc_sub', 'Заголовок калькулятора' )
            ->set_width( 50 ),
            Field::make( 'select', 'calc_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'calc_sub_after', 'Заголовок калькулятора (после города)' )
                ->set_width( 30 ),

            Field::make( 'text', 'terms_sub', 'Заголовок условий' )
            ->set_width( 50 ),
            Field::make( 'select', 'terms_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'terms_sub_after', 'Заголовок условий (после города)' )
                ->set_width( 30 ),
                
            Field::make( 'text', 'requirements_sub', 'Заголовок требований' )
            ->set_width( 50 ),
            Field::make( 'select', 'requirements_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'requirements_sub_after', 'Заголовок требований (после города)' )
                ->set_width( 30 ),

            Field::make( 'text', 'order_sub', 'Заголовок заявки' )
            ->set_width( 50 ),
            Field::make( 'select', 'order_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'order_sub_after', 'Заголовок заявки (после города)' )
                ->set_width( 30 ),

            Field::make( 'text', 'faq_sub', 'Заголовок вопросов' )
            ->set_width( 50 ),
            Field::make( 'select', 'faq_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'faq_sub_after', 'Заголовок вопросов (после города)' )
                ->set_width( 30 ),
        ]),



        Field::make( 'complex', 'zaim_auto', 'Заголовки займов под авто' )
        ->set_collapsed( true )
        ->set_max( 1 )
        ->add_fields( [
            Field::make( 'text', 'advantages_sub', 'Заголовок преимуществ' )
            ->set_width( 50 ),
            Field::make( 'select', 'advantages_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'advantages_sub_after', 'Заголовок преимуществ (после города)' )
                ->set_width( 30 ),

            Field::make( 'text', 'types_sub', 'Заголовок типов' )
                ->set_width( 50 ),
            Field::make( 'select', 'types_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'types_sub_after', 'Заголовок типов (после города)' )
                ->set_width( 30 ),

            Field::make( 'text', 'calc_sub', 'Заголовок калькулятора' )
            ->set_width( 50 ),
            Field::make( 'select', 'calc_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'calc_sub_after', 'Заголовок калькулятора (после города)' )
                ->set_width( 30 ),

            Field::make( 'text', 'terms_sub', 'Заголовок условий' )
            ->set_width( 50 ),
            Field::make( 'select', 'terms_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'terms_sub_after', 'Заголовок условий (после города)' )
                ->set_width( 30 ),
                
            Field::make( 'text', 'requirements_sub', 'Заголовок требований' )
            ->set_width( 50 ),
            Field::make( 'select', 'requirements_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'requirements_sub_after', 'Заголовок требований (после города)' )
                ->set_width( 30 ),

            Field::make( 'text', 'order_sub', 'Заголовок заявки' )
            ->set_width( 50 ),
            Field::make( 'select', 'order_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'order_sub_after', 'Заголовок заявки (после города)' )
                ->set_width( 30 ),

            Field::make( 'text', 'faq_sub', 'Заголовок вопросов' )
            ->set_width( 50 ),
            Field::make( 'select', 'faq_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'faq_sub_after', 'Заголовок вопросов (после города)' )
                ->set_width( 30 ),
        ]),



        Field::make( 'complex', 'fast_money', 'Заголовки быстрых денег' )
        ->set_collapsed( true )
        ->set_max( 1 )
        ->add_fields( [
            Field::make( 'text', 'calc_sub', 'Заголовок калькулятора' )
            ->set_width( 50 ),
            Field::make( 'select', 'calc_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'calc_sub_after', 'Заголовок калькулятора (после города)' )
                ->set_width( 30 ),

            Field::make( 'text', 'types_sub', 'Заголовок типов' )
                ->set_width( 50 ),
            Field::make( 'select', 'types_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'types_sub_after', 'Заголовок типов (после города)' )
                ->set_width( 30 ),

            Field::make( 'text', 'terms_sub', 'Заголовок условий' )
            ->set_width( 50 ),
            Field::make( 'select', 'terms_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'terms_sub_after', 'Заголовок условий (после города)' )
                ->set_width( 30 ),
                
            Field::make( 'text', 'requirements_sub', 'Заголовок требований' )
            ->set_width( 50 ),
            Field::make( 'select', 'requirements_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'requirements_sub_after', 'Заголовок требований (после города)' )
                ->set_width( 30 ),

            Field::make( 'text', 'order_sub', 'Заголовок заявки' )
            ->set_width( 50 ),
            Field::make( 'select', 'order_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'order_sub_after', 'Заголовок заявки (после города)' )
                ->set_width( 30 ),

            Field::make( 'text', 'faq_sub', 'Заголовок вопросов' )
            ->set_width( 50 ),
            Field::make( 'select', 'faq_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'faq_sub_after', 'Заголовок вопросов (после города)' )
                ->set_width( 30 ),
        ]),



        Field::make( 'complex', 'business', 'Заголовки ИП/юр.лиц' )
        ->set_collapsed( true )
        ->set_max( 1 )
        ->add_fields( [
            Field::make( 'text', 'advantages_sub', 'Заголовок преимуществ' )
            ->set_width( 50 ),
            Field::make( 'select', 'advantages_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'advantages_sub_after', 'Заголовок преимуществ (после города)' )
                ->set_width( 30 ),

            Field::make( 'text', 'types_sub', 'Заголовок типов' )
                ->set_width( 50 ),
            Field::make( 'select', 'types_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'types_sub_after', 'Заголовок типов (после города)' )
                ->set_width( 30 ),

            Field::make( 'text', 'calc_sub', 'Заголовок калькулятора' )
            ->set_width( 50 ),
            Field::make( 'select', 'calc_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'calc_sub_after', 'Заголовок калькулятора (после города)' )
                ->set_width( 30 ),

            Field::make( 'text', 'terms_sub', 'Заголовок условий' )
            ->set_width( 50 ),
            Field::make( 'select', 'terms_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'terms_sub_after', 'Заголовок условий (после города)' )
                ->set_width( 30 ),
                
            Field::make( 'text', 'requirements_sub', 'Заголовок требований' )
            ->set_width( 50 ),
            Field::make( 'select', 'requirements_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'requirements_sub_after', 'Заголовок требований (после города)' )
                ->set_width( 30 ),

            Field::make( 'text', 'order_sub', 'Заголовок заявки' )
            ->set_width( 50 ),
            Field::make( 'select', 'order_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'order_sub_after', 'Заголовок заявки (после города)' )
                ->set_width( 30 ),

            Field::make( 'text', 'faq_sub', 'Заголовок вопросов' )
            ->set_width( 50 ),
            Field::make( 'select', 'faq_case', 'Склонение города (если есть)' )
            ->set_width( 20 )
            ->set_options( $sklons ),
            Field::make( 'text', 'faq_sub_after', 'Заголовок вопросов (после города)' )
            ->set_width( 30 ),
            
            Field::make( 'image', 'img', 'Картинка первого экрана' )
            ->set_value_type( 'url' )
        ]),



        Field::make( 'complex', 'calc', 'Заголовки калькулятора' )
        ->set_collapsed( true )
        ->set_max( 1 )
        ->add_fields( [
            Field::make( 'text', 'calc_sub', 'Заголовок калькулятора' )
            ->set_width( 50 ),
            Field::make( 'select', 'calc_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'calc_sub_after', 'Заголовок калькулятора (после города)' )
                ->set_width( 30 ),

            Field::make( 'text', 'terms_sub', 'Заголовок условий' )
            ->set_width( 50 ),
            Field::make( 'select', 'terms_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'terms_sub_after', 'Заголовок условий (после города)' )
                ->set_width( 30 ),

            Field::make( 'text', 'order_sub', 'Заголовок заявки' )
            ->set_width( 50 ),
            Field::make( 'select', 'order_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'order_sub_after', 'Заголовок заявки (после города)' )
                ->set_width( 30 ),

            Field::make( 'text', 'faq_sub', 'Заголовок вопросов' )
            ->set_width( 50 ),
            Field::make( 'select', 'faq_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'faq_sub_after', 'Заголовок вопросов (после города)' )
                ->set_width( 30 ),
        ]),



        Field::make( 'complex', 'refinance', 'Заголовки рефинансирования' )
        ->set_collapsed( true )
        ->set_max( 1 )
        ->add_fields( [
            Field::make( 'text', 'calc_sub', 'Заголовок калькулятора' )
            ->set_width( 50 ),
            Field::make( 'select', 'calc_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'calc_sub_after', 'Заголовок калькулятора (после города)' )
                ->set_width( 30 ),

            Field::make( 'text', 'types_sub', 'Заголовок типов' )
                ->set_width( 50 ),
            Field::make( 'select', 'types_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'types_sub_after', 'Заголовок типов (после города)' )
                ->set_width( 30 ),

            Field::make( 'text', 'terms_sub', 'Заголовок условий' )
            ->set_width( 50 ),
            Field::make( 'select', 'terms_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'terms_sub_after', 'Заголовок условий (после города)' )
                ->set_width( 30 ),
                
            Field::make( 'text', 'requirements_sub', 'Заголовок требований' )
            ->set_width( 50 ),
            Field::make( 'select', 'requirements_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'requirements_sub_after', 'Заголовок требований (после города)' )
                ->set_width( 30 ),

            Field::make( 'text', 'order_sub', 'Заголовок заявки' )
            ->set_width( 50 ),
            Field::make( 'select', 'order_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'order_sub_after', 'Заголовок заявки (после города)' )
                ->set_width( 30 ),

            Field::make( 'text', 'faq_sub', 'Заголовок вопросов' )
            ->set_width( 50 ),
            Field::make( 'select', 'faq_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'faq_sub_after', 'Заголовок вопросов (после города)' )
                ->set_width( 30 ),
        ]),



        Field::make( 'complex', 'truck', 'Заголовки грузовые авто' )
        ->set_collapsed( true )
        ->set_max( 1 )
        ->add_fields( [
            Field::make( 'text', 'advantages_sub', 'Заголовок преимуществ' )
            ->set_width( 50 ),
            Field::make( 'select', 'advantages_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'advantages_sub_after', 'Заголовок преимуществ (после города)' )
                ->set_width( 30 ),

            Field::make( 'text', 'calc_sub', 'Заголовок калькулятора' )
            ->set_width( 50 ),
            Field::make( 'select', 'calc_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'calc_sub_after', 'Заголовок калькулятора (после города)' )
                ->set_width( 30 ),

            Field::make( 'text', 'terms_sub', 'Заголовок условий' )
            ->set_width( 50 ),
            Field::make( 'select', 'terms_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'terms_sub_after', 'Заголовок условий (после города)' )
                ->set_width( 30 ),
                
            Field::make( 'text', 'requirements_sub', 'Заголовок требований' )
            ->set_width( 50 ),
            Field::make( 'select', 'requirements_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'requirements_sub_after', 'Заголовок требований (после города)' )
                ->set_width( 30 ),

            Field::make( 'text', 'order_sub', 'Заголовок заявки' )
            ->set_width( 50 ),
            Field::make( 'select', 'order_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'order_sub_after', 'Заголовок заявки (после города)' )
                ->set_width( 30 ),

            Field::make( 'text', 'faq_sub', 'Заголовок вопросов' )
            ->set_width( 50 ),
            Field::make( 'select', 'faq_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'faq_sub_after', 'Заголовок вопросов (после города)' )
                ->set_width( 30 ),

            Field::make( 'image', 'img', 'Картинка первого экрана' )
                ->set_value_type( 'url' )
        ]),



        Field::make( 'complex', 'spec', 'Заголовки спецтехника' )
        ->set_collapsed( true )
        ->set_max( 1 )
        ->add_fields( [
            Field::make( 'text', 'advantages_sub', 'Заголовок преимуществ' )
            ->set_width( 50 ),
            Field::make( 'select', 'advantages_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'advantages_sub_after', 'Заголовок преимуществ (после города)' )
                ->set_width( 30 ),

            Field::make( 'text', 'calc_sub', 'Заголовок калькулятора' )
            ->set_width( 50 ),
            Field::make( 'select', 'calc_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'calc_sub_after', 'Заголовок калькулятора (после города)' )
                ->set_width( 30 ),

            Field::make( 'text', 'terms_sub', 'Заголовок условий' )
            ->set_width( 50 ),
            Field::make( 'select', 'terms_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'terms_sub_after', 'Заголовок условий (после города)' )
                ->set_width( 30 ),
                
            Field::make( 'text', 'requirements_sub', 'Заголовок требований' )
            ->set_width( 50 ),
            Field::make( 'select', 'requirements_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'requirements_sub_after', 'Заголовок требований (после города)' )
                ->set_width( 30 ),

            Field::make( 'text', 'order_sub', 'Заголовок заявки' )
            ->set_width( 50 ),
            Field::make( 'select', 'order_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'order_sub_after', 'Заголовок заявки (после города)' )
                ->set_width( 30 ),

            Field::make( 'text', 'faq_sub', 'Заголовок вопросов' )
            ->set_width( 50 ),
            Field::make( 'select', 'faq_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'faq_sub_after', 'Заголовок вопросов (после города)' )
                ->set_width( 30 ),

            Field::make( 'image', 'img', 'Картинка первого экрана' )
                ->set_value_type( 'url' )
        ]),



        Field::make( 'complex', 'moto', 'Заголовки мото' )
        ->set_collapsed( true )
        ->set_max( 1 )
        ->add_fields([
            Field::make( 'text', 'advantages_sub', 'Заголовок преимуществ' )
                ->set_width( 50 ),
            Field::make( 'select', 'advantages_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'advantages_sub_after', 'Заголовок преимуществ (после города)' )
                ->set_width( 30 ),
        
            Field::make( 'text', 'calc_sub', 'Заголовок калькулятора' )
            ->set_width( 50 ),
            Field::make( 'select', 'calc_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'calc_sub_after', 'Заголовок калькулятора (после города)' )
                ->set_width( 30 ),
        
            Field::make( 'text', 'terms_sub', 'Заголовок условий' )
            ->set_width( 50 ),
            Field::make( 'select', 'terms_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'terms_sub_after', 'Заголовок условий (после города)' )
                ->set_width( 30 ),
        
            Field::make( 'text', 'requirements_sub', 'Заголовок требований' )
            ->set_width( 50 ),
            Field::make( 'select', 'requirements_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'requirements_sub_after', 'Заголовок требований (после города)' )
                ->set_width( 30 ),
        
            Field::make( 'text', 'order_sub', 'Заголовок заявки' )
            ->set_width( 50 ),
            Field::make( 'select', 'order_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'order_sub_after', 'Заголовок заявки (после города)' )
                ->set_width( 30 ),

            Field::make( 'text', 'faq_sub', 'Заголовок вопросов' )
            ->set_width( 50 ),
            Field::make( 'select', 'faq_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'faq_sub_after', 'Заголовок вопросов (после города)' )
                ->set_width( 30 ),

            Field::make( 'image', 'img', 'Картинка первого экрана' )
                ->set_value_type( 'url' )
        ]),



        Field::make( 'complex', '24h', 'Заголовки круглосуточно' )
        ->set_collapsed( true )
        ->set_max( 1 )
        ->add_fields([
            Field::make( 'text', 'types_sub', 'Заголовок типов' )
                ->set_width( 50 ),
            Field::make( 'select', 'types_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'types_sub_after', 'Заголовок типов (после города)' )
                ->set_width( 30 ),
        
            Field::make( 'text', 'advantages_sub', 'Заголовок преимуществ' )
                ->set_width( 50 ),
            Field::make( 'select', 'advantages_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'advantages_sub_after', 'Заголовок преимуществ (после города)' )
                ->set_width( 30 ),
        
            Field::make( 'text', 'calc_sub', 'Заголовок калькулятора' )
            ->set_width( 50 ),
            Field::make( 'select', 'calc_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'calc_sub_after', 'Заголовок калькулятора (после города)' )
                ->set_width( 30 ),
        
            Field::make( 'text', 'terms_sub', 'Заголовок условий' )
            ->set_width( 50 ),
            Field::make( 'select', 'terms_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'terms_sub_after', 'Заголовок условий (после города)' )
                ->set_width( 30 ),
        
            Field::make( 'text', 'requirements_sub', 'Заголовок требований' )
            ->set_width( 50 ),
            Field::make( 'select', 'requirements_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'requirements_sub_after', 'Заголовок требований (после города)' )
                ->set_width( 30 ),
        
            Field::make( 'text', 'order_sub', 'Заголовок заявки' )
            ->set_width( 50 ),
            Field::make( 'select', 'order_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'order_sub_after', 'Заголовок заявки (после города)' )
                ->set_width( 30 ),

            Field::make( 'text', 'faq_sub', 'Заголовок вопросов' )
            ->set_width( 50 ),
            Field::make( 'select', 'faq_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'faq_sub_after', 'Заголовок вопросов (после города)' )
                ->set_width( 30 ),
        ]),
    ])

    ->add_tab( __('base_texts'), [
        Field::make( 'html', 'crb_information_text' )
        ->set_html( '<h2>Номера склонений:</h2>
        <ul>
            <li><p>0 => Город (Москва)</p></li>
            <li><p>1 => Сущ.Предложный (Москве)</p></li>
            <li><p>2 => Сущ.Родительный (Москвы)</p></li>
            <li><p>3 => Сущ.Дательный (Москве)</p></li>
            <li><p>4 => Сущ.Винительный (Москву)</p></li>
            <li><p>5 => Прилагательное (Московский)</p></li>
            <li><p>6 => Прил.Единств.Родительный (Московского)</p></li>
            <li><p>7 => Прил.Единств.Дательный (московскому)</p></li>
            <li><p>8 => Прил.Единств.Винительный (московский)</p></li>
            <li><p>9 => Прил.Единств.Предложный (московском)</p></li>
            <li><p>10 => Прил.Множеств.Родительный (московских)</p></li>
            <li><p>11 => Прил.Множеств.Дательный (московским)</p></li>
            <li><p>12 => Прил.Множеств.Вительный (московские)</p></li>
            <li><p>13 => Сленг (МСК)</p></li>
            <li><p>14 => Область (Московская область)</p></li>
            <li><p>15 => Область. Родительный (Московской области)</p></li>
            <li><p>16 => Область. Предложный (Московской области)</p></li>
            <li><p>17 => Житель (Москвич)</p></li>
            <li><p>18 => Житель.Родительный (москвича)</p></li>
            <li><p>19 => Житель.Дательный (москвичу)</p></li>
            <li><p>20 => Житель.Винительный (москвича)</p></li>
            <li><p>21 => Житель.предложный (москвиче)</p></li>
            </ul>
            <p>Пример вставки кода: [declension_city case="1"] </p>
        ' ),
        // Field::make( 'rich_text', 'types_text', 'Текст о том, что можно заложить' ),
        // Field::make( 'rich_text', 'advantages_text', 'Текст о преимуществах' ),
        // Field::make( 'rich_text', 'requirements_text', 'Текст о требованиях' ),
        // Field::make( 'rich_text', 'calc_text', 'Текст о калькуляторе' ),

        Field::make( 'complex', 'main_texts', 'Тексты главной' )
        ->set_collapsed( true )
        ->set_max( 1 )
            ->add_fields( [
            Field::make( 'rich_text', 'types_text', 'Текст о том, что можно заложить' ),
            Field::make( 'rich_text', 'advantages_text', 'Текст о преимуществах' ),
            Field::make( 'rich_text', 'requirements_text', 'Текст о требованиях' ),
            Field::make( 'rich_text', 'calc_text', 'Текст о калькуляторе' ),
        ]),
        Field::make( 'complex', 'credit_pts_texts', 'Тексты кредитов под ПТС' )
        ->set_collapsed( true )
        ->set_max( 1 )
            ->add_fields( [
            Field::make( 'rich_text', 'advantages_text', 'Текст о преимуществах' ),
            Field::make( 'rich_text', 'types_text', 'Текст о том, что можно заложить' ),
            Field::make( 'rich_text', 'requirements_text', 'Текст о требованиях' ),
            Field::make( 'rich_text', 'calc_text', 'Текст о калькуляторе' ),
        ]),
        Field::make( 'complex', 'credit_auto_texts', 'Тексты кредитов под авто' )
        ->set_collapsed( true )
        ->set_max( 1 )
            ->add_fields( [
            Field::make( 'rich_text', 'advantages_text', 'Текст о преимуществах' ),
            Field::make( 'rich_text', 'types_text', 'Текст о том, что можно заложить' ),
            Field::make( 'rich_text', 'requirements_text', 'Текст о требованиях' ),
            Field::make( 'rich_text', 'calc_text', 'Текст о калькуляторе' ),
        ]),
        Field::make( 'complex', 'zaim_pts_texts', 'Тексты займов под ПТС' )
        ->set_collapsed( true )
        ->set_max( 1 )
            ->add_fields( [
            Field::make( 'rich_text', 'advantages_text', 'Текст о преимуществах' ),
            Field::make( 'rich_text', 'types_text', 'Текст о том, что можно заложить' ),
            Field::make( 'rich_text', 'requirements_text', 'Текст о требованиях' ),
            Field::make( 'rich_text', 'calc_text', 'Текст о калькуляторе' ),
        ]),
        Field::make( 'complex', 'zaim_auto_texts', 'Тексты займов под авто' )
        ->set_collapsed( true )
        ->set_max( 1 )
            ->add_fields( [
            Field::make( 'rich_text', 'advantages_text', 'Текст о преимуществах' ),
            Field::make( 'rich_text', 'types_text', 'Текст о том, что можно заложить' ),
            Field::make( 'rich_text', 'requirements_text', 'Текст о требованиях' ),
            Field::make( 'rich_text', 'calc_text', 'Текст о калькуляторе' ),
        ]),
        Field::make( 'complex', 'fast_money_texts', 'Тексты быстрых займов' )
        ->set_collapsed( true )
        ->set_max( 1 )
            ->add_fields( [
            Field::make( 'rich_text', 'calc_text', 'Текст о калькуляторе' ),
            Field::make( 'rich_text', 'types_text', 'Текст о том, что можно заложить' ),
            Field::make( 'rich_text', 'requirements_text', 'Текст о требованиях' ),
            Field::make( 'rich_text', 'advantages_text', 'Текст о преимуществах' ),
        ]),
        Field::make( 'complex', 'business_texts', 'Тексты бизнес' )
        ->set_collapsed( true )
        ->set_max( 1 )
            ->add_fields( [
            Field::make( 'rich_text', 'advantages_text', 'Текст о преимуществах' ),
            Field::make( 'rich_text', 'types_text', 'Текст о том, что можно заложить' ),
            Field::make( 'rich_text', 'requirements_text', 'Текст о требованиях' ),
            Field::make( 'rich_text', 'calc_text', 'Текст о калькуляторе' ),
        ]),
        Field::make( 'complex', 'calc_texts', 'Тексты калькулятора' )
        ->set_collapsed( true )
        ->set_max( 1 )
            ->add_fields( [
                Field::make( 'rich_text', 'calc_text', 'Текст о калькуляторе' ),
                Field::make( 'rich_text', 'terms_text', 'Текст о требованиях' ),
        ]),
        Field::make( 'complex', 'refinance_texts', 'Тексты рефинансирования' )
        ->set_collapsed( true )
        ->set_max( 1 )
            ->add_fields( [
            Field::make( 'rich_text', 'calc_text', 'Текст о калькуляторе' ),
            Field::make( 'rich_text', 'types_text', 'Текст о том, что можно заложить' ),
            Field::make( 'rich_text', 'requirements_text', 'Текст о требованиях' ),
            Field::make( 'rich_text', 'advantages_text', 'Текст о преимуществах' ),
        ]),
        Field::make( 'complex', 'truck_texts', 'Тексты грузового' )
        ->set_collapsed( true )
        ->set_max( 1 )
            ->add_fields( [
            Field::make( 'rich_text', 'advantages_text', 'Текст о преимуществах' ),
            Field::make( 'rich_text', 'requirements_text', 'Текст о требованиях' ),
            Field::make( 'rich_text', 'types_text', 'Текст о том, что можно заложить' ),
            Field::make( 'rich_text', 'calc_text', 'Текст о калькуляторе' ),
        ]),
        Field::make( 'complex', 'spec_texts', 'Тексты спецтехники' )
        ->set_collapsed( true )
        ->set_max( 1 )
            ->add_fields( [
            Field::make( 'rich_text', 'advantages_text', 'Текст о преимуществах' ),
            Field::make( 'rich_text', 'requirements_text', 'Текст о требованиях' ),
            Field::make( 'rich_text', 'types_text', 'Текст о том, что можно заложить' ),
            Field::make( 'rich_text', 'calc_text', 'Текст о калькуляторе' ),
        ]),
        // Field::make( 'complex', 'moto_texts', 'FAQ главной' ),
        // Field::make( 'complex', '24h_texts', 'FAQ главной' ),
    ])


    ->add_tab( __('forms'), [
        Field::make( 'complex', 'forms', 'Заголовки форм' )
        // ->set_collapsed( true )
        ->set_max( 1 )
        ->add_fields([
            Field::make( 'html', 'crb_information_text_city_top_form' )
                ->set_html( '<h1 style="color:blue">Верхняя форма в городе</h1>' ),

            Field::make( 'text', 'city_top_form_tit', 'Начало заголовка' )
                ->set_width( 50 ),
            Field::make( 'select', 'city_top_form_tit_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'city_top_form_tit_after', 'Конец заголовка (после города)' )
                ->set_width( 30 ),

                Field::make( 'text', 'city_top_form_sub', 'Начало подзаголовка' )
                ->set_width( 50 ),
            Field::make( 'select', 'city_top_form_sub_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'city_top_form_sub_after', 'Конец подзаголовка (после города)' )
                ->set_width( 30 ),


            Field::make( 'html', 'crb_information_text_base_top_form' )
                ->set_html( '<h1 style="color:blue">Верхняя форма без города</h1>' ),

            Field::make( 'text', 'base_top_form_tit', 'Заголовок' ),
            Field::make( 'text', 'base_top_form_sub', 'Подзаголовок' ),



            Field::make( 'html', 'crb_information_text_city_mid_form' )
                ->set_html( '<h1 style="color:blue">Внутренняя форма </h1>' ),
            Field::make( 'html', 'crb_information_text_city_mid_form_add' )
                ->set_html( '<h3 style="color:#333">Заголовок в блоке subtitles</h3>' ),
            Field::make( 'text', 'mid_form_sub', 'Подзаголовок' ),

            // Field::make( 'html', 'crb_information_text_city_mid_form' )
            //     ->set_html( '<h1 style="color:blue">Внутренняя форма в городе</h1>' ),

            // Field::make( 'text', 'city_mid_form_tit', 'Начало заголовка' )
            //     ->set_width( 50 ),
            // Field::make( 'select', 'city_mid_form_tit_case', 'Склонение города (если есть)' )
            //     ->set_width( 20 )
            //     ->set_options( $sklons ),
            // Field::make( 'text', 'city_mid_form_tit_after', 'Конец заголовка (после города)' )
            //     ->set_width( 30 ),

            //     Field::make( 'text', 'city_mid_form_sub', 'Начало подзаголовка' )
            //     ->set_width( 50 ),
            // Field::make( 'select', 'city_mid_form_sub_case', 'Склонение города (если есть)' )
            //     ->set_width( 20 )
            //     ->set_options( $sklons ),
            // Field::make( 'text', 'city_mid_form_sub_after', 'Конец подзаголовка (после города)' )
            //     ->set_width( 30 ),


            // Field::make( 'html', 'crb_information_text_base_mid_form' )
            //     ->set_html( '<h1 style="color:blue">Внутренняя форма без города</h1>' ),

            // Field::make( 'text', 'base_mid_form_tit', 'Заголовок' ),
            // Field::make( 'text', 'base_mid_form_sub', 'Подзаголовок' ),


            Field::make( 'html', 'crb_information_text_city_foot_form' )
                ->set_html( '<h1 style="color:blue">Форма подвала в городе</h1>' ),

            Field::make( 'text', 'city_foot_form_tit', 'Начало заголовка' )
                ->set_width( 50 ),
            Field::make( 'select', 'city_foot_form_tit_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'city_foot_form_tit_after', 'Конец заголовка (после города)' )
                ->set_width( 30 ),

                Field::make( 'text', 'city_foot_form_sub', 'Начало подзаголовка' )
                ->set_width( 50 ),
            Field::make( 'select', 'city_foot_form_sub_case', 'Склонение города (если есть)' )
                ->set_width( 20 )
                ->set_options( $sklons ),
            Field::make( 'text', 'city_foot_form_sub_after', 'Конец подзаголовка (после города)' )
                ->set_width( 30 ),


            Field::make( 'html', 'crb_information_text_base_foot_form' )
                ->set_html( '<h1 style="color:blue">Форма подвала без города</h1>' ),

            Field::make( 'text', 'base_foot_form_tit', 'Заголовок' ),
            Field::make( 'text', 'base_foot_form_sub', 'Подзаголовок' ),

        ])
    ])


    ->add_tab( __('faq_texts'), [
        Field::make( 'complex', 'main_faq', 'FAQ главной' )
        ->set_collapsed( true )
        ->add_fields( [
            Field::make( 'text', 'subtitle', 'Вопрос (h3)' ),
            Field::make( 'rich_text', 'text', 'Ответ' ),
        ]),

        Field::make( 'complex', 'credit_pts_faq', 'FAQ Кредит под ПТС' )
        ->set_collapsed( true )
        ->add_fields( [
            Field::make( 'text', 'subtitle', 'Вопрос (h3)' ),
            Field::make( 'rich_text', 'text', 'Ответ' ),
        ]),

        Field::make( 'complex', 'credit_auto_faq', 'FAQ Кредит под залог авто' )
        ->set_collapsed( true )
        ->add_fields( [
            Field::make( 'text', 'subtitle', 'Вопрос (h3)' ),
            Field::make( 'rich_text', 'text', 'Ответ' ),
        ]),

        Field::make( 'complex', 'zaim_pts_faq', 'FAQ Займ под ПТС' )
        ->set_collapsed( true )
        ->add_fields( [
            Field::make( 'text', 'subtitle', 'Вопрос (h3)' ),
            Field::make( 'rich_text', 'text', 'Ответ' ),
        ]),

        Field::make( 'complex', 'zaim_auto_faq', 'FAQ Займ под залог автомобиля' )
        ->set_collapsed( true )
        ->add_fields( [
            Field::make( 'text', 'subtitle', 'Вопрос (h3)' ),
            Field::make( 'rich_text', 'text', 'Ответ' ),
        ]),

        Field::make( 'complex', 'fast_money_faq', 'FAQ Быстрый займ под залог ПТС авто' )
        ->set_collapsed( true )
        ->add_fields( [
            Field::make( 'text', 'subtitle', 'Вопрос (h3)' ),
            Field::make( 'rich_text', 'text', 'Ответ' ),
        ]),
        
        Field::make( 'complex', 'business_faq', 'FAQ Кредит для ИП под залог авто ПТС' )
        ->set_collapsed( true )
        ->add_fields( [
            Field::make( 'text', 'subtitle', 'Вопрос (h3)' ),
            Field::make( 'rich_text', 'text', 'Ответ' ),
        ]),
        
        Field::make( 'complex', 'refinance_faq', 'FAQ рефинансирования' )
        ->set_collapsed( true )
        ->add_fields( [
            Field::make( 'text', 'subtitle', 'Вопрос (h3)' ),
            Field::make( 'rich_text', 'text', 'Ответ' ),
        ]),
        
        Field::make( 'complex', 'truck_faq', 'FAQ грузовых' )
        ->set_collapsed( true )
        ->add_fields( [
            Field::make( 'text', 'subtitle', 'Вопрос (h3)' ),
            Field::make( 'rich_text', 'text', 'Ответ' ),
        ]),

        Field::make( 'complex', 'spec_faq', 'FAQ спецтехники' )
        ->set_collapsed( true )
        ->add_fields( [
            Field::make( 'text', 'subtitle', 'Вопрос (h3)' ),
            Field::make( 'rich_text', 'text', 'Ответ' ),
        ]),

        Field::make( 'complex', 'moto_faq', 'FAQ мото' )
        ->set_collapsed( true )
        ->add_fields( [
            Field::make( 'text', 'subtitle', 'Вопрос (h3)' ),
            Field::make( 'rich_text', 'text', 'Ответ' ),
        ]),

        Field::make( 'complex', '24h_faq', 'FAQ круглосуточного' )
        ->set_collapsed( true )
        ->add_fields( [
            Field::make( 'text', 'subtitle', 'Вопрос (h3)' ),
            Field::make( 'rich_text', 'text', 'Ответ' ),
        ])
    ])
?>