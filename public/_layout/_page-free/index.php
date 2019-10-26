<?php
$pageTtl = " フリーレイアウト";
include ("../../function.php");
$metaTtl = $pageTtl."-".$siteName;
$metaDesc = $siteDescription;
$body_class ="l-page-free";
include ($inc_path."/lib/inc/head.php");
include ($inc_path."/lib/inc/header.php");
?>

<main class="main">
  <article class="main__row">
    <header class="main__header main-header">
      <div class="main-header__bg"></div>
      <div class="main-header__row">
        <h1 class="main-header__ttl"><?php echo $pageTtl; ?></h1>
        <p class="main-header__desc">何もしていない状態</p>
      </div>
    </header>
    <?php
    $panAry[] = array("/_layout" ,"レイアウト集");
    include ($inc_path."/lib/inc/pan.php");
    ?>

    <div class="main__conts">
      <?php  include ($inc_path."/_layout/sample-article.php"); ?>
    </div>

  </article>
</main>

<?php  include ($inc_path."/lib/inc/pagetop.php"); ?>
<?php  include ($inc_path."/lib/inc/footer.php"); ?>
<?php  include ($inc_path."/lib/inc/foot.php"); ?>
