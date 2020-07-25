var $ = jQuery;

var c = 0;

function isValidEmail(emailAddress) {
  var pattern = new RegExp(
    /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i
  );
  return pattern.test(emailAddress);
}

function isValidPhone(phone) {
  var phone = phone.replace(/[^0-9]/gim, '');
  var flag = !0;
  var length = phone.length;
  for (var i = 0; i < length; i++) {
    if (i == 1) {
      if (phone[i] == '7' || phone[i] == '8') {
        var flag = !1;
      }
    }
  }
  if (length < 10) {
    var flag = !1;
  }
  return flag;
}

function resizeModal(event, maxWidth) {
  if (maxWidth === undefined) {
    maxWidth = null;
  }
  var wWidth = $(window).width();
  var width = wWidth * 0.9;
  if (!maxWidth) {
    if (!event) {
      $('#modal_form').css('max-width', 'none');
    }
    if ($('#modal_form').css('max-width') != 'none') {
      maxWidth = parseInt($('#modal_form').css('max-width'));
    }
  }
  if (maxWidth) {
    $('#modal_form').css('max-width', maxWidth);
    width = Math.min(width, maxWidth);
  }
  $('#modal_form').css('width', width);
  if (event) {
    $('#modal_form').css('top', window.pageYOffset + 30 + 'px');
  }
}

function showModal(content, maxWidth) {
  if (maxWidth === undefined) {
    maxWidth = null;
  }
  $('#modal_content').html(content);
  resizeModal(null, maxWidth);
  $('#overlay').fadeIn(400, function () {
    $('#modal_form')
      .css('display', 'block')
      .animate(
        {
          opacity: 1,
          top: window.pageYOffset + 30 + 'px',
        },
        200
      );
  });
  $('.modal-wrapper').fadeToggle(500);
}
(function ($) {
  'use strict';
  $(document).ready(function () {
    var rangeSumm = document.getElementById('calc_sum_range');
    var rangeMonth = document.getElementById('calc_month_range');
    var rangePay = document.getElementById('calc_pay_range2');
    noUiSlider.create(rangeSumm, {
      start: [1000000],
      step: 5000,
      connect: [!0, !1],
      range: {
        min: 30000,
        '23%': [100000, 5000],
        '46%': [1000000, 50000],
        max: 10000000,
      },
    });
    noUiSlider.create(rangeMonth, {
      start: [12],
      step: 1,
      connect: [!0, !1],
      range: {
        min: 1,
        '50%': [18, 3],
        max: 36,
      },
    });
    noUiSlider.create(rangePay, {
      start: [200000],
      step: 5000,
      connect: [!0, !1],
      range: {
        min: 20000,
        '46%': [1000000, 50000],
        max: 10000000,
      },
    });
    rangeSumm.noUiSlider.on('slide', function (values, handle) {
      calcResult();
    });
    rangeMonth.noUiSlider.on('slide', function (values, handle) {
      calcResult();
    });
    rangePay.noUiSlider.on('slide', function (values, handle) {
      calcResult(!0);
    });
    var page = $('[name=def-page]').val();
    var maxsum = 0;
    if (page == 'truck' || page == 'special') {
      maxsum = 10;
    } else if (page == 'moto') {
      maxsum = 5;
    } else if (page == 'legal') {
      maxsum = 30;
    } else {
      maxsum = 10;
    }
    rangeSumm.noUiSlider.updateOptions({
      range: {
        min: 30000,
        '46%': [1000000, 50000],
        max: maxsum * 1000000,
      },
    });
    $('.calc_sum_res')
      .siblings('.under-input-wrapper')
      .find('.under-input-2')
      .html(maxsum + ' 000 000');
    $('.max-sum').html(maxsum + ' 000 000 ₽');
    $(function () {
      if ($('body').width() < 768) {
        $('.li-main-1').html(
          '<div class="li-pre"></div>100% Р С•Р Т‘Р С•Р В±РЎР‚Р ВµР Р…Р С‘Р Вµ'
        );
        $('.li-main-2').html(
          '<div class="li-pre"></div>Р РЋРЎС“Р СР СР В° Р С•РЎвЂљ 30 000 Р Т‘Р С• <span class="max-sum">' +
            maxsum +
            ' Р СР В»Р Р…. ₽</span>'
        );
        $('.li-main-3').html(
          '<div class="li-pre"></div>Р РЋРЎР‚Р С•Р С” Р С•РЎвЂљ 1 РњРµСЃСЏС†Р В° Р Т‘Р С• 3 Р В»Р ВµРЎвЂљ'
        );
      }
    });
    $('.graph-button').click(function (event) {
      showShedule();
    });
    $('.mob-menu-but-h-3').click(function () {
      $('.modal-wrapper').fadeOut(500);
    });
    $('#main-form-summ-credit').on('change', function () {
      var val = $(this).val();
      $(this).val(addSpaces(val) + ' ₽');
    });
  });
})(jQuery);

