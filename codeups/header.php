<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- favicon -->
  
  <!-- Google Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&family=Noto+Serif+JP:wght@400;700&display=swap" rel="stylesheet">

  <?php wp_head(); ?>
</head>
<body>
  <!--  -->
  <!-- ソースコードをご覧いただきありがとうございます(^^) -->
  <!-- 保守しやすいようにCSS設計を意識してコーディングいたしました。 -->
  <!-- 今後ともよろしくお願いいたします! -->
  <!--  -->

  <!-- 各ページのurl -->
  <?php
    $top = esc_url(home_url('/'));

    $news = esc_url(home_url('news'));
    $content = esc_url(home_url('content'));
    $works = esc_url(home_url('works'));
    $overview = esc_url(home_url('overview'));
    $blog = esc_url(home_url('blog'));
    $contact = esc_url(home_url('contact'));
  ?>

<!-- l-global-container -->
<!-- 最低限の高さを確保する...特にthanksページ、404ページ -->
<div class="l-global-container">

  <!-- l-page-top トップに戻るボタン -->
  <div class="l-page-top p-page-top js-page-top">
    <button class="p-page-top__arrow"></button>
  </div>
  <!-- l-page-top トップに戻るボタン -->

  <!-- l-header -->
  <header class="l-header p-header js-header">
    <div class="p-header__inner">
      
      <?php if(is_front_page()): ?>
        <h1 class="p-header__logo">
          <span>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/codeups-logo.svg" alt="codeupsロゴ画像">
          </span>
        </h1>
      <?php else: ?>
        <div class="p-header__logo">
          <a href="<?php echo $top; ?>">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/codeups-logo.svg" alt="codeupsロゴ画像">
          </a>
        </div>
      <?php endif; ?>

      <!-- p-global-nav -->
      <nav class="p-header__global-nav p-global-nav">
        <ul class="p-global-nav__items">
          <li class="p-global-nav__item">
            <a href="<?php echo $news; ?>">お知らせ</a>
          </li>
          <li class="p-global-nav__item">
            <a href="<?php echo $content; ?>">事業内容</a>
          </li>
          <li class="p-global-nav__item">
            <a href="<?php echo $works; ?>">制作実績</a>
          </li>
          <li class="p-global-nav__item">
            <a href="<?php echo $overview; ?>">企業概要</a>
          </li>
          <li class="p-global-nav__item">
            <a href="<?php echo $blog; ?>">ブログ</a>
          </li>
          <li class="p-global-nav__item">
            <a href="<?php echo $contact; ?>">お問い合わせ</a>
          </li>
        </ul>
      </nav><!-- p-global-nav -->

      <!-- c-hamburger-btn -->
      <button class="p-header__hamburger-btn c-hamburger-btn js-hamburger-btn">
        <span></span>
        <span></span>
        <span></span>
      </button><!-- c-hamburger-btn -->

      <!-- p-drawer -->
      <div class="p-header__drawer p-drawer js-drawer">
        <div class="p-drawer__scroll">
          <ul class="p-drawer__items">
            <li class="p-drawer__item">
              <a href="<?php echo $top; ?>">トップ</a>
            </li>
            <li class="p-drawer__item">
              <a href="<?php echo $news; ?>">お知らせ</a>
            </li>
            <li class="p-drawer__item">
              <a href="<?php echo $content; ?>">事業内容</a>
            </li>
            <li class="p-drawer__item">
              <a href="<?php echo $works; ?>">制作実績</a>
            </li>
            <li class="p-drawer__item">
              <a href="<?php echo $overview; ?>">企業概要</a>
            </li>
            <li class="p-drawer__item">
              <a href="<?php echo $blog; ?>">ブログ</a>
            </li>
            <li class="p-drawer__item">
              <a href="<?php echo $contact; ?>">お問い合わせ</a>
            </li>
          </ul>
        </div>
      </div><!-- p-drawer -->
    </div>
  </header><!-- l-header -->
  