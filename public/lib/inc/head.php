
<?php //function.phpを呼ぶ
//base
include ("function.php");
$pageTtl = '公式';
//meta
$metaTtl = $pageTtl.'-'.siteName();
$metaDesc = siteDesc($pageTtl);
$metaThum = '';
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <!-- <title><?php wp_title('|', true, 'right'); ?></title> -->
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
    <!-- base -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="content-language" content="ja">
    <meta name="viewport" content="width=device-width,initial-scale=1.0" >
    <meta name="format-detection" content="telephone=no">
    <!-- title/description -->
    <title><?php echo $metaTtl ?></title>
    <meta name="description" content="<?php echo $metaDesc; ?>">
    <!-- js/css/icon -->
    <script src="<?php echo $base_url ?>/lib/js/modernizr.js"></script>
    <link rel="stylesheet" href="<?php echo $base_url ?>/lib/css/styles.css">
    <link rel="apple-touch-icon" href="<?php echo $base_url ?>/lib/img/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="<?php echo $base_url ?>/lib/img/icons/favicon-16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="<?php echo $base_url ?>/lib/img/icons/favicon-32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="<?php echo $base_url ?>/lib/img/icons/favicon-48.png" sizes="48x48">
    <!-- OGP 共通項目 -->
    <meta property="og:title" content="<?php echo $metaTtl ?>" >
    <meta property="og:type" content="website" >
    <meta property="og:url" content="<?php echo $page_url; ?>" >
    <meta property="og:site_name"  content="<?php siteName(); ?>" >
    <meta property="og:description" content="<?php echo $metaDesc; ?>" >
    <meta property="og:image" content="<?php echo $metaThum; ?>" >
    <!-- OGP Twitter用 -->
    <meta name="twitter:card" content="summary" >
    <meta name="twitter:title" content="<?php echo $metaTtl; ?>" >
    <meta name="twitter:url" content="<?php echo $page_url; ?>" >
    <meta name="twitter:description" content="<?php echo $metaDesc; ?>" >
    <meta name="twitter:image" content="<?php echo $metaThum; ?>" >
    <?php wp_head(); ?>
  </head>
  <body class="<?php echo ($body_class." ".$mydir." ".$filename); body_class(); ?>">
