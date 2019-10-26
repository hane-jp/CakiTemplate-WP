<?php
$pageTtl = "サンプル集";
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
        <p class="main-header__desc">AmiTemplateに初めから組み込まれているアレコレ（サンプル）</p>
      </div>
    </header>
    <?php
    include ($inc_path."/lib/inc/pan.php");
    ?>
    <div class="main__conts conts">
      <section class="conts__item">
        <h2 class="u-ttl_l">Web API Interface</h2>
        <p><a href="https://developer.mozilla.org/ja/docs/Web/API" target="_blank" class="u-icon__link">一覧（MDN web docs）</a></p>

        <h3 class="u-ttl_m">polyfill導入済みのナウい奴ら</h3>

        <h4 class="u-ttl_s"><a href="./_web-animations" class="u-icon__link">Web Animations APIサンプルページ</a></h4>
        <p>webアニメーションの決定版となる（なりそうな）JavaScript API。プラグイン難民から脱出すべく動作サンプルを先取り。</p>

        <h4 class="u-ttl_s"><a href="./_intersection-observer/index.php" class="u-icon__link">IntersectionObserverサンプルページ</a></h4>
        <p>要素がViewpoertに入ったか非同期に監視。軽い・快適でナウい。</p>

        <h4 class="u-ttl_s"><a href="./_pointer-events/index.php" class="u-icon__link">PointerEventsサンプルページ</a></h4>
        <p>mouseEventsとtouchEventsをpointerEventsにまとめてくれるナウいやつ。jqueryにも対応できるpolyfill導入</p>

        <h4 class="u-ttl_s"><a href="./_mutation-observer/index.php" class="u-icon__link">mutationObserverサンプルページ</a></h4>
        <p>読み方は「ミューテイション」。DOMの変化を監視するナウいやつ。</p>

      </section>
      <section class="conts__item">
        <h3 class="u-ttl_m"><a href="./_etc/index.php" class="u-icon__link">未整理サンプルページ</a></h3>
        <p>組み込み済みのJS関連中心</p>

        <h3 class="u-ttl_m"><a href="./_csv/index.php" class="u-icon__link">CSVサンプルページ</a></h3>
        <p>CSVファイルを読んでVue.jsでページネーション付きリストを表示</p>

        <h3 class="u-ttl_m"><a href="./_googlemap/index.php" class="u-icon__link">GoogleMapサンプルページ</a></h3>
        <p>埋め込みGoogleMap（APIキーなし・あり版）のサンプル</p>

        <h3 class="u-ttl_m"><a href="./_drawer/index.php" class="u-icon__link">Drawerサンプルページ</a></h3>
        <p>スムーズなドロワーメニューのサンプル</p>

      </section>
    </div>
  </article>
</main>

<?php  include ($inc_path."/lib/inc/pagetop.php"); ?>
<?php  include ($inc_path."/lib/inc/footer.php"); ?>
<?php  include ($inc_path."/lib/inc/foot.php"); ?>
