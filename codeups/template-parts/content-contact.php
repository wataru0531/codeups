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

<!-- l-contact -->
<section class="l-contact p-contact">
  <div class="p-contact__inner l-inner">
    <div class="p-contact__header">
      <div class="p-contact-subtitle">
        <div class="c-section-subtitle">contact</div>
      </div>
      <div class="p-contact-title">
        <h2 class="c-section-title--contact">お問い合わせ</h2>
      </div>
    </div>
    <div class="p-contact__description">
      テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
    </div>
    <div class="p-contact__btn">
      <a class="c-btn" href="<?php echo $contact; ?>">お問い合わせへ</a>
    </div>
  </div>
</section><!-- l-contact -->