<?php
$pageTtl = "カードレイアウト";
include ("../../function.php");
$metaTtl = $pageTtl."-".$siteName;
$metaDesc = $siteDescription;
$body_class ="l-page-card";
include ($inc_path."/lib/inc/head.php");
include ($inc_path."/lib/inc/header.php");
?>

<main class="main">
  <article class="main__row">
    <header class="main__header main-header">
      <div class="main-header__bg"></div>
      <div class="main-header__row">
        <h1 class="main-header__ttl"><?php echo $pageTtl; ?></h1>
        <p class="main-header__desc">body.l-page-card</p>
      </div>
    </header>
    <?php
    $panAry[] = array("/_layout" ,"レイアウト集");
    include ($inc_path."/lib/inc/pan.php");
    ?>

    <div class="main__conts conts">
      <section class="conts__item">
        <h2 class="u-ttl_l">カードレイアウト</h2>
        <p>表示方法検討中。masonryでも使っておこうかな？</p>
        <p>参考サイト: https://github.com/desandro/masonry</p>
        <div class="u-assist">
          <h4 class="u-ttl_s">bodyclass↓</h4>
          <p>body.l-page-card</p>
          <h4 class="u-ttl_s">scssファイル↓</h4>
          <p>..../_scss/_layout/__page-card/index.scss</p>
        </div>
      </section>
      <section class="conts__item">

        <div class="u-column_4">
          <div class="u-coloumn__row">
            <div class="u-column__item u-card">card</div>
            <div class="u-column__item u-card">card</div>
            <div class="u-column__item u-card">card</div>
            <div class="u-column__item u-card">card</div>
            <div class="u-column__item u-card">card</div>
            <div class="u-column__item u-card">card</div>
          </div>
        </div>

      </section>
    </div>

  </article>
</main>

<?php  include ($inc_path."/lib/inc/pagetop.php"); ?>
<?php  include ($inc_path."/lib/inc/footer.php"); ?>
<?php  include ($inc_path."/lib/inc/foot.php"); ?>
