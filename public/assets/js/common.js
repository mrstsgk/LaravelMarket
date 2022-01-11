'use strict';

// 並び替え機能
function changeSort() {
    let selectedSortValue = document.getElementById('sort_select').value;
    document.sort_form.action = selectedSortValue;
    document.sort_form.submit();
};

// スクロール表示
$(function() {
  $(window).on('scroll', function() {
    $(".item").each(function() {
      var scroll = $(window).scrollTop();
      var blockPosition = $(this).offset().top;
      var windowHeihgt = $(window).height();
      if (scroll > blockPosition - windowHeihgt + 300) {
        $(this).addClass("blockIn");
      }
    });
  });
});

// オートコンプリート



