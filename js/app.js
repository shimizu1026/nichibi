(function ($) {
  if ($(".home-slide").length) {
    $(".home-slide").slick({
      autoplay: true,//追加
      fade: true,    // fedeオン
      speed: 1500,   // 画像切り替えにかかる時間（ミリ秒）
      autoplaySpeed: 0,   // 自動スライド切り替え速度
      arrows: false,
      dots: false,
      slidesToShow: 1,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 768,
          settings: {
            dots: false,
          }
        }]
    });
  }
})(jQuery);

(function ($) {
  if ($(".land-detail-slide").length) {
    $(".land-detail-slide").slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: true,
      dots: false,
      asNavFor: '.land-detail-slide-nav'
    });
  }
  if ($(".land-detail-slide-nav").length) {
    $(".land-detail-slide-nav").slick({
      slidesToShow: 5,
      slidesToScroll: 1,
      asNavFor: '.land-detail-slide',
      arrows: false,
      focusOnSelect: true,
      responsive: [ //レスポンシブの設定
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 500,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        },

      ]
    });
  }
})(jQuery);

$(document).click(function () { $('#menu > li > ul').slideUp() });
$('#menu > li').click(function (ev) {
  var sub = $(this).children('ul');
  if ($(sub).is(':hidden')) {
    ev.stopPropagation();
    $('#menu > li > ul:visible').slideUp();
    $(sub).slideDown();
  }
});

$(function () {
  $('a[href^=#]').click(function () {
    var speed = 500;
    var href = $(this).attr("href");
    var target = $(href == "#" || href == "" ? 'html' : href);
    var position = target.offset().top;
    $("html, body").animate({ scrollTop: position }, speed, "swing");
    return false;
  });
});