function isIE() {
  var ua = navigator.userAgent;
  var msie = ua.indexOf('MSIE ');
  if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
    return !0;
  } else {
    return !1;
  }
}

function addSpaces(nStr) {
  nStr += '';
  x = nStr.split('.');
  x1 = x[0];
  x2 = x.length > 1 ? '.' + x[1] : '';
  var rgx = /(\d+)(\d{3})/;
  while (rgx.test(x1)) {
    x1 = x1.replace(rgx, '$1' + ' ' + '$2');
  }
  return x1 + x2;
}

function calcSumFromPriceAndFee(fromPayment) {
  var price = $('#calc_price_range').val();
  var fee = $('#calc_fee_range').val();
  var sum = price - fee;
  rangeSumm.noUiSlider.set(sum);
  calcSumRangeInput(fromPayment);
}

function calcPriceRangeInput(fromPayment) {
  var ir = $('#calc_price_range');
  var val = ir.val();
  $('#calc_price').val(addSpaces(val) + ' ₽');
  var max_fee = val - 10000000;
  if ($('#calc_min_fee').length > 0) {
    var min_fee = val * $('#calc_min_fee').val();
    var max_sum = val - min_fee;
  }
  calcFeeRangeInput(fromPayment);
}

function calcFeeRangeInput(fromPayment) {
  var ir = $('#calc_fee_range');
  var val = ir.val();
  $('#calc_fee').val(addSpaces(val) + ' ₽');
  calcSumFromPriceAndFee(fromPayment);
}

function calcSumRangeInput(fromPayment) {
  var ir = document.getElementById('calc_sum_range');
  var val = parseFloat(ir.noUiSlider.get()).toFixed(0);
  $('.calc_sum_res').val(addSpaces(val) + ' ₽');
  var val = $('[name=calc_payment]').val().replace(/[^\d]/g, '');
  var month = $('[name=calc_term]').val().replace(/[^\d]/g, '');
  $('.calc_sum_res-2').val(month * val);
  $('#calc_sum_res_request').val(addSpaces(val.toLocaleString()) + ' ₽');
  var payment_type = $('#calc_payment_type').val();
  if (fromPayment !== !0) {
    $('.calc_payment_range_custom').attr('step', 1);
    $('#calc_fee_range').attr('step', 50000);
  }
  if ($('#calc_fee_range').length > 0) {
    var price = $('#calc_price_range').val();
    var sum = val;
    var fee = price - sum;
    $('#calc_fee_range').val(fee);
    $('#calc_fee').val(addSpaces(fee) + ' ₽');
  }
  calcResult(fromPayment);
}

function plural(number, one, two, five) {
  var result;
  if ((number - (number % 10)) % 100 != 10) {
    if (number % 10 == 1) {
      result = one;
    } else if (number % 10 >= 2 && number % 10 <= 4) {
      result = two;
    } else {
      result = five;
    }
  } else {
    result = five;
  }
  return result;
}

function calcPaymentRangeInput() {
  var ir = $('.calc_payment_range_custom');
  ir.attr('step', 1000);
  ir.attr('min', Math.floor(ir.attr('min') / 1000) * 1000);
  ir.attr('max', Math.ceil((ir.attr('max') / 1000) * 1000) + 1);
  var payment = ir.val();
  var term = parseFloat($('.calc_term_range_custom').val());
  var rate = parseFloat($('#calc_rate_range').val() / 100);
  var payment_type = $('#calc_payment_type').val();
  if (payment_type == '1') {
    var kef = rate + rate / (Math.pow(1 + rate, term) - 1);
    var sum = Math.round(payment / kef);
  } else if (payment_type >= 2) {
    var sum = Math.round(payment / rate);
  }
  document.getElementById('calc_sum_range').noUiSlider.updateOptions({
    step: 50000,
    range: {
      min: 30000,
      '46%': [1000000, 50000],
      max: 10000000,
    },
  });
  document.getElementById('calc_sum_range').noUiSlider.set(sum);
  $('#calc_fee_range').attr('step', 1);
  calcSumRangeInput(!0);
}
var min_payment;
var max_payment;

