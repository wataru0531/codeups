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


<!-- l-mv -->
<div class="l-mv p-mv js-mv-top">
  <div class="p-mv__titles">
    <h2 class="p-mv__title">メインタイトルが入ります</h2>
    <div class="p-mv__subtitle">サブタイトルが入ります</div>
  </div>
  <div class="p-mv__slider">
    <!-- webp画像とjpegを出し分ける -->
    <div class="swiper p-mv-swiper js-swiper-mv">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <div class="swiper-img">
            <picture>
              <source type="image/webp" media="(min-width:768px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/home/home_mv_01_pc.webp" />
              <source media="(min-width:768px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/home/home_mv_01_pc.jpg" />
              <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/home/home_mv_01_sp.webp" />
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/home/home_mv_01_sp.jpg" alt="" />
            </picture>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="swiper-img">
            <picture>
              <source type="image/webp" media="(min-width:768px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/home/home_mv_02_pc.webp" />
              <source media="(min-width:768px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/home/home_mv_02_pc.jpg" />
              <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/home/home_mv_02_sp.webp" />
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/home/home_mv_02_sp.jpg" alt="" />
            </picture>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="swiper-img">
            <picture>
              <source type="image/webp" media="(min-width:768px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/home/home_mv_03_pc.webp" />
              <source media="(min-width:768px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/home/home_mv_03_pc.jpg" />
              <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/home/home_mv_03_sp.webp" />
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/home/home_mv_03_sp.jpg" alt="" />
            </picture>
          </div>
        </div>
      </div>
    </div>
  </div>
</div><!-- l-mv -->


<main>


<!-- l-news -->
<section class="l-news p-news">
  <div class="p-news__inner">
    <div class="p-news__contents">
      <?php
        $args = [
          'post_type' => 'post',
          'posts_per_page' => 1,
          'orderby' => 'post_date',
          'order' => 'DESC',
        ];
        $the_query = new WP_Query($args);
      ?>
      <?php if($the_query->have_posts()): ?>
        <?php while($the_query->have_posts()): $the_query->the_post(); ?>
          <a class="p-news__link" href="<?php the_permalink(); ?>">
            <div class="p-news__block">
              <time class="p-news__time" datetime="<?php the_time(get_option('date_format')); ?>"><?php the_time('Y.m.d'); ?></time>
              <div class="p-news__category">
                  <?php
                    $category = get_the_category($post->ID);
                    
                    $category_name = $category[0]->name;
                  ?>
                <span class="c-btn-news-category"><?php echo $category_name; ?></span>
              </div>
              
            </div>
            <h3 class="p-news__title"><?php the_title(); ?></h3>
          </a>
        <?php endwhile; ?>
      <?php endif; ?>
      <?php wp_reset_postdata(); ?>

      <div class="p-news__btn">
        <a href="<?php echo $news; ?>" class="c-btn-all">すべて見る</a>
      </div>
    </div>
  </div>
</section><!-- l-news -->

<!-- 黄色ライン 上 -->
<div class="l-line-top p-line-top">
  <div class="p-line-top__background"></div>
</div>

<!-- l-content -->
<section class="l-content p-content">
  <div class="p-content__header l-inner">
    <div class="p-content__subtitle">
      <div class="c-section-subtitle">content</div>
    </div>
    <div class="p-content__title">
      <h2 class="c-section-title">事業内容</h2>
    </div>
  </div>
  <div class="p-content__items">
    <a class="p-content__item p-content-link" href="<?php echo $content; ?>" >
      <figure class="p-content-link__img">
        <picture>
          <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/home/home_content_01.webp">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/home/home_content_01.jpg" alt="">
        </picture>
      </figure>
      <h3 class="p-content-link__title">経営理念ページへ</h3>
    </a>
    <a class="p-content__item p-content-link" href="<?php echo $content; ?>#vision_01" >
      <figure class="p-content-link__img">
        <picture>
          <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/home/home_content_02.webp">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/home/home_content_02.jpg" alt="">
        </picture>
      </figure>
      <h3 class="p-content-link__title">理念１へ</h3>
    </a>
    <a class="p-content__item p-content-link" href="<?php echo $content; ?>#vision_02" >
      <figure class="p-content-link__img">
        <picture>
          <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/home/home_content_03.webp">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/home/home_content_03.jpg" alt="">
        </picture>
      </figure>
      <h3 class="p-content-link__title">理念２へ</h3>
    </a>
    <a class="p-content__item p-content-link" href="<?php echo $content; ?>#vision_03" >
      <figure class="p-content-link__img">
        <picture>
          <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/home/home_content_04.webp">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/home/home_content_04.jpg" alt="">
        </picture>
      </figure>
      <h3 class="p-content-link__title">理念３へ</h3>
    </a>
  </div>
