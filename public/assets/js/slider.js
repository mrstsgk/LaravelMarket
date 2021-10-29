//オプションの定義（初期化の式より先に記述）
let options = {
  loop: true,
  speed: 3000,
  autoplay: {
    delay : 7000,
    stopOnLastSlide: 'false',
    disableOnlnteraction: false,
  },
  clickable: true,
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
    hideOnClick: true,
  },
};
 
//上記オプションを使って初期化
let mySwiper = new Swiper ('.swiper', options);