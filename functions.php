<?php
// コンンテンツの幅
if ( ! isset( $content_width ) ) {
  $content_width = 980;
}

/*---------------------------------------------------------
 *
 * wordpressのセットアップ
 *
 *---------------------------------------------------------*/
function original_setup(){

  // // バージョン更新を非表示にする
  add_filter('pre_site_transient_update_core', '__return_zero');

  // プラグインのバージョンアップを非表示
  add_filter('site_option__site_transient_update_plugins', '__return_zero');

  // // APIによるバージョンチェックの通信をさせない
  remove_action('wp_version_check', 'wp_version_check');
  remove_action('admin_init', '_maybe_update_core');

  // 投稿とコメントのRSSフィードリンクを有効化
  add_theme_support( 'automatic-feed-links' );

  //画像サイズ指定
  add_image_size( 'original-post-thumbnails', 206, 206, true);

  // カスタムメニューの作成
  register_nav_menu( 'primary', 'Navigation Menu' );

  // アイキャッチ使用
  add_theme_support( 'post-thumbnails' );

  // エディター
  add_editor_style('css/wp/wp-editor.css');

}
add_action( 'after_setup_theme', 'original_setup' );



/*---------------------------------------------------------
 *
 * デフォルトのタイトル表示の設定
 *
 *---------------------------------------------------------*/
function original_wp_title( $title, $sep ) {
  global $paged, $page;

  if( is_feed() )
    return $title;

  $title .= get_bloginfo( 'name', 'display' );

  // フロントページのタイトルにディスクリプションをつける
  // もし長過ぎる場合はここにテキストで設定する
  $site_description = get_bloginfo( 'description', 'display' );

  if ( $site_description && ( is_home() || is_front_page() ) )
    // デスクリプションが多い場合、$sep $site_description は削除する
    $title = "$title $sep $site_description";

  if( ( $paged >= 2 || $page >= 2 ) && ! is_404() )
    $title = "$title $sep " . sprintf( '%sページ目', max( $paged, $page ) );

  return $title;
}
add_filter( 'wp_title', 'original_wp_title', 10, 2 );




/*---------------------------------------------------------
 *
 * デフォルトのnext/prev出力動作を停止
 *
 *---------------------------------------------------------*/
function remove_linkrev() {
  if ( is_singular( array ( 'movies' ) ) ) {
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
  }
}
add_action( 'get_header', 'remove_linkrev' );



/*---------------------------------------------------------
 *
 * //デフォルト・カスタム投稿のアーカイブを取得
 *
 *---------------------------------------------------------*/
function customPostArchives($postType='performance_post', $_type='year') {
  global $wpdb;

  $postTypes   = is_array($postType) ? $postType : array($postType);
  $lastChanged = wp_cache_get('last_changed', 'posts');
  if (!$lastChanged) {
    $lastChanged = microtime();
    wp_cache_set('last_changed', $lastChanged, 'posts');
  }

  $postTypeConds = array();
  foreach ($postTypes as $type) {
    $postTypeConds[] = $wpdb->prepare("post_type = %s", $type);
  }
  $postTypeCondition = '('.implode(' OR ', $postTypeConds).')';
  
  if ($_type == 'month') {
    $query = "SELECT YEAR(post_date) AS `year`, MONTH(post_date) AS `month`, count(ID) as posts FROM {$wpdb->posts} WHERE {$postTypeCondition} AND post_status = 'publish' GROUP BY YEAR(post_date), MONTH(post_date) ORDER BY post_date DESC";
  } else {
    $query = "SELECT YEAR(post_date) AS `year`, count(ID) as posts FROM {$wpdb->posts} WHERE {$postTypeCondition} AND post_status = 'publish' GROUP BY YEAR(post_date), YEAR(post_date) ORDER BY post_date DESC";
  }

  $key     = md5($query);
  $key     = "customPostArchives:{$key}:{$lastChanged}";
  $results = $wpdb->get_results($query);
  if (!$results = wp_cache_get($key, 'posts')) {
    $results = $wpdb->get_results($query);
    wp_cache_set($key, $results, 'posts');
  }

  return $results;
}


/*---------------------------------------------------------
 *
 * その他小分けにしたfunction
 *
 *---------------------------------------------------------*/

require_once locate_template('functions/scripts.php');     // CSSやJavascript関連
require_once locate_template('functions/widget.php');     // サイドバー、ウィジェット

require_once locate_template('functions/dashboard.php');      // 管理画面の調整

require_once locate_template('functions/custom_post.php');      // カスタム投稿

require_once locate_template('functions/setting.php');      // その他カスタマイズ
require_once locate_template('functions/tools.php');      // いろいろな関数
require_once locate_template('functions/pagination.php');      // ページネーション

/**
 * その他特殊な場面
 */
require_once locate_template('functions/lib/contact_form_7_custom.php');      // コンタクトフォーム7用
require_once locate_template('functions/lib/comment_ajax.php');      // コンタクトフォーム7用
require_once locate_template('functions/lib/youtube.php');      // Youtube用

?>
