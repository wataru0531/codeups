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
  <h1 class="p-mv-sub__title">制作実績</h1>
  <figure class="p-mv-sub__img">
    <picture>
      <source type="image/webp" media="(min-width: 768px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/works-archive/works-archive_mv_pc.webp" />
      <source media="(min-width: 768px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/works-archive/works-archive_mv_pc.jpg" />
      <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/works-archive/works-archive_mv_sp.webp" />
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/works-archive/works-archive_mv_sp.jpg" alt="">
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

<!-- l-taxonomy-list -->
<div class="l-taxonomy-list p-taxonomy-list">
  <div class="p-taxonomy-list__inner l-inner">
    <div class="p-taxonomy-list__items">
      <a class="p-taxonomy-list__item c-btn-taxonomy js-current <?php if(is_post_type_archive('works')){ echo 'is-current'; } ?>" href="<?php echo esc_url(home_url('works/')); ?>">ALL</a>

      <?php 
        // 登録されているタクソノミー(works-cat)一覧表示
        $taxonomy_terms = get_terms('works-cat');
        // wp_queryオブジェクトのtermを取得→照合させて合うならis-currentクラスを付与。
        $queryVarTerm = get_query_var('term');
        foreach($taxonomy_terms as $taxonomy_term):
      ?>
        <a class="p-taxonomy-list__item c-btn-taxonomy <?php if($taxonomy_term->slug === $queryVarTerm){ echo 'is-current'; } ?>" href="<?php echo get_term_link($taxonomy_term); ?>"><?php echo $taxonomy_term->name; ?></a>
      <?php endforeach; ?>

    </div>
  </div>
</div><!-- l-taxonomy-list -->


<!-- l-works-archive -->
<section class="l-works-archive p-works-archive">
  <div class="p-works-archive__inner">
    <div class="p-works-archive__cards p-cards-list-02">
    
      <?php if(have_posts()): ?>
        <?php while(have_posts()): the_post(); ?>
          <a class="p-cards-list-02__card p-card-works" href="<?php the_permalink(); ?>">
            <figure class="p-card-works__img">
              <!-- SCF繰り返しフィールド最初の一枚のみ表示 -->
              <?php $works_images = scf::get('works_images'); ?>
              <?php if($works_images[0]['image']): ?>
                <img src="<?php echo wp_get_attachment_url($works_images[0]['image']); ?>" alt="">
              <?php else: ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/works-archive/works-archive_content.jpg" alt="">
              <?php endif; ?>

              <?php
                $term = get_the_terms($post->ID, 'works-cat');
              ?>
              <span class="p-card-works__category"><?php echo $term[0]->name; ?></span>
            </figure>
            <div class="p-card-works__body">
              <h2 class="p-card-works__title"><?php the_title(); ?></h2>
            </div>
          </a>
        <?php endwhile; ?>
      <?php endif; ?>
      <?php wp_reset_postdata(); ?>

    </div>
  </div>
</section><!-- l-works-archive -->

<!-- l-pagination -->
<?php get_template_part('./template-parts/content', 'pagination'); ?>
<!-- l-pagination -->

<!-- l-contact -->
<?php get_template_part('./template-parts/content', 'contact'); ?>
<!-- l-contact -->

</main>
<?php get_footer(); ?>