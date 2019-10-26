<?php
$pageTtl = "PointerEventsサンプルページ";
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
        <p class="main-header__desc">mouseEventsとtouchEventsをpointerEventsにまとめてくれるナウいやつ。mouse/touch/pointerの動作表付き。</p>
      </div>
    </header>
    <?php
    $panAry[] = array("/_sample" ,"サンプル集");
    include ($inc_path."/lib/inc/pan.php");
    ?>

    <div class="main__conts conts">

      <section class="conts__item">
        <h3 class="u-ttl_m">1. PointerEventsがつかえるブラウザかどうか確認</h3>
        <div id="caniuse">確認中</div>
        <h3 class="u-ttl_m">2. polyfillでつかえるようになったか確認</h3>
        <div id="caniuse_polyfill" touch-action="none">クリックしてね</div>
        <div class="u-assist mt3">
          <h5 class="u-ttl_s">注意</h5>
          <p>polyfill利用時は、該当箇所に「touch-action="xxx"」のdata属性をつけること。</p>
        </div>
      </section>

      <section class="conts__item">
        <h2 class="u-ttl_l">対応表</h2>
        <table class="u-table">
          <thead>
            <tr>
              <th>マウス</th>
              <th>タッチ</th>
              <th>総合（ポインタ）</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td data-label="マウス">mousedown</td>
              <td data-label="タッチ">touchstart</td>
              <td data-label="ポインタ">pointerdown</td>
            </tr>
            <tr>
              <td data-label="マウス">mouseenter</td>
              <td data-label="タッチ">touchenter</td>
              <td data-label="ポインタ">pointerenter</td>
            </tr>
            <tr>
              <td data-label="マウス">mouseleave</td>
              <td data-label="タッチ">touchleave</td>
              <td data-label="ポインタ">pointerleave</td>
            </tr>
            <tr>
              <td data-label="マウス">mousemove</td>
              <td data-label="タッチ">touchmove</td>
              <td data-label="ポインタ">pointermove</td>
            </tr>
            <tr>
              <td data-label="マウス">mouseout</td>
              <td data-label="タッチ">-</td>
              <td data-label="ポインタ">pointerout</td>
            </tr>
            <tr>
              <td data-label="マウス">mouseover</td>
              <td data-label="タッチ">-</td>
              <td data-label="ポインタ">pointerover</td>
            </tr>
            <tr>
              <td data-label="マウス">mouseup</td>
              <td data-label="タッチ">touchend</td>
              <td data-label="ポインタ">pointerup</td>
            </tr>
            <tr>
              <td data-label="マウス">-</td>
              <td data-label="タッチ">touchcancel</td>
              <td data-label="ポインタ">pointercancel</td>
            </tr>
          </tbody>
        </table>
      </section>

      <section class="conts__item">
        <h2 class="u-ttl_l">:hoverに近い動作のテスト</h2>
        <style>
        #enter-test{
          height: 100px;
          text-align: center;
        }
        </style>
        <div id="enter-test" touch-action="pan-y">pointerenter / pointerleave</div>
      </section>

      <section class="conts__item">
        <h2 class="u-ttl_l">a/labelタグのサンプル</h2>
        <style>
        .enter-test-anchor{
          display: block;
          height: 100px;
          text-align: center;
          background-color:#eee;
        }
        </style>
        <a href="#all" class="enter-test-anchor" data-scroll>aタグ</a>
        <br>
        <label class="enter-test-anchor">labelタグ</label>
      </section>

    </div>
  </article>
</main>

<?php  include ($inc_path."/lib/inc/pagetop.php"); ?>
<?php  include ($inc_path."/lib/inc/footer.php"); ?>
<?php  include ($inc_path."/lib/inc/foot.php"); ?>
