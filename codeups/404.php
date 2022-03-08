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

<main>
  
  <!-- l-404 -->
  <section class="l-404 p-404">
    <div class="p-404__inner l-inner">
      <div class="p-404__header">
        <h1 class="p-404__title">404&nbsp;Not&nbsp;Found</h1>
      </div>
      <div class="p-404__text">
        お探しのページは<br>見つかりませんでした。
      </div>
      <div class="p-404__btn">
        <a class="c-btn" href="<?php echo $top; ?>">TOPへ</a>
      </div>
    </div>
  </section><!-- l-404 -->
  
</main>

<?php get_footer(); ?>
