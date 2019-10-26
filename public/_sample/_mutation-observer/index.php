<?php
$pageTtl = "MutationObserverサンプルページ";
include ("../../function.php");
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
        <p class="main-header__desc">読み方は「ミューテイション」。DOMの変化を監視するナウいやつ。</p>
      </div>
    </header>
    <?php
    $panAry[] = array("/_sample" ,"サンプル集");
    include ($inc_path."/lib/inc/pan.php");
    ?>

    <div class="main__conts conts">

      <section class="conts__item">
        <h3 class="u-ttl_m">1. MutationObserverがつかえるブラウザかどうか確認</h3>
        <p id="caniuse">確認中</p>

        <h3 class="u-ttl_m">2. 動作確認</h3>
        <p id="test-box">テキスト内容の変更を監視しています。</p>

        <style>
        #caniuse_test{
          box-sizing: border-box;
          background-color: #eee;
          padding: 24px;
          cursor: pointer;
        }

        </style>
        <div id="caniuse_test">クリック</div>

      </section>

      <section class="conts__item">
        <h2 class="u-ttl_l">MutationObserverInit(監視オプション一覧)</h2>
        <p>Opstionにてプロパティ（対象のどの変更に反応するか）を指定できます。</p>
        <a href="https://developer.mozilla.org/ja/docs/Web/API/MutationObserver#MutationObserverInit" target="_blank" class="u-icon__link">MutationObserver - Web API インターフェイス | MDN</a>
      </section>

      <section class="conts__item">
        <h2 class="u-ttl_l">よくありそうな動作</h2>
        <h3 class="u-ttl_m">メニューバーの表示非表示を検知</h3>
				<p>と思っていたけど、css内での変化は取得できず・・・DOMの変化（例えばstyle要素などなら）もちろん取得可能。素直にresizeイベント利用しました。以下はresizeイベントを利用したサンプルです。</p>
        <p id="sample1">確認中</p>
      </section>

    </div>
  </article>
</main>

<?php  include ($inc_path."/lib/inc/pagetop.php"); ?>
<?php  include ($inc_path."/lib/inc/footer.php"); ?>
<?php  include ($inc_path."/lib/inc/foot.php"); ?>
