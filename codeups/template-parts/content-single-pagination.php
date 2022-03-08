<div class="l-single-pagination p-single-pagination">
  <div class="p-single-pagination__inner">
    <div class="p-single-pagination__previous">
      <?php if(get_next_post()): ?>
        <!-- %link...aタグで表示させる記述 -->
        <?php next_post_link('%link', 'PREV'); ?>
      <?php endif; ?>
    </div>

    <div class="p-single-pagination__archive">
      <?php if(is_singular('works')): ?>
        <!-- カスタム投稿works個別投稿ページ -->
        <a href="<?php echo esc_url(home_url('works/')); ?>">一覧</a>
      <?php elseif(is_singular('blog')): ?>
        <!-- カスタム投稿blog個別投稿ページ -->
        <a href="<?php echo esc_url(home_url('blog/')); ?>">一覧</a>
      <?php else: ?>
        <!-- デフォルト投稿タイプ個別投稿ページ -->
        <a href="<?php echo esc_url(home_url('news/')); ?>">一覧</a>
      <?php endif; ?>
    </div>

    <div class="p-single-pagination__next">
      <?php if(get_previous_post()): ?>
        <?php previous_post_link('%link', 'NEXT'); ?>
      <?php endif; ?>
    </div>
  </div>
</div>