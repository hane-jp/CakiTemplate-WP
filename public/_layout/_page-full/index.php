<?php
$pageTtl = "フルワイドレイアウト表示";
include ("../../function.php");
$metaTtl = $pageTtl."-".$siteName;
$metaDesc = $siteDescription;
$body_class ="l-page-full";
include ($inc_path."/lib/inc/head.php");
include ($inc_path."/lib/inc/header.php");
?>

<main class="main">
  <article class="main__row">
    <header class="main__header main-header">
      <div class="main-header__bg"></div>
      <div class="main-header__row">
        <h1 class="main-header__ttl"><?php echo $pageTtl; ?></h1>
        <p class="main-header__desc">body.l-page-full</p>
      </div>
    </header>
    <?php
    $panAry[] = array("/_layout" ,"レイアウト集");
    include ($inc_path."/lib/inc/pan.php");
    ?>

    <div class="main__conts">
      <section class="conts__item">
          <h2 class="u-ttl_l">フルワイドレイアウト</h2>
          <div class="u-assist">
            <h4 class="u-ttl_s">bodyclass↓</h4>
            <p>body.l-page-full</p>
            <h4 class="u-ttl_s">scssファイル↓</h4>
            <p>..../_scss/_layout/__page-full/index.scss</p>
          </div>
      </section>
      <section class="conts__item">
        <?php  include ($inc_path."/_layout/sample-article.php"); ?>
      </section>
    </div>

  </article>
</main>

<?php  include ($inc_path."/lib/inc/pagetop.php"); ?>
<?php  include ($inc_path."/lib/inc/footer.php"); ?>
<?php  include ($inc_path."/lib/inc/foot.php"); ?>