function calcResult(res = !1, flag = !1) {
  if (!res) {
    var sum = document.getElementById('calc_sum_range').noUiSlider.get();
    var min_sum = 30000;
    var max_sum = 10000000;
    var rate = parseFloat($('#calc_rate_range').val() / 100);
    var min_rate = $('#calc_rate_range').attr('min') / 100;
    var max_rate = $('#calc_rate_range').attr('max') / 100;
    var payment_type = 1;
    var stv = getStv(!0);
    var mths = parseInt(
      document.getElementById('calc_month_range').noUiSlider.get()
    );
    var kef = rate + rate / (Math.pow(1 + rate, mths) - 1);
    var payment = (sum * kef).toFixed(2);
    var payments_sum = payment * mths;
    var overpayment = payments_sum - sum;
    window.min_payment = Math.round(
      min_sum * (rate + rate / (Math.pow(1 + rate, mths) - 1))
    );
    window.max_payment = Math.round(
      max_sum * (rate + rate / (Math.pow(1 + rate, mths) - 1))
    );
    document.getElementById('calc_pay_range2').noUiSlider.set(payment);
    $('#calc_sum').val(addSpaces(Math.round(sum)) + ' ₽');
    $('#calc_payment_pay').val(addSpaces(Math.round(payment)) + ' ₽');
    $('#calc_payments_sum').html(addSpaces(Math.round(payments_sum)) + ' ₽');
    $('#calc_overpayment').html(addSpaces(Math.round(overpayment)) + ' ₽');
    $('#sumcr').val(addSpaces(sum) + ' ₽');
    $('[name=sum-f]').val(addSpaces(sum) + ' ₽');
    document.getElementById('calc_pay_range2').noUiSlider.updateOptions({
      range: {
        min: window.min_payment,
        max: window.max_payment,
      },
    });
  } else {
    if (flag) {
      var payment = $('#calc_payment_pay').val();
      console.log(payment);
      payment = payment.replace(/[^\d]/g, '');
    } else {
      var payment = parseFloat(
        document.getElementById('calc_pay_range2').noUiSlider.get()
      );
    }
    var min_sum = 30000;
    var max_sum = 10000000;
    var rate = parseFloat($('#calc_rate_range').val() / 100);
    var min_rate = $('#calc_rate_range').attr('min') / 100;
    var max_rate = $('#calc_rate_range').attr('max') / 100;
    var stv = getStv(!0);
    var mths = parseInt(
      document.getElementById('calc_month_range').noUiSlider.get()
    );
    var kef = rate + rate / (Math.pow(1 + rate, mths) - 1);
    window.min_payment = Math.round(
      min_sum * (rate + rate / (Math.pow(1 + rate, mths) - 1))
    );
    window.max_payment = Math.round(
      max_sum * (rate + rate / (Math.pow(1 + rate, mths) - 1))
    );
    var sum = (payment / kef).toFixed(2);
    var payments_sum = payment * mths;
    var overpayment = payments_sum - sum;
    document.getElementById('calc_sum_range').noUiSlider.set(sum);
    if (flag) {
      document.getElementById('calc_pay_range2').noUiSlider.set(payment);
    }
    $('#calc_sum').val(addSpaces(Math.round(sum)) + ' ₽');
    $('#calc_payments_sum').html(addSpaces(Math.round(payments_sum)) + ' ₽');
    $('#calc_overpayment').html(addSpaces(Math.round(overpayment)) + ' ₽');
    $('#sumcr').val(addSpaces(sum) + ' ₽');
    $('[name=sum-f]').val(addSpaces(sum) + ' ₽');
    document.getElementById('calc_pay_range2').noUiSlider.updateOptions({
      range: {
        min: window.min_payment,
        max: window.max_payment,
      },
    });
  }
  $('#calc_term').val(mths + ' ' + plural(mths, 'месяц', 'месяца', 'месяцев'));
}

function getTotal() {
  var stv = $('#calc_rate_range').val();
  var mths = parseFloat($('.calc_term_range_custom').val());
  var procent = summa * ((mths * stv) / 100);
  var total = parseFloat(procent) + parseInt(summa);
  var every = total / mths;
  procent = Math.ceil(procent * 100) / 100;
  total = Math.ceil(total * 100) / 100;
  every = Math.ceil(every * 100) / 100;
  $('[name=procent]').inputmask({
    mask: getMask(procent),
    greedy: !1,
    placeholder: '',
    numericInput: !0,
  });
  $('[name=sum]').inputmask({
    mask: getMask(total),
    greedy: !1,
    placeholder: '',
    numericInput: !0,
  });
  $('[name=payment]').inputmask({
    mask: getMask(every),
    greedy: !1,
    placeholder: '',
    numericInput: !0,
  });
  $('[name=sumcr],[name=sum-f]').inputmask({
    mask: getMask(total),
    greedy: !1,
    placeholder: '',
    numericInput: !0,
  });
  $('[name=payment]').val(every + ' ₽');
  $('[name=procent]').val(procent + ' ₽');
  $('[name=sum]').val(total + ' ₽');
  $('[name=sumcr],[name=sum-f]').val(total + ' ₽');
}

