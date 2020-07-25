<footer>
  <div class="container">
    <div class="row border-bottom pt-5 pb-4 mx-0">
      <div class="col-12 col-lg-2 px-0">
        <p class="h4">Контакты автоломбарда</p>
        <hr class="d-block d-lg-none lil-hr lil-hr-main mx-auto">
      </div>
      <div class="col-12 col-lg-10">
        <div class="row row-cols-1 row-cols-lg-3">
          <div class="col">
            <div class="bd-callout bd-callout-main pl-lg-5 py-2 my-auto">
              <p class="semibold mb-0">Адрес:</p>
              <p><a href="#" class="smaller text-main text-dashed">Ленинсрадский проспект, 31Ас1</a></p>
            </div>
          </div>
          <div class="col">
            <div class="py-2 my-auto">
              <p class="semibold mb-0">Электронная почта:</p>
              <p>
                <a href="mailto:info@autolombard-autozalog.ru"
                    class="smaller text-main text-dashed">info@autolombard-autozalog.ru</a></p>
            </div>
          </div>
          <div class="col">
            <div class="py-2 my-auto">
              <p class="semibold mb-0">Часы работы:</p>
              <p class="smaller text-nowrap mt-1">Ежедневно с 8:00 до 20:00. Прием заявок 24/7</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row border-bottom pt-5 pb-4 mx-0">
      <div class="col-12 col-lg-2 px-0">
        <div class="logo text-center">
          <img src="<?= get_with_path('img/logo.png'); ?>" alt="">
        </div>
        <p class="smaller text-muted mt-3">Автоломбард «Автоломбард АвтоЗалог24» © 2020 год</p>
      </div>
      <div class="col-12 col-lg-10 pl-sm-5">
        <div class="row row-cols-1 row-cols-lg-4 row-cols-sm-3 ml-sm-2">
          <div class="col">
            <ul class="list-unstyled">
              <li><a href="#">Автоломбард</a></li>
              <li><a href="#">Калькулятор</a></li>
            </ul>
          </div>
          <div class="col">
            <ul class="list-unstyled">
              <li><a href="#">Грузовой автоломбард</a></li>
              <li><a href="#">Автоломбард спецтехники</a></li>
            </ul>
          </div>
          <div class="col">
            <ul class="list-unstyled">
              <li><a href="#">Автоломбард мототехники</a></li>
              <li><a href="/yuridicheskie-licza/">Юр. Лица</a></li>
            </ul>
          </div>
          <div class="col px-0 mx-auto">
            <p class="phone semibold mb-0 px-0">
              <a href="tel:88003334554" class="text-main">8 800 333 45 54</a>
            </p>
            <p class="h6">Звонок бесплатный</p>
          </div>
        </div>
      </div>
    </div>
    <div class="row mx-0">
      <p class="col-12 text-center text-muted smaller pt-3">
        Информация на сайте не является публичной офертой. Сервис «ПТС ЗАЙМ» оказывает содействие в подборе
        финансовых услуг компаний-партнеров и не является финансовым учреждением, банком, микрофинансовой
        организацией, лизинговой компанией, или ломбардом. Работа сайта autolombard-pts-zaim.ru не связана с
        осуществлением инвестиционной деятельности. Дополнительные и скрытые комиссии не взимаются. Все
        права защищены.
      </p>
    </div>
  </div>
</footer>

<?php
// get_template_part('theme-helpers/template-parts/modal','cities');
// get_template_part('theme-helpers/template-parts/modal','form');

// get_template_part('theme-helpers/template-parts/callback');
?>

<?php wp_footer() ?>
  <script defer="defer" src="<?= get_with_path('js/jquery.min.js');?>"></script>
  <script defer="defer" src="<?= get_with_path('js/bootstrap.bundle.min.js');?>"></script>
  <script defer="defer" src="<?= get_with_path('js/slick.min.js');?>"></script>
  <script defer="defer" src="<?= get_with_path('js/nouislider.min.js');?>"></script>
  <script defer="defer" src="<?= get_with_path('js/calc.js');?>"></script>
  <script defer="defer" src="<?= get_with_path('js/main.min.js');?>"></script>
</body>
</html>