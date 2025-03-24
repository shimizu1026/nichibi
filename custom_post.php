<?php
/*---------------------------------------------------------
 *
 * カスタム投稿
 *
 *---------------------------------------------------------*/
function create_post_type_init() {
  $labels = array(
    'name' => '制作実績',
    'singular_name' => '制作実績',
    'add_new_item' => '制作実績を登録',
    'add_new' => '新規追加',
    'new_item' => '新規記事',
    'edit_item' => '記事を編集',
    'view_item' => '記事を表示',
    'not_found' => '見つかりません',
    'not_found_in_trash' => '破棄された記事はありません。',
    'search_items' => '検索',
  );

  $args = array(
    'label' => '記事一覧',
    'labels' => $labels,
    'public' => true,
    'has_archive' => true,
    'hierarchical' => true,
    'menu_position' => 4,
    'menu_icon' => 'dashicons-hammer',
    'rewrite' => true,
    'supports' => array('title', 'editor', 'thumbnail', 'custom_fields', 'author', 'revisions')
  );

  register_post_type( 'performance_post', $args );


  $tax = array(
    'label' => 'カテゴリ',
    'hierarchical' => true,
    'singular_label' => 'カテゴリ',
    'search_items' => 'カテゴリを検索',
    'popular_items' => 'よく投稿しているカテゴリ',
    'all_items' => 'すべてのカテゴリ',
    'edit_item' => 'カテゴリの編集',
    'update_item' => '更新',
    'add_new_item' => '新規カテゴリを追加',
    'add_item_name' => '新しいカテゴリ',
    'show_admin_column' => true,
    'show_ui' => true,
    'query_var' => true
  );

  register_taxonomy( 'performance_tax', 'performance_post', $tax );


  // $tag = array(
  //   'label' => 'タグ',
  //   'hierarchical' => true,
  //   'singular_label' => 'タグ',
  //   'update_count_callback' => '_update_post_term_count',
  //   'search_items' => 'タグを検索',
  //   'popular_items' => 'よく投稿しているタグ',
  //   'all_items' => 'すべてのタグ',
  //   'edit_item' => 'タグの編集',
  //   'update_item' => '更新',
  //   'add_new_item' => '新規タグを追加',
  //   'add_item_name' => '新しいタグ',
  //   'show_admin_column' => true,
  //   'public' => true,
  //   'show_ui' => true,
  //   'query_var' => true
  // );

  // register_taxonomy( 'custom_tag', 'custom-post', $tag );


}

add_action('init', 'create_post_type_init' );




/*---------------------------------------------------------
 *
 * カスタム投稿にカラムをを追加
 *
 *---------------------------------------------------------*/
// カラムの定義
function add_posts_columns($columns) {
    $columns['tax'] = 'カテゴリ';
    $columns['thumbnail'] = 'サムネイル';
    return $columns;
}

// カラムの表示設定
function add_posts_columns_list($column, $post_id) {
    if ($column == 'tax') echo get_the_term_list($post_id, 'tax', '', ', ', '');
    if ($column == 'thumbnail') echo the_post_thumbnail(array(100, 100));
}
add_filter('manage_edit-◯◯◯_columns', 'add_posts_columns');
add_action('manage_◯◯◯_posts_custom_column', 'add_posts_columns_list', 10, 2);

// カラムのソート定義
function custom_orderby_columns($vars) {
    if (isset($vars['orderby']) && 'tax' == $vars['orderby']) {
        $vars = array_merge($vars, array(
            'meta_key' => 'tax',
            'orderby' => 'meta_value'
        ));
    }
    return $vars;
}

// カラムのソート機能
function custom_sortable_columns($sortable_column) {
    $sortable_column['tax'] = 'tax';
    return $sortable_column;
}
add_filter('request', 'custom_orderby_columns');
add_filter('manage_edit-◯◯◯_sortable_columns', 'custom_sortable_columns');



?>