function getStv(flag) {
  var res, stv, stv2;
  var summa = parseFloat(
    document.getElementById('calc_sum_range').noUiSlider.get()
  );
  var mths = parseFloat(
    document.getElementById('calc_month_range').noUiSlider.get()
  );
  if (flag) {
    if (mths < 13) {
      stv = 3.3;
    } else if (mths >= 13 && mths < 24) {
      stv = 2.5;
    } else if (mths >= 24) {
      stv = 2;
    }
  }
  if (summa < 100000) {
    stv2 = 3.3;
  } else if (summa >= 100000 && summa < 500000) {
    stv2 = 3;
  } else if (summa >= 500000 && summa < 1000000) {
    stv2 = 2.5;
  } else if (summa >= 1000000) {
    stv2 = 2;
  }
  if (stv > stv2) {
    res = stv2;
  } else {
    res = stv;
  }
  $('#calc_rate_range').val(res);
  $('.form-stv').html(res + ' %');
  return res;
}

function showShedule() {
  var sum = parseFloat(
    document.getElementById('calc_sum_range').noUiSlider.get()
  );
  var term = parseInt($('.calc_term_custom').val());
  var base_rate = $('#calc_rate_range').val();
  var rate = parseFloat(base_rate / 100);
  var payment_type = 1;
  var kef = rate + rate / (Math.pow(1 + rate, term) - 1);
  var payment = sum * kef;
  var title = 'Р вЂњРЎР‚Р В°РЎвЂћР С‘Р С” Р С—Р В»Р В°РЎвЂљР ВµР В¶Р ВµР в„–';
  var table =
    '<div class="col-sm-12"><div class="section-header text-left"><h2><span class="fa fa-th-list"></span> ' +
    title +
    '</h2><h4>';
  table +=
    '<p class="mt20"><span class="gr"> CРЎС“Р СР СР В°: </span> <strong>' +
    addSpaces(sum) +
    ' ₽</strong>.</p> ';
  table +=
    '<p class="mt20"><span class="gr"> Р РЋРЎР‚Р С•Р С”: </span><strong>' +
    term +
    ' РњРµСЃСЏС†Р ВµР Р†</strong>.</p> ';
  table +=
    '<p class="mt20><span class="gr"> Р РЋРЎвЂљР В°Р Р†Р С”Р В°: </span><strong>' +
    base_rate +
    '% Р Р† РњРµСЃСЏС†</strong>.</p></h4>';
  if (payment_type <= 2) {
    table +=
      '</div></div><div class="col-sm-12"><table class="calc-shedule"><tr class="calc-shedule-header"><th>РІвЂћвЂ“</th><th>Р СџР В»Р В°РЎвЂљР ВµР В¶, ₽</th><th>Р СџР В»Р В°РЎвЂљР ВµР В¶ Р С—Р С• Р С—РЎР‚Р С•РЎвЂ Р ВµР Р…РЎвЂљР В°Р С, ₽</th><th>Р СџР В»Р В°РЎвЂљР ВµР В¶ Р С—Р С• Р С•РЎРѓР Р…Р С•Р Р†Р Р…Р С•Р СРЎС“ Р Т‘Р С•Р В»Р С–РЎС“, ₽</th><th>Р С›РЎРѓРЎвЂљР В°РЎвЂљР С•Р С” Р С•РЎРѓР Р…Р С•Р Р†Р Р…Р С•Р С–Р С• Р Т‘Р С•Р В»Р С–Р В°, ₽</th></tr>';
    var balance = sum;
    var rate_pay = 0;
    var loan_pay = 0;
    var payments_sum = 0;
    var rates_sum = 0;
    var pay = payment;
    var max_rate_pay = sum * rate;
    for (var i = 1; i <= term; i++) {
      rate_pay = balance * rate;
      loan_pay = pay - rate_pay;
      if (balance - loan_pay < 0) {
        loan_pay = balance - 0;
        pay = loan_pay + (rate_pay - 0);
      }
      balance = balance - loan_pay;
      if (i == term) {
        pay = pay * 1 + balance * 1;
        loan_pay = loan_pay * 1 + balance * 1;
        var max_loan_pay = loan_pay;
      }
    }
    balance = sum;
    for (var i = 1; i <= term; i++) {
      rate_pay = balance * rate;
      loan_pay = payment - rate_pay;
      if (balance - loan_pay < 0) {
        loan_pay = balance - 0;
        payment = loan_pay + (rate_pay - 0);
      }
      balance = balance - loan_pay;
      if (i == term) {
        payment = payment * 1 + balance * 1;
        loan_pay = loan_pay * 1 + balance * 1;
        balance = 0;
      }
      payments_sum += payment * 1;
      rates_sum += rate_pay * 1;
      table += '<tr><td>' + i + '.</td>';
      table += '<td>' + addSpaces(payment.toFixed(2)) + '</td>';
      table +=
        '<td><div style="background:#b0ebf3;width:' +
        ((rate_pay * 100) / Math.max(max_loan_pay, max_rate_pay)).toFixed(2) +
        '%;height:25px;float:right;"></div><div style="padding-left:3px;">' +
        addSpaces(rate_pay.toFixed(2)) +
        '</div></td>';
      table +=
        '<td><div style="background:#90ee90;width:' +
        ((loan_pay * 100) / Math.max(max_loan_pay, max_rate_pay)).toFixed(2) +
        '%;height:25px;float:left;margin-right:-100%;"></div><div style="padding-left:3px;">' +
        addSpaces(loan_pay.toFixed(2)) +
        '</div></td>';
      table +=
        '<td><div style="background:#ffc0cb;width:' +
        ((balance * 100) / sum).toFixed(2) +
        '%;height:25px;float:left;margin-right:-100%;"></div><div style="padding-left:3px;">' +
        addSpaces(balance.toFixed(2)) +
        '</div></td></tr>';
    }
    table += '<tr class="calc-shedule-results"><td>Р ВРЎвЂљР С•Р С–Р С•:</td>';
    table += '<td>' + addSpaces(payments_sum.toFixed(2)) + '</td>';
    table += '<td>' + addSpaces(rates_sum.toFixed(2)) + '</td>';
    table += '<td>' + addSpaces(sum.toFixed(2)) + '</td>';
    table += '<td></td></tr>';
    table += '</table></div>';
  } else {
    table +=
      '</div></div><div class="col-sm-12"><table class="calc-shedule"><tr class="calc-shedule-header"><th>РІвЂћвЂ“</th><th>Р СњР В°РЎвЂЎР С‘РЎРѓР В»Р ВµР Р…Р С• Р С—РЎР‚Р С•РЎвЂ Р ВµР Р…РЎвЂљР С•Р Р†, ₽</th><th>Р вЂ™РЎвЂ№Р С—Р В»Р В°РЎвЂљР В°, ₽</th><th>Р СњР В°РЎР‚Р В°РЎРѓРЎвЂљР В°РЎР‹РЎвЂ°Р С‘Р в„– Р Т‘Р С•РЎвЂ¦Р С•Р Т‘, ₽</th><th>Р РЋРЎС“Р СР СР В° Р Р†Р С”Р В»Р В°Р Т‘Р В°, ₽</th></tr>';
    var balance = sum;
    var profit = 0;
    var interest = 0;
    var payment = 0;
    var interests_sum = 0;
    var payments_sum = 0;
    if (payment_type == '5') {
      var balance_result = sum * Math.pow(1 + rate, term);
      var profit_result = balance_result - sum;
    } else {
      var profit_result = sum * rate * term;
      var balance_result = sum + profit_result;
    }
    for (var i = 1; i <= term; i++) {
      if (payment_type == '3') {
        interest = balance * rate;
        payment = interest;
        profit = profit + interest;
        balance = balance + interest - payment;
        if (i == term) {
          payment = payment + balance;
        }
      } else if (payment_type == '4') {
        if (i == term) {
          interest = balance * rate * term;
          payment = interest + balance;
          profit = interest;
        }
      } else if (payment_type == '5') {
        interest = balance * rate;
        profit = profit + interest;
        balance = balance + interest - payment;
        if (i == term) {
          payment = payment + balance;
        }
      }
      interests_sum = interests_sum + interest;
      payments_sum = payments_sum + payment;
      table += '<tr><td>' + i + '.</td>';
      table += '<td>' + addSpaces(interest.toFixed(2)) + '</td>';
      table += '<td>' + addSpaces(payment.toFixed(2)) + '</td>';
      table +=
        '<td><div style="background:#90ee90;width:' +
        ((profit * 100) / profit_result).toFixed(2) +
        '%;height:25px;float:left;margin-right:-100%;"></div><div style="padding-left:3px;">' +
        addSpaces(profit.toFixed(2)) +
        '</div></td>';
      table +=
        '<td><div style="background:#ffc0cb;width:' +
        ((balance * 100) / balance_result).toFixed(2) +
        '%;height:25px;float:left;margin-right:-100%;"></div><div style="padding-left:3px;">' +
        addSpaces(balance.toFixed(2)) +
        '</div></td></tr>';
    }
    table += '<tr class="calc-shedule-results"><td>Р ВРЎвЂљР С•Р С–Р С•:</td>';
    table += '<td>' + addSpaces(interests_sum.toFixed(2)) + '</td>';
    table += '<td>' + addSpaces(payments_sum.toFixed(2)) + '</td>';
    table += '<td>' + addSpaces(profit.toFixed(2)) + '</td>';
    table += '<td>' + addSpaces(balance.toFixed(2)) + '</td>';
    table += '</tr>';
    table += '</table></div>';
  }
  showModal(table);
}

