<?php $colored = is_page_template(['page-first.php','page-third.php']); ?>

<section id="steps" class="row <?= $colored ? 'bg-lightgrey ' : ' '; ?>py-3 mt-5">
    <div class="container mx-auto my-5">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="mx-auto"><?= get_headlines($post->ID,$post->post_name,'steps'); ?></h2>
                <hr class="lil-hr lil-hr-main">
                <p class="subtitle">Четыре шага для получения займа</p>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-xl-4 mt-lg-3 slick">
            <div class="col d-flex">
                <div
                    class="overflow-hidden mb-3 position-relative mr-5 mr-md-3 rounded-xl shadow p-4 bg-white d-flex flex-column">
                    <picture>
                        <source srcset="<?= get_with_path('img/steps_1.webp'); ?>" type="image/webp">
                        <img class="mt-3" src="<?= get_with_path('img/steps_1.png');?>" alt="">
                    </picture>
                    <div class="half-circle-angle"><span class="h1">01</span></div>
                    <p class="text-nowrap pt-4 semibold subtitle">Оставляете заявку</p>
                    <p>Позвоните или заполните форму на сайте и получите одобрение</p>
                    <div class="mt-auto d-flex">
                        <svg width="16" height="19" viewBox="0 0 16 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.9441 4.94228C12.6469 3.42979 10.8881 2.46562 8.98251 2.21538V1.75905H9.17133C9.39161 1.75905 9.56993 1.57137 9.56993 1.33953V0.419524C9.56993 0.187682 9.39161 0 9.17133 0H6.83216C6.61188 0 6.43356 0.187682 6.43356 0.419524V1.34321C6.43356 1.57505 6.61188 1.76274 6.83216 1.76274H7.02098V2.22274C5.11539 2.4693 3.35664 3.43347 2.05944 4.94964C0.730766 6.49893 0 8.50087 0 10.5801C0 15.2243 3.58741 19 8 19C12.4126 19 16 15.2206 16 10.5801C16 8.49351 15.2692 6.49157 13.9441 4.94228ZM8 18.161C4.02797 18.161 0.793705 14.7569 0.793705 10.5764C0.793705 6.39589 4.02797 2.99187 8 2.99187C11.972 2.99187 15.2063 6.39589 15.2063 10.5764C15.2063 14.7569 11.972 18.161 8 18.161ZM7.81118 2.1565V1.75905H8.18532V2.15282H7.81118V2.1565ZM7.01748 1.14449V0.614565H8.98251V1.14449H7.01748Z"
                                fill="#00B4E3" />
                            <path
                                d="M8 3.69475C4.39511 3.69475 1.46154 6.7823 1.46154 10.5764C1.46154 14.3705 4.39511 17.4581 8 17.4581C11.6049 17.4581 14.5385 14.3705 14.5385 10.5764C14.5385 6.7823 11.6049 3.69475 8 3.69475ZM8 16.6227C4.83217 16.6227 2.25524 13.9105 2.25524 10.5764C2.25524 7.2423 4.83217 4.53012 8 4.53012C11.1678 4.53012 13.7448 7.2423 13.7448 10.5764C13.7448 13.9105 11.1678 16.6227 8 16.6227Z"
                                fill="#00B4E3" />
                            <path
                                d="M8 4.92388C7.77972 4.92388 7.60139 5.11156 7.60139 5.34341V10.5764C7.60139 10.8083 7.77972 10.9959 8 10.9959H12.972C13.1923 10.9959 13.3706 10.8083 13.3706 10.5764C13.3671 7.45942 10.9615 4.92388 8 4.92388ZM12.5559 10.1569H8.39511V5.77765C10.6049 5.98005 12.3671 7.83479 12.5559 10.1569Z"
                                fill="#00B4E3" />
                            <path
                                d="M12.1469 2.90722L14.486 4.7546C14.5559 4.8098 14.6364 4.83924 14.7238 4.83924C14.8497 4.83924 14.9685 4.77668 15.042 4.66996C15.1049 4.58164 15.1329 4.47124 15.1189 4.36084C15.1049 4.25044 15.049 4.15108 14.965 4.08483L12.6259 2.23746C12.4511 2.1013 12.1993 2.1381 12.0699 2.3221C12.007 2.41042 11.979 2.52082 11.993 2.63122C12.007 2.74162 12.0629 2.84098 12.1469 2.90722Z"
                                fill="#00B4E3" />
                        </svg>
                        <span class="text-main ml-2 semibold">5 минут</span>
                    </div>
                </div>
                <svg class="arrow" width="23" height="39" viewBox="0 0 23 39" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M16.5792 19.5L0 35.8366L3.21039 39L23 19.5L3.21039 0L0 3.16341L16.5792 19.5Z"
                        fill="#00B4E3" />
                </svg>

            </div>
            <div class="col d-flex">
                <div
                    class="overflow-hidden mb-3 position-relative mr-5 mr-md-3 rounded-xl shadow p-4 bg-white d-flex flex-column">
                    <picture>
                        <source srcset="<?= get_with_path('img/steps_2.webp'); ?>" type="image/webp">
                        <img class="mt-3" src="<?= get_with_path('img/steps_2.png');?>" alt="">
                    </picture>
                    <div class="half-circle-angle"><span class="h1">02</span></div>
                    <p class="text-nowrap pt-4 semibold subtitle">Оцениваем <?= vichele('автомобиль',$post->post_name); ?></p>
                    <p>Приезжаете в офис для оценки и проверки вашего <?= vichele('автомобиля',$post->post_name); ?></p>
                    <div class="mt-auto d-flex">
                        <svg width="16" height="19" viewBox="0 0 16 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.9441 4.94228C12.6469 3.42979 10.8881 2.46562 8.98251 2.21538V1.75905H9.17133C9.39161 1.75905 9.56993 1.57137 9.56993 1.33953V0.419524C9.56993 0.187682 9.39161 0 9.17133 0H6.83216C6.61188 0 6.43356 0.187682 6.43356 0.419524V1.34321C6.43356 1.57505 6.61188 1.76274 6.83216 1.76274H7.02098V2.22274C5.11539 2.4693 3.35664 3.43347 2.05944 4.94964C0.730766 6.49893 0 8.50087 0 10.5801C0 15.2243 3.58741 19 8 19C12.4126 19 16 15.2206 16 10.5801C16 8.49351 15.2692 6.49157 13.9441 4.94228ZM8 18.161C4.02797 18.161 0.793705 14.7569 0.793705 10.5764C0.793705 6.39589 4.02797 2.99187 8 2.99187C11.972 2.99187 15.2063 6.39589 15.2063 10.5764C15.2063 14.7569 11.972 18.161 8 18.161ZM7.81118 2.1565V1.75905H8.18532V2.15282H7.81118V2.1565ZM7.01748 1.14449V0.614565H8.98251V1.14449H7.01748Z"
                                fill="#00B4E3" />
                            <path
                                d="M8 3.69475C4.39511 3.69475 1.46154 6.7823 1.46154 10.5764C1.46154 14.3705 4.39511 17.4581 8 17.4581C11.6049 17.4581 14.5385 14.3705 14.5385 10.5764C14.5385 6.7823 11.6049 3.69475 8 3.69475ZM8 16.6227C4.83217 16.6227 2.25524 13.9105 2.25524 10.5764C2.25524 7.2423 4.83217 4.53012 8 4.53012C11.1678 4.53012 13.7448 7.2423 13.7448 10.5764C13.7448 13.9105 11.1678 16.6227 8 16.6227Z"
                                fill="#00B4E3" />
                            <path
                                d="M8 4.92388C7.77972 4.92388 7.60139 5.11156 7.60139 5.34341V10.5764C7.60139 10.8083 7.77972 10.9959 8 10.9959H12.972C13.1923 10.9959 13.3706 10.8083 13.3706 10.5764C13.3671 7.45942 10.9615 4.92388 8 4.92388ZM12.5559 10.1569H8.39511V5.77765C10.6049 5.98005 12.3671 7.83479 12.5559 10.1569Z"
                                fill="#00B4E3" />
                            <path
                                d="M12.1469 2.90722L14.486 4.7546C14.5559 4.8098 14.6364 4.83924 14.7238 4.83924C14.8497 4.83924 14.9685 4.77668 15.042 4.66996C15.1049 4.58164 15.1329 4.47124 15.1189 4.36084C15.1049 4.25044 15.049 4.15108 14.965 4.08483L12.6259 2.23746C12.4511 2.1013 12.1993 2.1381 12.0699 2.3221C12.007 2.41042 11.979 2.52082 11.993 2.63122C12.007 2.74162 12.0629 2.84098 12.1469 2.90722Z"
                                fill="#00B4E3" />
                        </svg>
                        <span class="text-main ml-2 semibold">20 минут</span>
                    </div>
                </div>
                <svg class="arrow" width="23" height="39" viewBox="0 0 23 39" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M16.5792 19.5L0 35.8366L3.21039 39L23 19.5L3.21039 0L0 3.16341L16.5792 19.5Z"
                        fill="#00B4E3" />
                </svg>
            </div>
            <div class="col d-flex">
                <div
                    class="overflow-hidden mb-3 position-relative mr-5 mr-md-3 rounded-xl shadow p-4 bg-white d-flex flex-column">
                    <picture>
                        <source srcset="<?= get_with_path('img/steps_3.webp'); ?>" type="image/webp">
                        <img class="mt-3" src="<?= get_with_path('img/steps_3.png');?>" alt="">
                    </picture>
                    <div class="half-circle-angle"><span class="h1">03</span></div>
                    <p class="text-nowrap pt-4 semibold subtitle">Заключаем договор</p>
                    <p>Мы оформляем с вами договор займа и залога </p>
                    <div class="mt-auto d-flex">
                        <svg width="16" height="19" viewBox="0 0 16 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.9441 4.94228C12.6469 3.42979 10.8881 2.46562 8.98251 2.21538V1.75905H9.17133C9.39161 1.75905 9.56993 1.57137 9.56993 1.33953V0.419524C9.56993 0.187682 9.39161 0 9.17133 0H6.83216C6.61188 0 6.43356 0.187682 6.43356 0.419524V1.34321C6.43356 1.57505 6.61188 1.76274 6.83216 1.76274H7.02098V2.22274C5.11539 2.4693 3.35664 3.43347 2.05944 4.94964C0.730766 6.49893 0 8.50087 0 10.5801C0 15.2243 3.58741 19 8 19C12.4126 19 16 15.2206 16 10.5801C16 8.49351 15.2692 6.49157 13.9441 4.94228ZM8 18.161C4.02797 18.161 0.793705 14.7569 0.793705 10.5764C0.793705 6.39589 4.02797 2.99187 8 2.99187C11.972 2.99187 15.2063 6.39589 15.2063 10.5764C15.2063 14.7569 11.972 18.161 8 18.161ZM7.81118 2.1565V1.75905H8.18532V2.15282H7.81118V2.1565ZM7.01748 1.14449V0.614565H8.98251V1.14449H7.01748Z"
                                fill="#00B4E3" />
                            <path
                                d="M8 3.69475C4.39511 3.69475 1.46154 6.7823 1.46154 10.5764C1.46154 14.3705 4.39511 17.4581 8 17.4581C11.6049 17.4581 14.5385 14.3705 14.5385 10.5764C14.5385 6.7823 11.6049 3.69475 8 3.69475ZM8 16.6227C4.83217 16.6227 2.25524 13.9105 2.25524 10.5764C2.25524 7.2423 4.83217 4.53012 8 4.53012C11.1678 4.53012 13.7448 7.2423 13.7448 10.5764C13.7448 13.9105 11.1678 16.6227 8 16.6227Z"
                                fill="#00B4E3" />
                            <path
                                d="M8 4.92388C7.77972 4.92388 7.60139 5.11156 7.60139 5.34341V10.5764C7.60139 10.8083 7.77972 10.9959 8 10.9959H12.972C13.1923 10.9959 13.3706 10.8083 13.3706 10.5764C13.3671 7.45942 10.9615 4.92388 8 4.92388ZM12.5559 10.1569H8.39511V5.77765C10.6049 5.98005 12.3671 7.83479 12.5559 10.1569Z"
                                fill="#00B4E3" />
                            <path
                                d="M12.1469 2.90722L14.486 4.7546C14.5559 4.8098 14.6364 4.83924 14.7238 4.83924C14.8497 4.83924 14.9685 4.77668 15.042 4.66996C15.1049 4.58164 15.1329 4.47124 15.1189 4.36084C15.1049 4.25044 15.049 4.15108 14.965 4.08483L12.6259 2.23746C12.4511 2.1013 12.1993 2.1381 12.0699 2.3221C12.007 2.41042 11.979 2.52082 11.993 2.63122C12.007 2.74162 12.0629 2.84098 12.1469 2.90722Z"
                                fill="#00B4E3" />
                        </svg>
                        <span class="text-main ml-2 semibold">10 минут</span>
                    </div>
                </div>
                <svg class="arrow" width="23" height="39" viewBox="0 0 23 39" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M16.5792 19.5L0 35.8366L3.21039 39L23 19.5L3.21039 0L0 3.16341L16.5792 19.5Z"
                        fill="#00B4E3" />
                </svg>
            </div>
            <div class="col d-flex">
                <div
                    class="overflow-hidden mb-3 position-relative mr-5 mr-md-3 rounded-xl shadow p-4 bg-white d-flex flex-column">
                    <picture>
                        <source srcset="<?= get_with_path('img/steps_4.webp'); ?>" type="image/webp">
                        <img class="mt-3" src="<?= get_with_path('img/steps_4.png');?>" alt="">
                    </picture>
                    <div class="half-circle-angle"><span class="h1">04</span></div>
                    <p class="text-nowrap pt-4 semibold subtitle">Получаете деньги</p>
                    <p>Наличными или на карту, а вы продолжаете пользоваться <?= vichele('авто_2',$post->post_name); ?></p>
                    <div class="mt-auto d-flex">
                        <svg width="16" height="19" viewBox="0 0 16 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.9441 4.94228C12.6469 3.42979 10.8881 2.46562 8.98251 2.21538V1.75905H9.17133C9.39161 1.75905 9.56993 1.57137 9.56993 1.33953V0.419524C9.56993 0.187682 9.39161 0 9.17133 0H6.83216C6.61188 0 6.43356 0.187682 6.43356 0.419524V1.34321C6.43356 1.57505 6.61188 1.76274 6.83216 1.76274H7.02098V2.22274C5.11539 2.4693 3.35664 3.43347 2.05944 4.94964C0.730766 6.49893 0 8.50087 0 10.5801C0 15.2243 3.58741 19 8 19C12.4126 19 16 15.2206 16 10.5801C16 8.49351 15.2692 6.49157 13.9441 4.94228ZM8 18.161C4.02797 18.161 0.793705 14.7569 0.793705 10.5764C0.793705 6.39589 4.02797 2.99187 8 2.99187C11.972 2.99187 15.2063 6.39589 15.2063 10.5764C15.2063 14.7569 11.972 18.161 8 18.161ZM7.81118 2.1565V1.75905H8.18532V2.15282H7.81118V2.1565ZM7.01748 1.14449V0.614565H8.98251V1.14449H7.01748Z"
                                fill="#00B4E3" />
                            <path
                                d="M8 3.69475C4.39511 3.69475 1.46154 6.7823 1.46154 10.5764C1.46154 14.3705 4.39511 17.4581 8 17.4581C11.6049 17.4581 14.5385 14.3705 14.5385 10.5764C14.5385 6.7823 11.6049 3.69475 8 3.69475ZM8 16.6227C4.83217 16.6227 2.25524 13.9105 2.25524 10.5764C2.25524 7.2423 4.83217 4.53012 8 4.53012C11.1678 4.53012 13.7448 7.2423 13.7448 10.5764C13.7448 13.9105 11.1678 16.6227 8 16.6227Z"
                                fill="#00B4E3" />
                            <path
                                d="M8 4.92388C7.77972 4.92388 7.60139 5.11156 7.60139 5.34341V10.5764C7.60139 10.8083 7.77972 10.9959 8 10.9959H12.972C13.1923 10.9959 13.3706 10.8083 13.3706 10.5764C13.3671 7.45942 10.9615 4.92388 8 4.92388ZM12.5559 10.1569H8.39511V5.77765C10.6049 5.98005 12.3671 7.83479 12.5559 10.1569Z"
                                fill="#00B4E3" />
                            <path
                                d="M12.1469 2.90722L14.486 4.7546C14.5559 4.8098 14.6364 4.83924 14.7238 4.83924C14.8497 4.83924 14.9685 4.77668 15.042 4.66996C15.1049 4.58164 15.1329 4.47124 15.1189 4.36084C15.1049 4.25044 15.049 4.15108 14.965 4.08483L12.6259 2.23746C12.4511 2.1013 12.1993 2.1381 12.0699 2.3221C12.007 2.41042 11.979 2.52082 11.993 2.63122C12.007 2.74162 12.0629 2.84098 12.1469 2.90722Z"
                                fill="#00B4E3" />
                        </svg>
                        <span class="text-main ml-2 semibold">Моментально</span>
                    </div>
                </div>
            </div>
        </div>
        <?php get_template_part('theme-helpers/template-parts/textBlock'); ?>
    </div>
</section>