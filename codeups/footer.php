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

  <!-- l-footer -->
  <footer class="l-footer p-footer">
    <div class="p-footer__inner">

      <div class="p-footer__box">
        <div class="p-footer__logo">
          <?php if(is_front_page()): ?>
            <span>
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/codeups-logo.svg" loading="lazy" alt="codeupsロゴ">
            </span>
          <?php else: ?>
            <a href="<?php echo $top; ?>">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/codeups-logo.svg" loading="lazy" alt="codeupsロゴ">
            </a>
          <?php endif; ?>
        </div>

        <!-- p-footer-nav -->
        <div class="p-footer__footer-nav p-footer-nav">
          <ul class="p-footer-nav__items">
            <li class="p-footer-nav__item">
              <a href="<?php echo $news; ?>">お知らせ</a>
            </li>
            <li class="p-footer-nav__item">
              <a href="<?php echo $content; ?>">事業内容</a>
            </li>
            <li class="p-footer-nav__item">
              <a href="<?php echo $works; ?>">制作実績</a>
            </li>
            <li class="p-footer-nav__item">
              <a href="<?php echo $overview; ?>">企業概要</a>
            </li>
            <li class="p-footer-nav__item">
              <a href="<?php echo $blog;  ?>">ブログ</a>
            </li>
            <li class="p-footer-nav__item">
              <a href="<?php echo $contact; ?>">お問い合わせ</a>
            </li>
          </ul>
        </div><!-- p-footer-nav -->
        
      </div>
    </div>
    <div class="p-footer__copyright">
      <p><small>&copy;&nbsp;2021&nbsp;CodeUps&nbsp;Inc.</small></p>
    </div>
  </footer><!-- l-footer -->

  <?php wp_footer(); ?>

</div><!-- l-global-container -->
</body>
</html>