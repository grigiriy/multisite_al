<section id="calc" class="row bg-lightgrey pb-3">
    <div class="container mx-auto my-5">
        <div class="row mt-3">
            <div class="col-12 col-lg-7">
                <h2><?= get_headlines($post->ID,$post->post_name,'calc'); ?></h2>
                <hr class="d-block d-lg-none lil-hr lil-hr-main ml-0">
            </div>
            <div class="col-12 col-lg-5 d-flex">
                <p class="bd-callout bd-callout-main pl-lg-3 py-lg-2 my-auto subtitle">Узнайте сумму к возврату,
                    ежемесячный
                    платеж и ставку</p>
            </div>
        </div>
        <form id="form-calculator" name="summ" action="#" method="POST" class="row mt-5">
            <div class="col-12 col-lg-7 pr-lg-5">
                <div class="form-group position-relative pt-3 mb-5 mr-lg-4">
                    <label class="subtitle" for="calc_sum">Необходимая сумма</label>
                    <input name="calc_sum" id="calc_sum" type="text" class="form-control input-calc" value="" placeholder="1 000 000 ₽">
                    <div id="calc_sum_range"></div>
                    <p class="position-absolute w-100 d-flex justify-content-between text-muted mt-2">
                        <span>30 000 ₽</span>
                        <span>1 000 000 ₽</span>
                        <span>10 000 000 ₽</span>
                    </p>
                </div>
                <div class="form-group position-relative pt-3 mb-5 mr-lg-4">
                    <label class="subtitle" for="calc_term">Срок займа</label>
                    <input type="text" class="form-control input-calc" id="calc_term" name="calc_term" value=""  placeholder="12 месяцев">
                    <div id="calc_month_range"></div>
                    <p class="position-absolute w-100 d-flex justify-content-between text-muted mt-2">
                        <span>1</span>
                        <span>18</span>
                        <span>36</span>
                    </p>
                </div>
                <div class="form-group pt-3 mr-lg-4">
                    <label class="subtitle" for="monthly" for="calc_payment_pay">Ежемесячный платеж</label>
                    <input id="calc_payment_pay" type="text" class="form-control input-calc" name="calc_payment" value="" placeholder="97 487 ₽">
                    <div id="calc_pay_range2"></div>
                </div>
            </div>
            <div class="col-12 col-lg-5 px-lg-3">
                <div class="rounded-xl bg-white px-xl-5 pt-5 pb-2">
                    <div class="px-3">
                        <div class="d-flex subtitle mb-2">
                            <input id="calc_rate_range" type="hidden" value="2.5" name="calc_rate_range" class="calc-range">
                            <span class="text-nowrap">Ваша ставка</span>
                            <span class="ml-auto text-main h4 text-right">
                                <span class="procent form-stv text-nowrap">2 %</span>
                                <span> в месяц</span>
                            </span>
                        </div>
                        <div class="d-flex subtitle mb-2">
                            <span class="text-nowrap">Сумма процентов</span>
                            <span class="ml-auto h4 text-right text-nowrap" id="calc_overpayment">177 789 ₽</span>
                        </div>
                        <div class="d-flex subtitle mb-2">
                            <span class="text-nowrap">Сумма к возврату</span>
                            <span class="ml-auto h4 text-right text-nowrap" id="calc_payments_sum">762 789 ₽</span>
                        </div>
                    </div>
                </div>
                <div class="rounded-xl bg-white px-xl-5 py-3 mt-1 position-relative">
                    <div class="px-3 __phone __calc_phone">
                        <input type="text" class="form-control my-3" placeholder="Ваше имя">
                        <input type="text" class="form-control my-3" placeholder="+7 (___) ___-__-__" name="phone">
                        <button class="btn btn-main w-100 mb-3" type="submit">
                            Получить одобрение
                        </button>
                        <p class="smaller text-center px-3">
                            Нажимая на кнопку, вы даете согласие на обработку ваших персональных данных
                        </p>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>