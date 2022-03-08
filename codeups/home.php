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
  <h1 class="p-mv-sub__title">お知らせ</h1>
  <figure class="p-mv-sub__img">
    <picture>
      <source type="image/webp" media="(min-width: 768px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/news-archive/news-archive_mv_pc.webp" />
      <source media="(min-width: 768px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/news-archive/news-archive_mv_pc.jpg" />
      <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/news-archive/news-archive_mv_sp.webp" />
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/news-archive/news-archive_mv_sp.jpg" alt="">
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


<!-- l-news-archive -->
<section class="l-news-archive p-news-archive">
  <div class="p-news-archive__inner">
    <div class="p-news-archive__items">
      <?php $paged = get_query_var('paged')? get_query_var('paged') : 1; ?>
      <?php
        $args = [
          'post_type' => 'post',
          'paged' => $paged,
          'posts_per_page' => 10,
          'orderby' => 'post_date',
          'order' =>  'DESC',
        ];
        $the_query = new WP_Query($args);
      ?>
      <?php if($the_query->have_posts()): ?>
        <?php while($the_query->have_posts()): $the_query->the_post(); ?>
          <a class="p-news-archive__item p-news-archive-item" href="<?php the_permalink(); ?>">
            <div class="p-news-archive-item__box">
              <time class="p-news-archive-item__time" datetime="<?php the_time(get_option('date_format')); ?>"><?php the_time('Y.m.d'); ?></time>
              <div class="p-news-archive-item__category">
                <?php
                  $category = get_the_category($post->ID);
                  $category_name = $category[0]->name;
                ?>
                <span class="c-btn-news-category"><?php echo $category_name; ?></span>
              </div>
            </div>
            <h2 class="p-news-archive-item__title"><?php the_title(); ?></h2>
          </a>
        <?php endwhile; ?>
      <?php endif; ?>
      <?php wp_reset_postdata(); ?>
    </div>
    
    <!-- l-pagination -->
    <?php get_template_part('./template-parts/content', 'pagination'); ?>
    <!-- l-pagination -->
  </div>
</section>
<!-- l-news-archive -->

<!-- l-contact -->
<?php get_template_part('./template-parts/content', 'contact'); ?>
<!-- l-contact -->

</main>
<?php get_footer(); ?>