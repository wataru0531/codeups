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


<!-- l-works-single -->
<section class="l-works-single p-works-single">
  <div class="p-works-single__inner">
    <?php if(have_posts()): ?>
      <?php while(have_posts()): the_post(); ?>
        <div class="p-works-single__header">
          <h1 class="p-works-single__title"><?php the_title(); ?></h1>
          <div class="p-works-single__box">
            <time class="p-works-single__time" datetime="<?php the_time(get_option('date_format')); ?>"><?php the_time('Y/m/d') ?></time>
            <?php
              $terms = get_the_terms($post->ID, 'works-cat');
            ?>
            <span class="p-works-single__category"><?php echo $terms[0]->name; ?></span>
          </div>
        </div>
        <div class="p-works-single__slider">
          <!-- メインスライダー -->
          <div class="swiper p-works-single-swiper js-swiper-works-single">
              <div class="swiper-wrapper">
                <!-- SCF繰り返しフィールド -->
                <?php $works_images = scf::get('works_images'); ?>
                <?php if($works_images[0]['image']): ?>
                  <?php foreach($works_images as $works_image): ?>
                    <div class="swiper-slide">
                      <img src="<?php echo wp_get_attachment_url($works_image['image']); ?>" alt="">
                    </div>
                  <?php endforeach; ?>
                <?php endif; ?>
              </div>
              <div class="swiper-button-prev"></div>
              <div class="swiper-button-next"></div>
          </div>
          <!-- サムネイル -->
          <div class="swiper p-works-single-thumbnail js-swiper-thumbnail">
            <div class="swiper-wrapper">
              <!-- SCF繰り返しフィールド -->
              <?php $works_images = scf::get('works_images'); ?>
              <?php if($works_images[0]['image']): ?>
                <?php foreach($works_images as $works_image): ?>
                  <div class="swiper-slide">
                    <img src="<?php echo wp_get_attachment_url($works_image['image']); ?>" alt="">
                  </div>
                <?php endforeach; ?>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <dl class="p-works-single__points">
          <div class="p-works-single__point p-works-point">
            <dt class="p-works-point__title">制作のポイント</dt>
            <dd class="p-works-point__description">
              <?php $production = scf::get('production'); ?>
              <?php if($production): ?>
                <?php echo nl2br($production); ?>
              <?php endif; ?>
            </dd>
          </div>
          <div class="p-works-single__point p-works-point">
            <dt class="p-works-point__title">デザインのポイント</dt>
            <dd class="p-works-point__description">
              <?php $design = scf::get('design'); ?>
              <?php if($design): ?>
                <?php echo nl2br($design); ?>
              <?php endif; ?>
            </dd>
          </div>
          <div class="p-works-single__point p-works-point">
            <dt class="p-works-point__title">その他</dt>
            <dd class="p-works-point__description">
              <?php $other = scf::get('other'); ?>
              <?php if($other): ?>
                <?php echo nl2br($other); ?>
              <?php endif; ?>
            </dd>
          </div>
        </dl>
      <?php endwhile; ?>
    <?php endif; ?>
  </div>
</section><!-- l-works-single -->


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
        $term = get_the_terms($post->ID, 'works-cat');
        $term_slug = $term[0]->slug;
        
        $args = [
          'post_type' => 'works',
          'post__not_in' => [$post->ID],
          'posts_per_page' => 4,
          'orderby' => 'rand',
          'tax_query' => [
            [
              'taxonomy' => 'works-cat',
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
                <!-- SCF繰り返しフィールドの１枚目のみ表示 -->
                <?php $works_images = scf::get('works_images'); ?>
                <?php if($works_images[0]['image']): ?>
                  <img src="<?php echo wp_get_attachment_url($works_images[0]['image']); ?>" alt="">
                <?php endif; ?>

              </figure>
              <div class="p-card-relation__body">
                <div class="p-card-relation__title-contents">
                  <h3 class="p-card-relation__title"><?php the_title(); ?></h3>
                  <?php if(get_the_excerpt()): ?>
                      <p class="p-card-relation__excerpt"><?php the_excerpt(); ?></p>
                  <?php endif; ?>
                </div>
                <div class="p-card-relation__category-time">
                  <?php
                    $term = get_the_terms($post->ID, 'works-cat');
                  ?>
                  <span class="p-card-relation__category"><?php echo $term[0]->name; ?></span>
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

<!-- l-contact -->
<?php get_template_part('./template-parts/content', 'contact'); ?>
<!-- l-contact -->

</main>
<?php get_footer(); ?>