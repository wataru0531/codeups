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

<!-- p-mv-non ここを通過後トップに戻るボタン表示、ヘッダー色追加 -->
<div class="p-mv-non js-mv-non"></div>
<!-- p-mv-non -->

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
  <!-- l-article -->
  <article class="l-article">
    <!-- p-single -->
    <section class="p-single">
      <div class="p-single__inner">
        <?php if(have_posts()): ?>
          <?php while(have_posts()): the_post(); ?>
            <div class="p-single__header">
              <h1 class="p-single__title"><?php the_title(); ?></h1>
              <div class="p-single__box">
                <time class="p-single__time" datetime="<?php the_time(get_option('date_format')); ?>"><?php the_time('Y/m/d'); ?></time>
                <?php
                  $term = get_the_terms($post->ID, 'blog-cat');
                ?>
                <span class="p-single__category"><?php echo $term[0]->name; ?></span>
              </div>
            </div>
            <figure class="p-single__img">
              <?php 
                $attach_id = get_post_thumbnail_id($post->ID);
                $image = wp_get_attachment_image_src($attach_id, 'full');
              ?>
              <?php if($image): ?>
                <img src="<?php echo $image[0]; ?>" alt="">
              <?php else: ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/blog-single/blog_single_contents.jpg" alt="">
              <?php endif; ?>
            </figure>
            <div class="p-single__contents p-post">
              <?php the_content(); ?>
            </div>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>
    </section><!-- p-single -->

    <!-- l-single-pagination -->
    <?php get_template_part('./template-parts/content', 'single-pagination'); ?>
    <!-- l-single-pagination -->

    <!-- l-relation -->
    <section class="l-relation p-relation">
      <div class="p-relation__inner l-inner">
        <div class="p-relation__header">
          <h2 class="p-relation__title">関連記事</h2>
        </div>
        <div class="p-relation__cards p-cards-list-04">
          <?php 
          $term = get_the_terms($post->ID, 'blog-cat');
          $term_slug = $term[0]->slug;

          $args = [
            'post_type' => 'blog',
            'post__not_in' => [$post->ID],
            'posts_per_page' => 4,
            'orderby' => 'rand',
            'tax_query' => [
              [
                'taxonomy' => 'blog-cat',
                'field' => 'slug',
                'terms' => $term_slug,
              ],
            ],
          ];
          $the_query = new WP_Query($args);
          ?>

          <?php if($the_query->have_posts()): ?>
            <?php while($the_query->have_posts()): $the_query->the_post(); ?>
            <a class="p-cards-list-04__card p-card-relation" href="<?php the_permalink(); ?>">
              <figure class="p-card-relation__img">
                <!-- サムネイル画像 -->
                <?php 
                  $attach_id = get_post_thumbnail_id($post->ID);
                  $image = wp_get_attachment_image_src($attach_id, 'full');
                ?>
                <?php if($image): ?>
                  <img src="<?php echo $image[0]; ?>" alt="">
                <?php else: ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/blog-archive/blog_single_contents.jpg" alt="">
                <?php endif; ?>
              </figure>
              <div class="p-card-relation__body">
                <div class="p-card-relation__title-contents">
                  <h3 class="p-card-relation__title"><?php echo wp_trim_words(get_the_title(), 40, '...'); ?></h3>
                  <?php if(get_the_excerpt()): ?>
                      <p class="p-card-relation__excerpt"><?php the_excerpt(); ?></p>
                  <?php endif; ?>
                </div>
                <div class="p-card-relation__category-time">
                  <?php 
                    $terms = get_the_terms($post->ID, 'blog-cat');
                  ?>
                  <span class="p-card-relation__category"><?php echo $terms[0]->name; ?></span>
                  <time class="p-card-relation__time" datetime="<?php the_time(get_option('date_format')); ?>"><?php the_time('Y.m.d'); ?></time>
                </div>
              </div>
            </a>
            <?php endwhile; ?>
          <?php endif; ?>
          <?php wp_reset_postdata(); ?>

        </div>
      </div>
    </section><!-- l-relation -->
  </article><!-- l-article -->

  <!-- l-contact -->
  <?php get_template_part('./template-parts/content', 'contact'); ?>
  <!-- l-contact -->

</main>
<?php get_footer(); ?>