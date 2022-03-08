<div class="l-pagination p-pagination">
  <div class="p-pagination__inner">

    <!-- str_replace(検索文字列, 置換文字列, 対象文字列) -->
    <!-- get_pagenum_link()...引数で与えられた数字を元にページ番号のリンクを返す。 -->
    <!-- 例：http://hogehoge.com/?paged=9999999999/ -->
    <!-- ここでは、ページ番号のリンクの$bigに該当する箇所（9999999999）を%#%に置き換える。 -->
    <!-- ここで出力されるurlは、http://hogehoge.com/?paged=%#% となる。 -->

    <?php if($wp_query->max_num_pages > 1): ?>
      <?php
        $big = 9999999999;
        // $link = get_pagenum_link($big);
        // var_dump($link);

        echo paginate_links([
          'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))), // ベースのurlを生成。要するにここではこのurlを必要な分生成する。
          'format' => '', // ページネーションの構造を指定。初期値paged=%#%
          'total' => $wp_query->max_num_pages, // 最大投稿数
          'current' => max(1, get_query_var('paged')), //　現在のページ番号(一覧ページは$paged、個別ページは$page)
          // 'show_all' => true, // true...すべてのページ番号を表示。初期値はfalse
          'end_size' => 1, // ページ番号の両端にいくつの数字を表示するか。初期値1
          'mid_size' => 3, // 現在のページの両端にいくつの数字を表示するか。初期値2
          'prev_next' => true, // 「前へ」、「次へ」を含めるかどうか。
          'prev_text' => 'PREV',
          'next_text' => 'NEXT',
          'type' => 'plain', // ul、li表示の時は、list　初期値'plain'
        ]);
      ?>
    <?php endif; ?>
  </div>
</div>