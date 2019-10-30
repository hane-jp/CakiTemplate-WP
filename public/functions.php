
<?php
register_nav_menus(
  array(
   'global' => 'グローバル',
   'side' => 'サイド',
   'footer' => 'フッター'
  )
);
#------- titleタグ周り ------#
add_theme_support( 'title-tag' );
function wp_document_title_parts( $title ) {
  if ( is_home() || is_front_page() ) {
    unset( $title['tagline'] ); // キャッチフレーズを出力しない
  } else if ( is_category() ) {
    $title['title'] = '「' . $title['title'] . '」カテゴリーの記事一覧';
  } else if ( is_tag() ) {
    $title['title'] = '「' . $title['title'] . '」タグの記事一覧';
  } else if ( is_archive() ) {
    $title['title'] = $title['title'] . 'の記事一覧';
  }
  return $title;
}
add_filter( 'document_title_parts', 'wp_document_title_parts', 10, 1 );
#------- ショートコード ------#
add_filter('widget_text', 'do_shortcode');
function base_url_shortcode() {
  return get_template_directory_uri();
}
add_shortcode('base_url', 'base_url_shortcode');
function home_url_shortcode() {
  return home_url();
}
add_shortcode('home_url', 'home_url_shortcode');
function img_url_shortcode() {
  $img_tmp = get_template_directory_uri().'/lib/img';
  return $img_tmp;
}
add_shortcode('img_url', 'img_url_shortcode');
add_filter( 'wp_kses_allowed_html', 'my_wp_kses_allowed_html', 10, 2 );
function my_wp_kses_allowed_html( $tags, $context ) {
  $tags['img']['srcset'] = true;
  return $tags;
}
add_filter( 'wp_kses_allowed_figure', 'my_wp_kses_allowed_figure', 10, 2 );
function my_wp_kses_allowed_figure( $tags, $context ) {
  $tags['figure'] = true;
  return $tags;
}
add_filter('user_has_cap','allow_unfiltered_html',10,3);
function allow_unfiltered_html($allcaps, $cap, $args ){
  $allcaps['unfiltered_html']=$allcaps['edit_posts'];
  return($allcaps);
}
// wpautop を無効にする
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );
?>
