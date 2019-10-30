<!DOCTYPE html>
<html class="no-js">
<head>
  <?php include ($inc_path."/lib/inc/head_gtm.txt"); ?>

  <!-- base -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="content-language" content="ja">
  <meta name="viewport" content="width=device-width,initial-scale=1.0" >

  <!-- title/description -->
  <title><?php echo $metaTtl; ?></title>
  <meta name="description" content="<?php echo $metaDesc; ?>">

  <!-- js/css/icon -->
  <script src="<?php echo $base_url; ?>/lib/js/modernizr.js"></script>
  <link rel="stylesheet" href="<?php echo $base_url; ?>/lib/css/styles.css">
  <link rel="apple-touch-icon" href="<?php echo $base_url; ?>/lib/img/icons/apple-touch-icon.png">
  <link rel="icon" type="image/png" href="<?php echo $base_url; ?>/lib/img/icons/favicon-16.png" sizes="16x16">
  <link rel="icon" type="image/png" href="<?php echo $base_url; ?>/lib/img/icons/favicon-32.png" sizes="32x32">
  <link rel="icon" type="image/png" href="<?php echo $base_url; ?>/lib/img/icons/favicon-48.png" sizes="48x48">

  <!-- OGP 共通項目 -->
  <meta property="og:title" content="<?php echo $metaTtl; ?>" >
  <meta property="og:type" content="website" >
  <meta property="og:url" content="<?php echo $_SERVER['REQUEST_URI']; ?>" >
  <meta property="og:site_name"  content="<?php echo $siteName; ?>" >
  <meta property="og:description" content="<?php echo $metaDesc; ?>" >
  <meta property="og:image" content="<?php echo $img_url; ?>/thum/home@2x.png" >
  <meta property="article:publisher" content="FacebookページのURL" >
  <!--meta property="fb:app_id" content="App ID" -->

  <!-- OGP Twitter用 -->
  <meta name="twitter:card" content="summary" >
  <meta name="twitter:title" content="<?php echo $siteName; ?>" >
  <meta name="twitter:url" content="<?php echo $_SERVER['REQUEST_URI']; ?>" >
  <meta name="twitter:description" content="<?php echo $metaDesc; ?>" >
  <meta name="twitter:image" content="<?php echo $img_url; ?>/thum/home@2x.png" >
  <!-- meta name="twitter:site" content="@Twitter" -->

</head>
<body class="<?php echo $body_class." ".$mydir." ".$filename; ?>">
  <?php include ($inc_path."/lib/inc/body_gtm.txt"); ?>
  <?php include ($inc_path."/lib/inc/ie10.php"); ?>
  <div id="all">
