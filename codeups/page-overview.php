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
  <h1 class="p-mv-sub__title">企業概要</h1>
  <figure class="p-mv-sub__img">
    <picture>
      <source type="image/webp" media="(min-width: 768px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/overview/overview_mv_pc.webp" />
      <source media="(min-width: 768px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/overview/overview_mv_pc.jpg" />
      <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/overview/overview_mv_sp.webp" />
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/overview/overview_mv_sp.jpg" loading="lazy" alt="">
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

<!-- l-overview-sub -->
<section class="l-overview-sub p-overview-sub">
  <div class="p-overview-sub__inner l-inner">
    <dl class="p-overview-sub__lists">
      <?php $overview_information = scf::get('overview_information', 13); ?>
      <?php foreach($overview_information as $item): ?>
        <div class="p-overview-sub__list p-overview-sub-list">
          <dt class="p-overview-sub-list__title"><?php echo $item['title']; ?></dt>
          <dd class="p-overview-sub-list__content"><?php echo $item['content']; ?></dd>
        </div>
      <?php endforeach; ?>
    </dl>
  </div>
</section><!-- l-overview-sub -->

<!-- l-google-map -->
<div class="l-google-map p-google-map">
  <div class="p-google-map__inner">
    <div class="p-google-map__iframe">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3240.8280303808833!2d139.7649361156881!3d35.68123618019422!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188bfbd89f700b%3A0x277c49ba34ed38!2z5p2x5Lqs6aeF!5e0!3m2!1sja!2sjp!4v1641643447786!5m2!1sja!2sjp"
              style="border:0;"
              allowfullscreen=""
              loading="lazy"
      >
      </iframe>
    </div>
  </div>
</div><!-- l-google-map -->

<!-- l-contact -->
<?php get_template_part('./template-parts/content', 'contact'); ?>
<!-- l-contact -->

</main>
<?php get_footer(); ?>