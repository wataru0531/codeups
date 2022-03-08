<?php get_header(); ?>

<!-- l-sub-mv -->
<div class="l-mv-sub p-mv-sub js-mv-sub">
  <h1 class="p-mv-sub__title">お問い合わせ</h1>
  <figure class="p-mv-sub__img">
    <picture>
      <source type="image/webp" media="(min-width: 768px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/contact/contact_mv_pc.webp" />
      <source media="(min-width: 768px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/contact/contact_mv_pc.jpg" />
      <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/contact/contact_mv_sp.webp" />
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/contact/contact_mv_sp.jpg" alt="">
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

<!-- l-contact-sub -->
<section class="l-contact-sub p-contact-sub">
  <div class="p-contact-sub__inner">
    <div class="p-contact-sub__form">
      <!-- l-form -->
      <div class="l-form p-form">
        <div class="p-form__inner">
          <?php echo do_shortcode('[contact-form-7 id="36" title="お問い合わせ"]'); ?>
        </div>
      </div><!-- l-form -->
    </div>
  </div>
</section><!-- l-contact-sub -->

</main>
<?php get_footer(); ?>