function showTermCompare() {
  var sum = parseFloat(
    document.getElementById('calc_sum_range').noUiSlider.get()
  );
  var base_rate = $('#calc_rate_range').val();
  var rate = parseFloat(base_rate / (12 * 100));
  var payment_type = $('#calc_payment_type').val();
  var table =
    '<div class="col-sm-12"><div class="section-header text-left"><h2><span class="fa fa-pie-chart"></span> Р РЋРЎР‚Р В°Р Р†Р Р…Р ВµР Р…Р С‘Р Вµ Р С—Р В»Р В°РЎвЂљР ВµР В¶Р ВµР в„– Р Т‘Р В»РЎРЏ РЎР‚Р В°Р В·Р Р…РЎвЂ№РЎвЂ¦ РЎРѓРЎР‚Р С•Р С”Р С•Р Р†</h2><h4>';
  table += 'Р РЋРЎС“Р СР СР В°: <strong>' + addSpaces(sum) + ' ₽</strong>. ';
  table +=
    'Р РЋРЎвЂљР В°Р Р†Р С”Р В°: <strong>' +
    base_rate +
    '% Р С–Р С•Р Т‘Р С•Р Р†РЎвЂ№РЎвЂ¦</strong>.';
  table +=
    '</h4><p><a href="#" onclick="showShedule(); return false;"><span class="fa fa-th-list"></span> Р вЂњРЎР‚Р В°РЎвЂћР С‘Р С” Р С—Р В»Р В°РЎвЂљР ВµР В¶Р ВµР в„–...</a></p></div></div>';
  table +=
    '<div class="col-sm-12"><table class="calc-shedule"><tr class="calc-shedule-header"><th>РІвЂћвЂ“</th><th>Р РЋРЎР‚Р С•Р С”, РњРµСЃСЏС†Р ВµР Р†</th><th>Р вЂўР В¶Р ВµР СР ВµРЎРѓРЎРЏРЎвЂЎР Р…РЎвЂ№Р в„– Р С—Р В»Р В°РЎвЂљР ВµР В¶, ₽</th><th>Р РЋРЎС“Р СР СР В° Р С” Р Р†РЎвЂ№Р С—Р В»Р В°РЎвЂљР Вµ, ₽</th><th>Р СџР ВµРЎР‚Р ВµР С—Р В»Р В°РЎвЂљР В° Р С—РЎР‚Р С•РЎвЂ Р ВµР Р…РЎвЂљР С•Р Р†, ₽</th></tr>';
  var kef = 0;
  var payment = 0;
  var payments_sum = 0;
  var overpayment = 0;
  var years = Math.floor($('.calc_term_range_custom').attr('max') / 12);
  if (payment_type == '1') {
    var max_payment = (
      sum *
      (rate + rate / (Math.pow(1 + rate, 12) - 1))
    ).toFixed(2);
    var max_overpayment =
      (sum * (rate + rate / (Math.pow(1 + rate, 12 * years) - 1))).toFixed(2) *
        12 *
        years -
      sum;
  } else if (payment_type == '2') {
    max_payment = (sum * rate).toFixed(2);
    max_overpayment = max_payment * 12 * years;
  }
  for (var i = 1; i <= years; i++) {
    term = i * 12;
    if (payment_type == '1') {
      kef = rate + rate / (Math.pow(1 + rate, term) - 1);
      payment = (sum * kef).toFixed(2);
      payments_sum = payment * term;
      overpayment = payments_sum - sum;
    } else if (payment_type == '2') {
      payment = (sum * rate).toFixed(2);
      overpayment = payment * term;
      payments_sum = overpayment + sum;
    }
    table += '<tr><td>' + i + '.</td>';
    table +=
      '<td>' +
      term +
      (term < 100 ? '&nbsp;&nbsp;' : '&nbsp;') +
      ' <a href="#" onclick="$(\'.calc_term_range_custom\').val(' +
      term +
      ').change();showShedule();return false;">Р С–РЎР‚Р В°РЎвЂћР С‘Р С” <span class="fa fa-carret-right"></span></a></td>';
    table +=
      '<td><div style="background:#ffc0cb;width:' +
      ((payment * 100) / max_payment).toFixed(2) +
      '%;height:25px;float:left;margin-right:-100%;"></div><div style="padding-left:3px;">' +
      addSpaces(payment) +
      '</div></td>';
    table += '<td>' + addSpaces(payments_sum.toFixed(2)) + '</td>';
    table +=
      '<td><div style="background:#b0ebf3;width:' +
      ((overpayment * 100) / max_overpayment).toFixed(2) +
      '%;height:25px;float:left;margin-right:-100%;"></div><div style="padding-left:3px;">' +
      addSpaces(overpayment.toFixed(2)) +
      '</div></td></tr>';
  }
  table += '</table></div>';
  showModal(table);
}
$(document).ready(function () {
  var rangeSumm = document.getElementById('calc_sum_range');
  var rangeMonth = document.getElementById('calc_month_range');
  var rangePay = document.getElementById('calc_pay_range2');
  if (isIE()) {
    var rangeMethod1 = 'change';
  } else {
    var rangeMethod1 = 'input change';
    var rangeMethod2 = 'input change';
  }

  $('#calc_payment_pay').change(function () {
    var it = $(this);
    var val = it.val().replace(/[^\d]/g, '');
    rangePay.noUiSlider.set(val);
    calcResult(!0);
  });

  $('.calc_sum_res').on('change', function () {
    var it = $(this);
    var val = it.val().replace(/[^\d]/g, '');
    rangeSumm.noUiSlider.set(val);
    calcResult();
  });
  $('.calc_term_custom').on('change', function () {
    var it = $(this);
    var val = it.val().replace(/[^\d]/g, '');
    $('.calc_term_range_custom').val(val);
    rangeMonth.noUiSlider.set(val);
    calcResult();
  });
  $('#calc_rate').on('change', function () {
    var it = $(this);
    var val = it
      .val()
      .replace(/[^\d\.\,]/g, '')
      .replace(/\,/g, '.');
    $('#calc_rate_range').val(val);
    calcResult();
  });
  $('.file-text-graf').click(function (event) {
    event.preventDefault();
    showShedule();
  });

  $('#sumcr,.form-sum').on(' change', function () {
    var val = $(this).val();
    var summa = val.replace(/[^-0-9]/gim, '');
    val = addSpaces(val.replace(/[^-0-9]/gim, '') + ' ₽');
    var stv2 = 0;
    if (summa < 100000) {
      stv2 = 3.3;
    } else if (summa >= 100000 && summa < 500000) {
      stv2 = 3;
    } else if (summa >= 500000 && summa < 1000000) {
      stv2 = 2.5;
    } else if (summa >= 1000000) {
      stv2 = 2;
    }
    $('#calc_rate_range').val(stv2);
    $('.form-stv ').html(stv2);
  });
});

