<?php
$pageTtl = "404ページ";
include ("function.php");
$metaTtl = $siteName;
$metaDesc = $siteDescription;
$body_class ="http404";
include ($inc_path."/lib/inc/head.php");
include ($inc_path."/lib/inc/header.php");
?>

<main class="main">
  <article class="main__row">
    <header class="main__header main-header">
      <div class="main-header__bg"></div>
      <div class="main-header__row">
        <h1 class="main-header__ttl"><?php echo $pageTtl; ?></h1>
        <p class="main-header__desc">音速で探しましたが見つかりませんでした。</p>
      </div>
    </header>
    <?php
    include ($inc_path."/lib/inc/pan.php");
    ?>
    <div class="main__conts conts">
      <p><a href="<?php echo $base_url; ?>/" class="u-icon">トップはこちら</a></p>
    </div>
  </article>
</main>

<?php  include ($inc_path."/lib/inc/pagetop.php"); ?>
<?php  include ($inc_path."/lib/inc/footer.php"); ?>
<?php  include ($inc_path."/lib/inc/foot.php"); ?>
