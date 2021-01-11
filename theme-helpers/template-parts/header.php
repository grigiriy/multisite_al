<header class="fixed-top border-bottom bg-white">
    <div class="container-fluid container-lg">
        <div class="row">
            <nav class="navbar d-none d-lg-flex w-100">
                <div class="logo" data-city="<?= get_city(); ?>">
                <a href="/">
                    <picture>
                        <source srcset="<?= get_with_path('img/logo.webp'); ?>" type="image/webp">
                        <img src="<?= get_with_path('img/logo.png');?>" alt="">
                    </picture>
                </a>
                </div>
                <button class="text-main city-btn btn btn-link" data-toggle="modal" data-target="#cityModal">
                    <svg width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M14.1501 8.00465C14.1499 4.60805 11.3919 1.85 8.00009 1.85C4.60836 1.85 1.85028 4.60797 1.85009 7.99965C1.83948 10.2682 2.95919 12.4072 4.26859 14.133C5.57996 15.8615 7.09531 17.1936 7.90554 17.8514L8.00002 17.9282L8.09456 17.8515C8.90534 17.1941 10.4207 15.8625 11.7319 14.1348C13.0412 12.4097 14.1607 10.2717 14.1501 8.00465ZM14.1501 8.00465C14.1501 8.00476 14.1501 8.00488 14.1501 8.005H14.0001L14.1501 8.00429C14.1501 8.00441 14.1501 8.00453 14.1501 8.00465ZM7.50726 19.6919L7.5067 19.6915C7.35991 19.5877 5.50854 18.2523 3.69906 16.1431C1.88683 14.0306 0.135829 11.1643 0.150088 7.99567V7.995C0.150088 3.6719 3.67187 0.15 8.00009 0.15C12.3282 0.15 15.8501 3.67184 15.8501 8L15.8501 8.00068C15.8643 11.1667 14.1134 14.0318 12.3011 16.1437C10.4916 18.2523 8.64027 19.5877 8.49347 19.6915L8.49291 19.6919C8.3491 19.7946 8.1768 19.8498 8.00009 19.8498C7.82337 19.8498 7.65107 19.7946 7.50726 19.6919ZM11.8501 8C11.8501 10.1232 10.1232 11.85 8.00009 11.85C5.87693 11.85 4.15009 10.1232 4.15009 8C4.15009 5.87684 5.87693 4.15 8.00009 4.15C10.1232 4.15 11.8501 5.87684 11.8501 8ZM10.1501 8C10.1501 6.81416 9.18593 5.85 8.00009 5.85C6.81424 5.85 5.85009 6.81416 5.85009 8C5.85009 9.18584 6.81424 10.15 8.00009 10.15C9.18593 10.15 10.1501 9.18584 10.1501 8ZM8.58009 19.814C8.88409 19.599 16.0291 14.44 16.0001 8L7.42009 19.814C7.58934 19.9349 7.79211 19.9998 8.00009 19.9998C8.20806 19.9998 8.41084 19.9349 8.58009 19.814Z"
                            fill="#00B4E3" stroke="white" stroke-width="0.3" />
                    </svg>
                    <?= get_city(); ?>
                </button>
                <ul class="navbar-nav mx-auto d-flex flex-row">
                    <li class="nav-item">
                        <a class="nav-link" href="#calc">Калькулятор</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#big_form">Заявка</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about/">О компании</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contacts/">Контакты</a>
                    </li>
                </ul>
                <div class="header-phone d-flex flex-column pr-3">
                    <p class="phone mt-auto mb-1"><a href="tel:<?= get_phone(true); ?>" class="text-main"><?= get_phone(); ?></a></p>
                    <p class="smaller text-muted mb-auto text-right">Звонок бесплатный</p>
                </div>
                <button class="btn btn-outline-main d-none d-xl-block" data-toggle="modal" data-target="#formModal">Заказать звонок</button>
                <a class="d-block d-xl-none" href="#">
                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M17.0115 22C16.7973 21.9993 16.5839 21.9753 16.3748 21.9283C12.3931 21.086 8.72493 19.1111 5.79244 16.2309C2.92252 13.3443 0.932083 9.66907 0.0619434 5.64986C-0.0406571 5.14894 -0.0154749 4.62945 0.135067 4.14137C0.28561 3.65329 0.556445 3.21304 0.921518 2.86298L3.4684 0.356097C3.59849 0.230289 3.75306 0.133948 3.92202 0.0733612C4.09097 0.0127745 4.27053 -0.0106958 4.44896 0.00448221C4.63396 0.0242202 4.8125 0.085167 4.972 0.183037C5.13151 0.280906 5.26811 0.413322 5.3722 0.570973L8.55581 5.38289C8.6752 5.5696 8.73283 5.79057 8.72022 6.01328C8.70761 6.23599 8.62543 6.44868 8.48577 6.62005L6.8876 8.57347C7.5241 10.0141 8.4255 11.3161 9.54273 12.4087C10.6527 13.5409 11.9647 14.4449 13.4076 15.0718L15.3878 13.4635C15.5542 13.3291 15.7565 13.2496 15.9681 13.2357C16.1796 13.2217 16.3903 13.2739 16.5721 13.3854L21.3794 16.5629C21.5444 16.6637 21.6849 16.8013 21.7905 16.9654C21.8961 17.1296 21.964 17.3161 21.9891 17.5109C22.0142 17.7057 21.9959 17.9038 21.9355 18.0903C21.8751 18.2768 21.7742 18.447 21.6404 18.588L19.1572 21.1014C18.8752 21.3884 18.5404 21.6156 18.1721 21.7698C17.8038 21.924 17.4094 22.0022 17.0115 22ZM4.34708 1.29374L1.80019 3.80062C1.59482 3.99632 1.44279 4.24332 1.35906 4.51732C1.27533 4.79132 1.26279 5.08289 1.32265 5.36336C2.13175 9.13484 3.99161 12.586 6.67748 15.2997C9.43716 18.0095 12.8891 19.8671 16.6358 20.6586C16.9194 20.7192 17.2133 20.707 17.4911 20.6229C17.7689 20.5388 18.022 20.3855 18.2276 20.1768L20.7108 17.6634L16.0691 14.5965L13.9425 16.3285C13.8611 16.3944 13.7651 16.439 13.663 16.4583C13.5609 16.4776 13.4558 16.471 13.3567 16.4392C11.5909 15.7739 9.99063 14.7177 8.67042 13.3463C7.30488 12.0422 6.24491 10.4396 5.56959 8.65812C5.54102 8.55027 5.54007 8.43671 5.56683 8.32837C5.59359 8.22004 5.64717 8.12057 5.7224 8.03954L7.44155 5.93636L4.34708 1.29374Z"
                            fill="#00B4E3" />
                    </svg>
                </a>
            </nav>
            <nav class="navbar  d-flex d-lg-none w-100">
                <button class="navbar-toggler text-main border-none" type="button" data-toggle="collapse"
                    data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                    <svg width="24" height="16" viewBox="0 0 24 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M0 1C0 0.447715 0.447715 0 1 0H23C23.5523 0 24 0.447715 24 1C24 1.55228 23.5523 2 23 2H1C0.447716 2 0 1.55228 0 1Z"
                            fill="#00B4E3" />
                        <path
                            d="M0 8C0 7.44772 0.447715 7 1 7H23C23.5523 7 24 7.44772 24 8C24 8.55228 23.5523 9 23 9H1C0.447716 9 0 8.55228 0 8Z"
                            fill="#00B4E3" />
                        <path
                            d="M0 15C0 14.4477 0.447715 14 1 14H23C23.5523 14 24 14.4477 24 15C24 15.5523 23.5523 16 23 16H1C0.447716 16 0 15.5523 0 15Z"
                            fill="#00B4E3" />
                    </svg>
                </button>
                <div class="logo">
                    <picture>
                        <source srcset="<?= get_with_path('img/logo.webp'); ?>" type="image/webp">
                        <img src="<?= get_with_path('img/logo.png');?>" alt="">
                    </picture>
                </div>
                <a href="#">
                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M17.0115 22C16.7973 21.9993 16.5839 21.9753 16.3748 21.9283C12.3931 21.086 8.72493 19.1111 5.79244 16.2309C2.92252 13.3443 0.932083 9.66907 0.0619434 5.64986C-0.0406571 5.14894 -0.0154749 4.62945 0.135067 4.14137C0.28561 3.65329 0.556445 3.21304 0.921518 2.86298L3.4684 0.356097C3.59849 0.230289 3.75306 0.133948 3.92202 0.0733612C4.09097 0.0127745 4.27053 -0.0106958 4.44896 0.00448221C4.63396 0.0242202 4.8125 0.085167 4.972 0.183037C5.13151 0.280906 5.26811 0.413322 5.3722 0.570973L8.55581 5.38289C8.6752 5.5696 8.73283 5.79057 8.72022 6.01328C8.70761 6.23599 8.62543 6.44868 8.48577 6.62005L6.8876 8.57347C7.5241 10.0141 8.4255 11.3161 9.54273 12.4087C10.6527 13.5409 11.9647 14.4449 13.4076 15.0718L15.3878 13.4635C15.5542 13.3291 15.7565 13.2496 15.9681 13.2357C16.1796 13.2217 16.3903 13.2739 16.5721 13.3854L21.3794 16.5629C21.5444 16.6637 21.6849 16.8013 21.7905 16.9654C21.8961 17.1296 21.964 17.3161 21.9891 17.5109C22.0142 17.7057 21.9959 17.9038 21.9355 18.0903C21.8751 18.2768 21.7742 18.447 21.6404 18.588L19.1572 21.1014C18.8752 21.3884 18.5404 21.6156 18.1721 21.7698C17.8038 21.924 17.4094 22.0022 17.0115 22ZM4.34708 1.29374L1.80019 3.80062C1.59482 3.99632 1.44279 4.24332 1.35906 4.51732C1.27533 4.79132 1.26279 5.08289 1.32265 5.36336C2.13175 9.13484 3.99161 12.586 6.67748 15.2997C9.43716 18.0095 12.8891 19.8671 16.6358 20.6586C16.9194 20.7192 17.2133 20.707 17.4911 20.6229C17.7689 20.5388 18.022 20.3855 18.2276 20.1768L20.7108 17.6634L16.0691 14.5965L13.9425 16.3285C13.8611 16.3944 13.7651 16.439 13.663 16.4583C13.5609 16.4776 13.4558 16.471 13.3567 16.4392C11.5909 15.7739 9.99063 14.7177 8.67042 13.3463C7.30488 12.0422 6.24491 10.4396 5.56959 8.65812C5.54102 8.55027 5.54007 8.43671 5.56683 8.32837C5.59359 8.22004 5.64717 8.12057 5.7224 8.03954L7.44155 5.93636L4.34708 1.29374Z"
                            fill="#00B4E3" />
                    </svg>
                </a>
            </nav>
            <div class="collapse w-100" id="navbar">
                <div class=" p-4">
                    <button class="text-main text-nowrap btn btn-link px-0" data-toggle="modal" data-target="#cityModal">
                        <svg width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M14.1501 8.00465C14.1499 4.60805 11.3919 1.85 8.00009 1.85C4.60836 1.85 1.85028 4.60797 1.85009 7.99965C1.83948 10.2682 2.95919 12.4072 4.26859 14.133C5.57996 15.8615 7.09531 17.1936 7.90554 17.8514L8.00002 17.9282L8.09456 17.8515C8.90534 17.1941 10.4207 15.8625 11.7319 14.1348C13.0412 12.4097 14.1607 10.2717 14.1501 8.00465ZM14.1501 8.00465C14.1501 8.00476 14.1501 8.00488 14.1501 8.005H14.0001L14.1501 8.00429C14.1501 8.00441 14.1501 8.00453 14.1501 8.00465ZM7.50726 19.6919L7.5067 19.6915C7.35991 19.5877 5.50854 18.2523 3.69906 16.1431C1.88683 14.0306 0.135829 11.1643 0.150088 7.99567V7.995C0.150088 3.6719 3.67187 0.15 8.00009 0.15C12.3282 0.15 15.8501 3.67184 15.8501 8L15.8501 8.00068C15.8643 11.1667 14.1134 14.0318 12.3011 16.1437C10.4916 18.2523 8.64027 19.5877 8.49347 19.6915L8.49291 19.6919C8.3491 19.7946 8.1768 19.8498 8.00009 19.8498C7.82337 19.8498 7.65107 19.7946 7.50726 19.6919ZM11.8501 8C11.8501 10.1232 10.1232 11.85 8.00009 11.85C5.87693 11.85 4.15009 10.1232 4.15009 8C4.15009 5.87684 5.87693 4.15 8.00009 4.15C10.1232 4.15 11.8501 5.87684 11.8501 8ZM10.1501 8C10.1501 6.81416 9.18593 5.85 8.00009 5.85C6.81424 5.85 5.85009 6.81416 5.85009 8C5.85009 9.18584 6.81424 10.15 8.00009 10.15C9.18593 10.15 10.1501 9.18584 10.1501 8ZM8.58009 19.814C8.88409 19.599 16.0291 14.44 16.0001 8L7.42009 19.814C7.58934 19.9349 7.79211 19.9998 8.00009 19.9998C8.20806 19.9998 8.41084 19.9349 8.58009 19.814Z"
                                fill="#00B4E3" stroke="white" stroke-width="0.3" />
                        </svg>
                        <?= get_city(); ?>
                    </button>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#calc">Калькулятор</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#big_form">Заявка</a>
                        </li>
                        <li class="nav-item">
                            <a href="/about/">О компании</a>
                        </li>
                        <li class="nav-item">
                            <a href="/contacts/">Контакты</a>
                        </li>
                    </ul>
                    <div class="header-phone mt-3">
                        <p class="phone mb-0"><a href="tel:<?= get_phone(true); ?>" class="text-main"><?= get_phone(); ?></a></p>
                        <p class="smaller">Звонок бесплатный</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>