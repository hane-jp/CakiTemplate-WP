<?php
$pageTtl = "レイアウト集";
include ("../function.php");
$metaTtl = $pageTtl."-".$siteName;
$metaDesc = $siteDescription;
$body_class ="";
include ($inc_path."/lib/inc/head.php");
include ($inc_path."/lib/inc/header.php");
?>

<main class="main">
  <article class="main__row">
    <header class="main__header main-header">
      <div class="main-header__bg"></div>
      <div class="main-header__row">
        <h1 class="main-header__ttl"><?php echo $pageTtl; ?></h1>
        <p class="main-header__desc">AmiTemplateに初めから組み込まれているアレコレ（レイアウト）</p>
      </div>
    </header>
    <?php
    include ($inc_path."/lib/inc/pan.php");
    ?>
    <div class="main__conts conts">

      <section class="conts__item">
        <h2 class="u-ttl_l">ページレイアウト</h2>
        <p>bodyタグにclassを追加することでページレイアウトが変更。</p>
        <h3 class="u-ttl_s"><a href="./_page-free/" class="u-icon__link">page-free</a></h3>
        <p>何もしてない状態</p>
        <h3 class="u-ttl_s"><a href="./_page-single/" class="u-icon__link">page-single</a></h3>
        <p>標準的なシングルカラム</p>
        <h3 class="u-ttl_s"><a href="./_page-column/" class="u-icon__link">page-column</a></h3>
        <p>標準的な２カラム表示</p>
        <h3 class="u-ttl_s"><a href="./_page-full/" class="u-icon__link">page-full</a></h3>
        <p>画面横幅サイズいっぱいのページ</p>
        <h3 class="u-ttl_s"><a href="./_page-card/" class="u-icon__link">page-card</a></h3>
        <p>カード表示(表示方法検討中)</p>
      </section>
      <section class="conts__item">
        <h2 class="u-ttl_l">レイアウト用パーツ</h2>
        <h4 class="u-ttl_s">
          <a href="<?php echo $base_url; ?>/_styleguide/category/common/layout/l-full/" target="_blank" class="u-icon__link">.l-full</a>
        </h4>
        <p>親要素から子要素をはみ出して表示</p>
        <h4 class="u-ttl_s">
          <a href="<?php echo $base_url; ?>/_styleguide/category/common/layout/l-column/" target="_blank" class="u-icon__link">.l-culumn</a>
        </h4>
        <p>要素の隙間ありのカラムレイアウト</p>
      </section>
    </div>
  </article>
</main>

<?php  include ($inc_path."/lib/inc/pagetop.php"); ?>
<?php  include ($inc_path."/lib/inc/footer.php"); ?>
<?php  include ($inc_path."/lib/inc/foot.php"); ?>