function showCallbackForm() {
  var title =
    'Р С›РЎРѓРЎвЂљР В°Р Р†РЎРЉРЎвЂљР Вµ Р Р…Р С•Р СР ВµРЎР‚, Р С‘ Р СРЎвЂ№ Р вЂ™Р В°Р С Р С—Р ВµРЎР‚Р ВµР В·Р Р†Р С•Р Р…Р С‘Р С!';
  var form = '<div class="col-sm-12"><div class="section-header text-center">';
  form += '<h2>' + title + '</h2>';
  form += '</div></div>';
  form +=
    '<div class="col-sm-12"><form method="post" class="form callback-form"><div class="col-md-6 col-sm-6"> <input name="telephone" class="form-telephone" type="tel" placeholder="Р СћР ВµР В»Р ВµРЎвЂћР С•Р Р…" required=""></div><div class="col-md-6 col-sm-6"> <button type="submit" class="form-button"><span class="fa fa-phone"></span> <span class="form-button-text">Р СџР С•Р В·Р Р†Р С•Р Р…Р С‘РЎвЂљР Вµ Р СР Р…Р Вµ!</span></button></div><p class="form-notification" style="display:none;line-height:normal;padding:10px 10px;font-size:2.4rem;"> Р вЂќР ВµР В»Р С• РЎРѓР Т‘Р ВµР В»Р В°Р Р…Р С•! Р вЂ”Р В°Р Р†Р В°РЎР‚Р С‘РЎвЂљР Вµ РЎРѓР ВµР В±Р Вµ РЎвЂЎР В°РЎв‚¬Р ВµРЎвЂЎР С”РЎС“ РЎвЂЎР В°РЎРЏ, Р С—Р С•Р С”Р В° Р СР ВµР Р…Р ВµР Т‘Р В¶Р ВµРЎР‚ Р Р…Р В°Р В±Р С‘РЎР‚Р В°Р ВµРЎвЂљ Р Р†Р В°РЎв‚¬ Р Р…Р С•Р СР ВµРЎР‚ РЎвЂљР ВµР В»Р ВµРЎвЂћР С•Р Р…Р В°... :)</p></form></div>';
  showModal(form, 700);
  $('.callback-form').submit(function (e) {
    var form = $(this);
    e.preventDefault();
    var telephone = $('.form-telephone', form).val();
    telephone = telephone ? telephone : '';
    var formValid = !0;
    if (isValidPhone(telephone)) {
      $('input.form-telephone', form).removeClass('not-valid');
    } else {
      formValid = !1;
      $('input.form-telephone', form).addClass('not-valid');
    }
    if (formValid) {
      var data = {};
      data.phone = telephone;
      data.city = mainCity ? mainCity : '';
      data.url = document.location.href;
      data.referrer = $.cookie('first_referrer');
      data.utm_source = $.cookie('utm_source');
      data.utm_medium = $.cookie('utm_medium');
      data.utm_campaign = $.cookie('utm_campaign');
      data.utm_content = $.cookie('utm_content');
      data.utm_term = $.cookie('utm_term');
      $.ajax({
        type: 'POST',
        url: 'https://app.creditors24.com/front/site/callback',
        data: data,
        beforeSend: function () {
          var button = $('button.form-button', form);
          $('.fa.fa-phone', button)
            .addClass('fa-spinner fa-spin')
            .removeClass('fa-phone');
          $('.form-button-text', button).html(
            'Р С›РЎвЂљР С—РЎР‚Р В°Р Р†Р С”Р В°...'
          );
          button.prop('disabled', !0);
        },
        success: function () {
          trackGoal('CBK_CALL');
          $('.form-notification', form).fadeIn(500);
          var button = $('button.form-button', form);
          $('.fa.fa-spinner', button)
            .addClass('fa-check')
            .removeClass('fa-spinner fa-spin');
          $('.form-button-text', button).html(
            'Р С›РЎвЂљР С—РЎР‚Р В°Р Р†Р В»Р ВµР Р…Р С•!'
          );
        },
        error: function () {
          var button = $('button.form-button', form);
          $('.fa.fa-spinner', button)
            .addClass('fa-phone')
            .removeClass('fa-spinner fa-spin');
          $('.form-button-text', button).html(
            'Р СџР С•Р В·Р Р†Р С•Р Р…Р С‘РЎвЂљР Вµ Р СР Р…Р Вµ!'
          );
          button.prop('disabled', !1);
          alert(
            'Р СџРЎР‚Р С‘ Р С•РЎвЂљР С—РЎР‚Р В°Р Р†Р С”Р Вµ Р Р†Р С•Р В·Р Р…Р С‘Р С”Р В»Р В° Р С•РЎв‚¬Р С‘Р В±Р С”Р В°. Р СџР С•Р С—РЎР‚Р С•Р В±РЎС“Р в„–РЎвЂљР Вµ Р ВµРЎвЂ°Р Вµ РЎР‚Р В°Р В·.'
          );
        },
      });
    }
    return !1;
  });
}

function initCallbackButton() {
  $(document.body).append(
    '<a href="#" id="callback__toggle"><div class="circlephone" style="transform-origin: center;"></div><div class="circle-fill" style="transform-origin: center;"></div><div class="img-circle" style="transform-origin: center;"><div class="img-circleblock" style="transform-origin: center;"></div></div></a>'
  );
  $('#callback__toggle, .callback-btn, .callback-link').click(function (event) {
    event.preventDefault();
    showCallbackForm();
  });
}
