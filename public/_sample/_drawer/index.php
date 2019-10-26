<?php
$pageTtl = "Drawerサンプルページ";
include ("../../function.php");
$metaTtl = $pageTtl."-".$siteName;
$metaDesc = $siteDescription;
$body_class ="drawer drawer--right";
include ($inc_path."/lib/inc/head.php");
#include ($inc_path."/lib/inc/header.php");
?>
<header class="header">
  <div class="header__row wrap">
    <h1 class="header__logo">
      <a href="<?php echo $base_url; ?>/"><?php echo $metaTtl; ?></a>
    </h1>
    <button type="button" class="drawer-toggle drawer-hamburger">
      <span class="sr-only">toggle navigation</span>
      <span class="drawer-hamburger-icon"></span>
    </button>
    <nav class="drawer-nav">
      <ul class="drawer-menu">
        <!--li><a class="drawer-brand" href="#">Home</a></li-->
        <li><a class="drawer-menu-item" href="<?php echo $base_url; ?>/">home</a></li>
        <li><a class="drawer-menu-item" href="<?php echo $base_url; ?>/_sample">sample</a></li>
        <li><a class="drawer-menu-item" href="#">Nav3</a></li>
        <li><a class="drawer-menu-item" href="#">Nav4</a></li>
      </ul>
    </nav>
  </div>
</header>
<main class="main">
  <article class="main__row">

    <header class="main__header main-header">
      <div class="main-header__bg"></div>
      <div class="main-header__row">
        <h1 class="main-header__ttl"><?php echo $pageTtl; ?></h1>
        <p class="main-header__desc">スムーズなドロワーメニューのサンプル</p>
      </div>
    </header>
    <?php
    $panAry[] = array("/_sample" ,"サンプル集");
    include ($inc_path."/lib/inc/pan.php");
    ?>
    <div class="main__conts conts">
      <section class="conts__item">

        <h2 class="u-ttl_l">ドロワーメニュー</h2>

        ↓<br>        ↓<br>↓<br>↓<br>↓<br>↓<br>↓<br>↓<br>↓<br>↓<br>↓<br>↓<br>↓<br>↓<br>↓<br>↓<br>↓<br>↓<br>↓<br>↓<br>↓<br>↓<br>↓<br>↓<br>↓<br>↓<br>↓<br>↓<br>↓<br>↓<br>↓<br>↓<br>↓<br>↓<br>↓<br>↓<br>↓<br>↓<br>↓<br>↓<br>↓<br>↓<br>↓<br>↓<br>↓<br>↓<br>↓<br>↓<br>↓<br>↓<br>↓<br>↓<br>↓<br>↓<br>↓<br>↓<br>↓<br>↓<br>↓<br>↓<br>↓<br>

      </section>
    </div>
  </article>
</main>

<?php  include ($inc_path."/lib/inc/pagetop.php"); ?>
<?php  include ($inc_path."/lib/inc/footer.php"); ?>
<?php  include ($inc_path."/lib/inc/foot.php"); ?>
