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

  <!-- l-thanks -->
  <section class="l-thanks p-thanks">
    <div class="p-thanks__inner l-inner">
      <div class="p-thanks__header">
        <h1 class="p-thanks__title">お問い合わせ完了</h1>
      </div>
      <p class="p-thanks__text">
        3営業日以内に<br>返信させて頂きます。
      </p>
      <div class="p-thanks__btn">
        <a class="c-btn" href="<?php echo $top; ?>">TOPへ</a>
      </div>
    </div>
  </section><!-- l-thanks -->
  
</main>

<?php get_footer(); ?>