'use strict';

function changeSort() {
    let selectedSortValue = document.getElementById('sort_select').value;
    document.sort_form.action = selectedSortValue;
    document.sort_form.submit();
}

$(window).scrollTop(function () {
    var now = $(window).scrollTop();
    if (now > 200) {
        $('.pagetop').fadeIn("slow");
    } else {
        $('.pagetop').fadeOut('slow');
    }
});