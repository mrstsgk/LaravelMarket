"use strict";

// 並び替え機能
function changeSort() {
    let selectedSortValue = document.getElementById("sort_select").value;
    document.sort_form.action = selectedSortValue;
    document.sort_form.submit();
}

// スクロール表示
$(function () {
    $(window).on("scroll", function () {
        $(".item").each(function () {
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
let nameList = new Array();

function autocompleteFunc() {
    // 初期読み込み時に商品名を保存
    if (!sessionStorage.getItem("visitFlg")) {
        sessionStorage.setItem("visitFlg", "visited");

        let itemNameOptions = document.getElementById("item-name").options;

        for (let i = 0; i < itemNameOptions.length; i++) {
            nameList.push(itemNameOptions[i].value);
        }
        let nameString = nameList.toString();
        sessionStorage.setItem("autocompleteData", nameString);
    }else if (document.getElementById("jsAutocompleteData")) {
        let autocompleteDataArray = sessionStorage.getItem("autocompleteData").split(',');
        autocompleteDataArray.forEach(function (data) {
            let options = document.createElement("option");
            options.value = data;
            document.getElementById("jsAutocompleteData").appendChild(options);
        });
    }
};
