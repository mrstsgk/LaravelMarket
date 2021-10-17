// 'use strict';

function changeSort() {
    let selectedSortValue = document.getElementById('sort_select').value;
    document.sort_form.action = selectedSortValue;
    document.sort_form.submit();
}