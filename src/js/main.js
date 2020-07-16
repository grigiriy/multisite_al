// jQuery(document).ready(function ($) {
//   // ТАБЛИЦА
//   // $('table').stacktable();
//   // Sticky side navigation
//   let width = $(window).width();
//   if (width >= 768) {
//     $('#sticky-nav').stick_in_parent({ offset_top: 80 });
//     $('#sticky-nav-2').stick_in_parent({ offset_top: 80 });
//   }

//   $(window).resize(function () {
//     var changedWidth = $(window).width();
//     if (changedWidth < 768) {
//       $('#sticky-nav').trigger('sticky_kit:detach');
//       $('#sticky-nav-2').trigger('sticky_kit:detach');
//     } else {
//       $('#sticky-nav').stick_in_parent({ offset_top: 80 });
//       $('#sticky-nav-2').stick_in_parent({ offset_top: 80 });
//     }
//   });

//   // Sticky .logo-wrap

//   $(window).scroll(function () {
//     $('.header-wrapper').toggleClass('is-sticky', $(this).scrollTop() > 0);
//   });

//   printDeadline('sale-last-day', calculateDeadline());
//   // if($('#clockdiv').length) { initializeClock('clockdiv', calculateDeadline()); }
//   if ($('#clockdiv-page').length) {
//     initializeClock('clockdiv-page', calculateDeadline());
//   }
// });