</section><!-- l-content -->

<!-- 黄色ライン 下 -->
<div class="l-line-under p-line-under">
  <div class="p-line-under__background"></div>
</div>

<!-- l-works -->
<section class="l-works p-works">
  <div class="p-works__inner">
    <div class="p-works__header l-inner">
      <div class="p-works__subtitle">
        <div class="c-section-subtitle">works</div>
      </div>
      <div class="p-works__title">
        <div class="c-section-title">制作実績</div>
      </div>
    </div>
    <div class="p-works__box">
      <div class="p-works__slider-contents">
        <div class="p-works__slider">
          <div class="swiper p-works-swiper js-swiper-works">
            <div class="swiper-wrapper">
              <!-- SCF繰り返しフィールド -->
              <?php $top_works_images = scf::get('top_works', 9); ?>
              <?php if($top_works_images[0]['image']): ?>
                <?php foreach($top_works_images as $top_works_image): ?>
                  <div class="swiper-slide">
                    <img src="<?php echo wp_get_attachment_url($top_works_image['image']); ?>" alt="">
                  </div>
                <?php endforeach; ?>
              <?php else: ?>
              <!-- swiperに画像が設定していなかった場合 -->
              <div class="swiper-slide">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/home/home_works.jpg" alt="">
              </div>
              <?php endif; ?>
            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>
        <div class="p-works__contents p-works-contents">
          <h3 class="p-works-contents__title">メインタイトルが入ります</h3>
          <p class="p-works-contents__description">
            テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
          </p>
          <div class="p-works-contents__btn">
            <a class="c-btn" href="<?php echo $works; ?>">詳しく見る</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section><!-- l-works -->


<!-- l-overview -->
<section class="l-overview p-overview">
  <div class="p-overview__header l-inner">
    <div class="p-overview__subtitle">
      <div class="c-section-subtitle">overview</div>
    </div>
    <div class="p-overview__title">
      <div class="c-section-title">企業概要</div>
    </div>
  </div>
  <div class="p-overview__box">
    <div class="p-overview__img-contents">
      <figure class="p-overview__img">
        <picture>
          <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/home/home_overview_01.webp" >
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/home/home_overview_01.jpg" alt="">
        </picture>
      </figure>
      <div class="p-overview__contents p-overview-contents">
        <h3 class="p-overview-contents__title">メインタイトルが入ります</h3>
        <p class="p-overview-contents__description">
        テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
        </p>
        <div class="p-overview-contents__btn">
          <a class="c-btn" href="<?php echo $overview; ?>">詳しく見る</a>
        </div>
      </div>
    </div>
  </div>
</section><!-- l-overview -->

<!-- l-blog -->
<section class="l-blog p-blog">
  <div class="p-blog__inner l-inner">
    <div class="p-blog__header">
      <div class="p-blog__subtitle">
        <div class="c-section-subtitle">blog</div>
      </div>
      <div class="p-blog__title">
        <h2 class="c-section-title">ブログ</h2>
      </div>
    </div>
    <div class="p-blog__cards p-cards-list-03">
      <?php
        $args = [
          'post_type' => 'blog',
          'posts_per_page' => 3,
          'orderby' => 'post_date',
          'order' => 'DESC',
        ];
        $the_query = new WP_Query($args);
      ?>
      <?php if($the_query->have_posts()): ?>
        <?php while($the_query->have_posts()): $the_query->the_post(); ?>
          <a class="p-cards-list-03__card p-card" href="<?php the_permalink(); ?>">
            <figure class="p-card__img">
              <?php 
                $attach_id = get_post_thumbnail_id($post->ID);
                $image = wp_get_attachment_image_src($attach_id, 'full');
              ?>
              <?php if($image): ?>
                <img src="<?php echo $image[0]; ?>" alt="">
              <?php else: ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/home/home_blog_01_pc.jpg" alt="">
              <?php endif; ?>
            </figure>
            <div class="p-card__body">
              <div class="p-card__title-contents">
                <h3 class="p-card__title">
                  <?php echo wp_trim_words(get_the_title(), 40, '...'); ?>
                </h3>
                <p class="p-card__excerpt">
                  <?php the_excerpt(); ?>
                </p>
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
        <?php wp_reset_postdata(); ?>
      <?php endif; ?>
    </div>
    <div class="p-blog__btn">
      <a href="<?php echo $blog; ?>" class="c-btn">詳しく見る</a>
    </div>
  </div>
</section><!-- l-blog -->

<!-- l-contact -->
<?php get_template_part('./template-parts/content', 'contact'); ?>
<!-- l-contact -->
  
</main>
<?php get_footer(); ?>