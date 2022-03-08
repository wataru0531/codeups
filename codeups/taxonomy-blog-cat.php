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
  <h1 class="p-mv-sub__title">ブログ</h1>
  <figure class="p-mv-sub__img">
    <picture>
      <source type="image/webp" media="(min-width: 768px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/blog-archive/blog_archive_mv_pc.webp" />
      <source media="(min-width: 768px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/blog-archive/blog_archive_mv_pc.jpg" />
      <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/blog-archive/blog_archive_mv_sp.webp" />
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/blog-archive/blog_archive_mv_sp.jpg" alt="">
    </picture>
  </figure>
</div><!-- l-sub-mv -->

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


<!-- l-taxonomy-list -->
<div class="l-taxonomy-list p-taxonomy-list">
  <div class="p-taxonomy-list__inner l-inner">
    <div class="p-taxonomy-list__items">
      <a class="p-taxonomy-list__item c-btn-taxonomy <?php if(is_post_type_archive('blog')){ echo 'is-current'; } ?>" href="<?php echo esc_url(home_url('blog/')); ?>">ALL</a>
      
      <?php 
        // 登録されているタクソノミー(blog-cat)一覧表示
        $taxonomy_terms = get_terms('blog-cat');
        // wp_queryオブジェクトのtermを取得→照合させて合うならis-currentクラスを付与。
        $queryVarTerm = get_query_var('term');
        foreach($taxonomy_terms as $taxonomy_term):
      ?>
        <a class="p-taxonomy-list__item c-btn-taxonomy <?php if($taxonomy_term->slug === $queryVarTerm){ echo 'is-current'; } ?> " href="<?php echo get_term_link($taxonomy_term); ?>"><?php echo $taxonomy_term->name; ?></a>
      <?php endforeach; ?>

    </div>
  </div>
</div><!-- l-taxonomy-list -->

<!-- l-blog-archive -->
<section class="l-blog-archive p-blog-archive">
  <div class="p-blog-archive__inner l-inner">
    <div class="p-blog-archive__cards p-cards-list-03">
        <?php if(have_posts()): ?>
          <?php while(have_posts()): the_post(); ?>
            <a class="p-cards-list-03__card p-card" href="<?php the_permalink(); ?>">
              <figure class="p-card__img">
                <!-- サムネイル画像 -->
                <?php 
                  $attach_id = get_post_thumbnail_id($post->ID);
                  $image = wp_get_attachment_image_src($attach_id, 'full');
                ?>
                <?php if($image): ?>
                  <img src="<?php echo $image[0]; ?>" alt="">
                <?php else: ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/blog-archive/blog_archive_contents.jpg" alt="">
                <?php endif; ?>
              </figure>
              <div class="p-card__body">
                <div class="p-card__title-contents">
                  <h2 class="p-card__title"><?php echo wp_trim_words(get_the_title(), 40, '...'); ?></h2>
                  <p class="p-card__excerpt"><?php the_excerpt(); ?></p>
                </div>
                <div class="p-card__category-time">
                  <?php 
                    $term = get_the_terms($post->ID, 'blog-cat');
                  ?>
                  <span class="p-card__category"><?php echo $term[0]->name; ?></span>
                  <time class="p-card__time" datetime="<?php the_time(get_option('date_format')); ?>"><?php the_time('Y.m.d'); ?></time>
                </div>
              </div>
            </a>
          <?php endwhile; ?>
        <?php endif; ?>

    </div>
  </div>
</section><!-- l-blog-archive -->

<!-- l-pagination -->
<?php get_template_part('./template-parts/content', 'pagination'); ?>
<!-- l-pagination -->

<!-- l-contact -->
<?php get_template_part('./template-parts/content', 'contact'); ?>
<!-- l-contact -->

</main>
<?php get_footer(); ?>