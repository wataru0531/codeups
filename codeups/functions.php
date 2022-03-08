<?php
/**
 * Functions
 */

/**
 * WordPress標準機能
 *
 * @codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/add_theme_support
 */
function my_setup() {
	add_theme_support( 'post-thumbnails' ); /* アイキャッチ */
	add_theme_support( 'automatic-feed-links' ); /* RSSフィード */
	// add_theme_support( 'title-tag' ); /* タイトルタグ自動生成 */
	add_theme_support(
		'html5',
		array( /* HTML5のタグで出力 */
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);
}
add_action( 'after_setup_theme', 'my_setup' );



/**
 * CSSとJavaScriptの読み込み
 *
 * @codex https://wpdocs.osdn.jp/%E3%83%8A%E3%83%93%E3%82%B2%E3%83%BC%E3%82%B7%E3%83%A7%E3%83%B3%E3%83%A1%E3%83%8B%E3%83%A5%E3%83%BC
 */
function my_script_init()
{
	// swiper
	wp_enqueue_style('swiper_css', get_template_directory_uri() . '/assets/css/vendors/swiper-bundle.min.css');
	// メイン
	wp_enqueue_style( 'my_style', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0.1', 'all' );

	// メイン
	wp_enqueue_script( 'my_script', get_template_directory_uri() . '/assets/js/bundle.js', array(), '1.0.1', true );

}
add_action('wp_enqueue_scripts', 'my_script_init');


/**
 * メニューの登録
 *
 * @codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/register_nav_menus
 */
// function my_menu_init() {
// 	register_nav_menus(
// 		array(
// 			'global'  => 'ヘッダーメニュー',
// 			'utility' => 'ユーティリティメニュー',
// 			'drawer'  => 'ドロワーメニュー',
// 		)
// 	);
// }
// add_action( 'init', 'my_menu_init' );
/**
 * メニューの登録
 *
 * 参考：https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/register_nav_menus
 */


/**
 * ウィジェットの登録
 *
 * @codex http://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/register_sidebar
 */
// function my_widget_init() {
// 	register_sidebar(
// 		array(
// 			'name'          => 'サイドバー',
// 			'id'            => 'sidebar',
// 			'before_widget' => '<div id="%1$s" class="p-widget %2$s">',
// 			'after_widget'  => '</div>',
// 			'before_title'  => '<div class="p-widget__title">',
// 			'after_title'   => '</div>',
// 		)
// 	);
// }
// add_action( 'widgets_init', 'my_widget_init' );


/**
 * アーカイブタイトル書き換え
 *
 * @param string $title 書き換え前のタイトル.
 * @return string $title 書き換え後のタイトル.
 */
// function my_archive_title( $title ) {

// 	if ( is_home() ) { /* ホームの場合 */
// 		$title = 'ブログ';
// 	} elseif ( is_category() ) { /* カテゴリーアーカイブの場合 */
// 		$title = '' . single_cat_title( '', false ) . '';
// 	} elseif ( is_tag() ) { /* タグアーカイブの場合 */
// 		$title = '' . single_tag_title( '', false ) . '';
// 	} elseif ( is_post_type_archive() ) { /* 投稿タイプのアーカイブの場合 */
// 		$title = '' . post_type_archive_title( '', false ) . '';
// 	} elseif ( is_tax() ) { /* タームアーカイブの場合 */
// 		$title = '' . single_term_title( '', false );
// 	} elseif ( is_search() ) { /* 検索結果アーカイブの場合 */
// 		$title = '「' . esc_html( get_query_var( 's' ) ) . '」の検索結果';
// 	} elseif ( is_author() ) { /* 作者アーカイブの場合 */
// 		$title = '' . get_the_author() . '';
// 	} elseif ( is_date() ) { /* 日付アーカイブの場合 */
// 		$title = '';
// 		if ( get_query_var( 'year' ) ) {
// 			$title .= get_query_var( 'year' ) . '年';
// 		}
// 		if ( get_query_var( 'monthnum' ) ) {
// 			$title .= get_query_var( 'monthnum' ) . '月';
// 		}
// 		if ( get_query_var( 'day' ) ) {
// 			$title .= get_query_var( 'day' ) . '日';
// 		}
// 	}
// 	return $title;
// };
// add_filter( 'get_the_archive_title', 'my_archive_title' );


/**
 * 抜粋文の文字数の変更
 *
 * @param int $length 変更前の文字数.
 * @return int $length 変更後の文字数.
*/
// function my_excerpt_length( $length ) {
// 	return 80;
// }
// add_filter( 'excerpt_length', 'my_excerpt_length', 999 );


/**
 * 抜粋文の省略記法の変更
 *
 * @param string $more 変更前の省略記法.
 * @return string $more 変更後の省略記法.
 */
// function my_excerpt_more( $more ) {
// 	return '...';

// }
// add_filter( 'excerpt_more', 'my_excerpt_more' );


/***************************************************************


.オリジナルカスタマイズ


***************************************************************/

//グローバルナビゲーション、フッターナビゲーションを追加。
//※任意でglobal_nav、グローバルナビゲーションとつけて登録する。
// register_nav_menus([
// 	'global_nav' => 'グローバルナビゲーション',
// 	'footer_nav' => 'フッターナビゲーション'
// ]);

//デフォルトの「投稿」を「NEWS」に変更する。
// デフォルトでは投稿のアーカイブ機能が無効になっているので有効にもできる(urlがここではnewsになる)。
//archiveを有効にして、ドメイン名/newsとする。
function post_has_archive($args, $post_type){
	if('post' == $post_type){
		$args['rewrite'] = true;
		// $args['has_archive'] = 'news';
		$args['label'] = 'お知らせ';
	}

	return $args;
};
add_filter('register_post_type_args', 'post_has_archive', 10, 2);


// 抜粋文を適度な長さに調整する。
function get_flexible_excerpt($number){
	$value = get_the_excerpt();
	$value = wp_trim_words($value, $number, '...');

	return $value;
}

// 抜粋the_excerpt()使用の時、自動生成されるpタグを除去する方法
remove_filter('the_excerpt', 'wpautop');


// カスタム投稿「制作実績」
add_action('init', function(){
	register_post_type('works', [
		'label' => '制作実績',
		'public' => true,
		'menu_position' => 5,
		'has_archive' => true,
		'hierarchical' => true,
		'show_in_rest' => true, // 投稿タイプをRESTAPIに含めるかどうか
		'supports' => [
			'title',
			'editor',
			'thumbnail',
			'page-attributes',
			'custom-fields',
			// 'excerpt',
			// 'comments'
		],
	]);

	register_taxonomy('works-cat', 'works', [
		'label' => '制作実績カテゴリー',
		'public' => true,
		'show_admin_column' => true,
		'hierarchical' => true,
		'show_in_rest' => true,
	]);
});

// カスタム投稿「ブログ」
add_action('init', function(){
	register_post_type('blog', [
		'label' => 'ブログ',
		'public' => true,
		'menu_position' => 5,
		'has_archive' => true,
		'hierarchical' => true,
		'show_in_rest' => true,
		'supports' => [
			'title',
			'editor',
			'thumbnail',
			'page-attributes',
			'custom-fields',
			'excerpt',
			// 'comments'
		],
	]);

	register_taxonomy('blog-cat', 'blog', [
		'label' => 'ブログカテゴリー',
		'public' => true,
		'show_admin_column' => true, // 管理画面の一覧でタクソノミーを表示。
		'hierarchical' => true,
		'show_in_rest' => true,
	]);
});

// カスタム分類「商品」。カスタム投稿「ブログ」に作る。
// 第１引数　カテゴリーの識別スラッグ。
// 第２引数　対象の投稿タイプのスラッグ
// タクソノノミー: カテゴリー
// ターム: カテゴリー名（例：日本、アメリカ、イギリス）

// add_action('init', function(){
// 	register_taxonomy('item', 'works', [
// 		'label' => '商品',
// 		'hierarchical' => true,
// 		'show_in_rest' => true,

// 	]);
// });


//アイキャッチ画像がなければ、デフォルト画像を表示する。
function get_eye_catch_default(){
	if(has_post_thumbnail()):
		//アイキャッチ画像のidを取得
		$id = get_post_thumbnail_id();

		$img = wp_get_attachment_image_src($id, 'large');

	else:
		//デフォルトのアイキャッチ画像を設定しておく処理。
		$img = array(get_template_directory_uri() . '/assets/img/');

	endif;

	return $img;
}


// コンタクトフォーム7 selectで一番上の空の項目のセレクトボックスの文字を変更する。
function empty_contact_form($html){
	return str_replace('---', '選択してください', $html);
}
add_filter('wpcf7_form_elements', 'empty_contact_form');

// コンタクトフォーム７　完了画面遷移へ


// AddQuickTagをカスタム投稿「ブログ」に追加する方法。
  // ...デフォルトではカスタム投稿では使用できない。

function my_addquicktag_post_types($post_types){
	$post_types[] = 'blog';
	return $post_types;
}
add_filter('addquicktag_post_types', 'my_addquicktag_post_types');



// メインループは変更せず、他のページの投稿件数などを変更する。
// ページネーションでのエラーを無くすため
// pre_get_postsフックの引数にはメインクエリオブジェクトが渡させる。クエリ変数。
function set_pre_get_posts($query) {
	// メインループに干渉しないようにする
	// var_dump($query);
	
  if (is_admin() || !$query->is_main_query()) {
    return;
  }

	// 制作実績一覧ページ
  if ($query->is_post_type_archive('works')) {
    $query->set('posts_per_page', 6);
		$query->set('orderby', 'post_date');
		$query->set('order', 'DESC');
		return;
  }

	// 　カスタムタクソノミー「works-cat」 一覧ページ
	if($query->is_tax('works-cat')){
		$query->set('posts_per_page', 6);
		$query->set('orderby', 'post_date');
		$query->set('order', 'DESC');
		return;
	}

	// ブログ一覧ページ
	if($query->is_post_type_archive('blog')){
		$query->set('posts_per_page', 9);
		$query->set('orderby', 'post_date');
		$query->set('order', 'DESC');
		return;
	}

	// カスタムタクソノミー 「blog-cat」 一覧ページ
	if($query->is_tax('blog-cat')){
		$query->set('posts_per_page', 9);
		$query->set('orderby', 'post_date');
		$query->set('order', 'DESC');
	}

}
add_action('pre_get_posts', 'set_pre_get_posts');

