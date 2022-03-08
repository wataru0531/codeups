<?php get_header(); ?>

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

<!-- l-sub-mv -->
<div class="l-mv-sub p-mv-sub js-mv-sub">
  <h1 class="p-mv-sub__title">事業内容</h1>
  <figure class="p-mv-sub__img">
    <picture>
      <source type="image/webp" media="(min-width: 768px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/content/content_mv_pc.webp" />
      <source media="(min-width: 768px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/content/content_mv_pc.jpg" />
      <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/content/content_mv_sp.webp" />
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/content/content_mv_sp.jpg" alt="">
    </picture>
  </figure>
</div><!-- </div>l-sub-mv -->

<!-- p-breadcrumb -->
<div class="p-breadcrumb">
  <div class="p-breadcrumb__inner l-inner">
    <?php
      if(function_exists('bcn_display')){
        bcn_display();
      }
    ?>
  </div>
</div><!-- p-breadcrumb -->


<main>


<!-- l-content-sub -->
<div class="l-content-sub p-content-sub">
  <div class="p-content-sub__inner">
    <div class="p-content-sub__vision p-content-sub-vision l-inner">
      <h2 class="p-content-sub-vision__title">企業理念</h2>
      <p class="p-content-sub-vision__description">
      テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
        <!-- 説明が入ります。説明が入ります。説明が入ります。説明が入ります。<br>説明が入ります。説明が入ります。説明が入ります。説明が入ります。 -->
      </p>
    </div>
    
    <ul class="p-content-sub__cards">
      <li class="p-content-sub__card p-card-content" id="vision_01">
        <figure class="p-card-content__img">
          <picture>
            <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/content/content_philosophy_01.webp" >
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/content/content_philosophy_01.jpg" alt="">
          </picture>
        </figure>
        <div class="p-card-content__body">
          <h3 class="p-card-content__title">企業理念１</h3>
          <div class="p-card-content__description">
            テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
          </div>
        </div>
      </li>
      <li class="p-content-sub__card p-card-content" id="vision_02">
        <figure class="p-card-content__img">
          <picture>
            <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/content/content_philosophy_02.webp" >
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/content/content_philosophy_02.jpg" alt="">
          </picture>
        </figure>
        <div class="p-card-content__body">
          <h3 class="p-card-content__title">企業理念２</h3>
          <div class="p-card-content__description">
            テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
          </div>
        </div>
      </li>
      <li class="p-content-sub__card p-card-content" id="vision_03">
        <figure class="p-card-content__img">
          <picture>
            <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/content/content_philosophy_03.webp" >
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/content/content_philosophy_03.jpg" alt="">
          </picture>
        </figure>
        <div class="p-card-content__body">
          <h3 class="p-card-content__title">企業理念３</h3>
          <div class="p-card-content__description">
            テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
          </div>
        </div>
      </li>
    </ul>
  </div>
</div><!-- l-content-sub -->

<!-- l-contact -->
<?php get_template_part('./template-parts/content', 'contact'); ?>
<!-- l-contact -->

</main>
<?php get_footer(); ?>