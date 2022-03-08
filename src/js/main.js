import Swiper from 'swiper/bundle'; // swiperの全機能読み込み
import smoothscroll from 'smoothscroll-polyfill'; // smoothscrollをIE、safariでサポートする
smoothscroll.polyfill();

document.addEventListener('DOMContentLoaded', function() {

  // ハンバーガーメニュー
  const hamburgerBtn = document.querySelector('.js-hamburger-btn');
  const drawer = document.querySelector('.js-drawer');

  hamburgerBtn.addEventListener('click', function(){
    hamburgerBtn.classList.toggle('is-open');
    drawer.classList.toggle('is-slide');
  });
  // ハンバーガーメニュー


  // Swiper mv メインビジュアル
  const mvOptions = {
    direction: 'horizontal',
    speed: 2000,
    // autoHeight: false,
    effect: 'fade',
    spaceBetween: 0,
    slidesPerView: 1,
    slidesPerGroup: 1, // 一度にスライドさせる枚数
    // slidesToClickSlide: false, // true...任意のスライドをクリックするとそのスライドへ移行
    centeredSlides: true,
    loop: true,
    // loopedSlides: null, // slidesPerViewにautoを設定した場合、このパラメータで（前後に）複製するスライドの数を指定。
    // breakpoints: {},
    breakpointsBase: 'window', // デフォルトはwindow。'container'を指定すると Swiper コンテナーの幅により切り替わる。
    // on: {}, // イベントの登録
    // cssMode: false, // true...CSS Scroll SnapAPI が使用され、単純な構成では優れたパフォーマンスをもたらす可能性がある。

    autoplay: {
      delay: 4000, // スライド間の時間
      disableOnInteraction: false, // 操作があれば停止。
    },
    // pagination: {
    //   el: '.swiper-pagination',
    //   type: 'bullets',
    //   clickable: true,
    // }
  };
  const mvSwiper = new Swiper('.js-swiper-mv', mvOptions); // eslint-disable-line
  // Swiper メインビジュアル
  

  // Swiper works トップ制作実績
  const worksOptions = {
    direction: 'horizontal',
    speed: 2000,
    // autoHeight: false,
    effect: 'fade',
    spaceBetween: 0,
    slidesPerView: 1,
    slidesPerGroup: 1, // 一度にスライドさせる枚数
    // slidesToClickSlide: false, // true...任意のスライドをクリックするとそのスライドへ移行
    centeredSlides: true,
    loop: true,
    // loopedSlides: null, // slidesPerViewにautoを設定した場合、このパラメータで（前後に）複製するスライドの数を指定。
    // breakpoints: {},
    breakpointsBase: 'window', // デフォルトはwindow。'container'を指定すると Swiper コンテナーの幅により切り替わる。
    // on: {}, // イベントの登録
    // cssMode: false, // true...CSS Scroll SnapAPI が使用され、単純な構成では優れたパフォーマンスをもたらす可能性がある。
    autoplay: {
      delay: 4000,
      disableOnInteraction: false, // true...操作あれば停止
    },
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true,
    }
  };

  const topWorksSlides = document.querySelectorAll('.js-swiper-works .swiper-slide');
  if(topWorksSlides.length > 1){ // ２枚上で初期化
    const worksSwiper = new Swiper('.js-swiper-works', worksOptions); // eslint-disable-line
  }
  // Swiper works トップ制作実績


  // Swiper works 制作実績詳細
  // メインスライダー
  const mainSlides = document.querySelectorAll('.js-swiper-works-single .swiper-slide');
  const worksSingleOptions = {
    direction: 'horizontal',
    speed: 300,
    effect: 'fade',
    spaceBetween: 0,
    // slidesPerView: 'auto',
    slidesPerGroup: 1,
    centeredSlides: true,
    loop: true,
    loopedSlides: mainSlides.length, //スライドの枚数と同じ値を指定
    slideToClickedSlide: true,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    autoplay: {
      delay: 4000, // スライド間の時間
      disableOnInteraction: false, // 操作があれば停止。
    },
    
  };
  
  const mainSlider = new Swiper ('.js-swiper-works-single', worksSingleOptions); // eslint-disable-line

  // サムネイル
  const thumbnailSlides = document.querySelectorAll('.p-works-single-thumbnail .swiper-slide');
  const thumbnailOptions = {
    direction: 'horizontal',
    speed: 300,
    effect: 'slide',
    spaceBetween: 24,
    slidesPerView: 2.2,
    slidesPerGroup: 1,
    centeredSlides: true,
    loop: true,
    loopedSlides: thumbnailSlides.length, // サムネイルと同じ枚数を指定
    slideToClickedSlide: true,
    autoplay: {
      delay: 4000, // スライド間の時間
      disableInteraction: false, // 操作があれば停止。
    },
    breakpoints:{
      768:{
        spaceBetween: 8,
        slidesPerView: thumbnailSlides.length,
        centeredSlides: false,
      }
    },
  }
  const thumbnail = new Swiper ('.js-swiper-thumbnail', thumbnailOptions); // eslint-disable-line

  //4系～
  mainSlider.controller.control = thumbnail;
  thumbnail.controller.control = mainSlider;
  // Swiper works 制作実績詳細
  

  // トップに戻るボタン、ヘッダー背景色変化
  const pageTopBtn = document.querySelector('.js-page-top');

  window.addEventListener('scroll', function(){
    const currentY = window.pageYOffset;
    const header = document.querySelector('.js-header');

    // トップページ
    if(document.querySelector('.js-mv-top')){
      const mvHeight = document.querySelector('.js-mv-top').clientHeight;

      if(currentY > mvHeight){
        header.classList.add('is-deep');
        pageTopBtn.classList.add('is-show');
      }else{
        header.classList.remove('is-deep');
        pageTopBtn.classList.remove('is-show');
      }
    }
    
    // 下層ページ(メインビジュアル部分)
    if(document.querySelector('.js-mv-sub')){
      const mvSubHeight = document.querySelector('.js-mv-sub').clientHeight;

      if(currentY > mvSubHeight){
        header.classList.add('is-deep');
        pageTopBtn.classList.add('is-show');
      }else{
        header.classList.remove('is-deep');
        pageTopBtn.classList.remove('is-show');
      }
    }

    // 下層ページ(メインビジュアル部分がないページ。single.php、サンクスページ、４０４ページ)
    if(document.querySelector('.js-mv-non')){
      const mvNonHeight = document.querySelector('.js-mv-non').clientHeight;
      if(currentY > mvNonHeight){
        header.classList.add('is-deep');
        pageTopBtn.classList.add('is-show');
      }else{
        header.classList.remove('is-deep');
        pageTopBtn.classList.remove('is-show');
      }
    }

  });

  // トップに戻るボタン
  pageTopBtn.addEventListener('click', function(){
    window.scrollTo({
      top: 0,
      behavior: 'smooth',
    });
  });
  // トップに戻るボタン ヘッダー背景色変化


  // フォームselectタグの色を変更。
  // 初期値以外が選択された時、is-selectを付与する。
  const selectTag = document.querySelector('.js-select');
  // selectタグのjs-selectクラスが取得されたら発火。
  if(selectTag){
    selectTag.addEventListener('change', () => {
      if(selectTag.value !== ""){
        selectTag.classList.add('is-color');
      }else{
        selectTag.classList.remove('is-color');
      }
    });
  }
  
  

});
