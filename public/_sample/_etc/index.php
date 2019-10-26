<?php
$pageTtl = "未整理サンプルページ";
include ("../../function.php");
$metaTtl = $pageTtl."-".$siteName;
$metaDesc = $siteDescription;
$body_class ="vue";
include ($inc_path."/lib/inc/head.php");
include ($inc_path."/lib/inc/header.php");
?>

<main class="main">
  <article class="main__row">

    <header class="main__header main-header">
      <div class="main-header__bg"></div>
      <div class="main-header__row">
        <h1 class="main-header__ttl"><?php echo $pageTtl; ?></h1>
        <p class="main-header__desc">組み込み済みのJSプラグイン中心</p>
      </div>
    </header>
    <?php
    $panAry[] = array("/_sample" ,"サンプル集");
    include ($inc_path."/lib/inc/pan.php");
    ?>

    <div class="main__conts conts">

      <section class="conts__item main-v">
        <div class="main-v__row">
          <figure class="main-v__item">
            <img
            data-src="<?php echo $base_url; ?>/lib/img/dummy/golden.png"
            data-retina="<?php echo $base_url; ?>/lib/img/dummy/golden@2x.png"
            alt="dummy"
            class="u-img__max">
          </figure>
          <p class="main-v__desc">数秒後メインビジュアル用の画像が表示されます</p>
        </div>
      </section>

      <section class="conts__item">
        <h2 class="u-ttl_l">inview</h2>
        <p>site: https://github.com/protonet/jquery.inview</p>
        <p class="inview-target">画面内に入ると、classにinviewが追加されます。</p>
      </section>

      <section class="conts__item">
        <h2 class="u-ttl_l">colorbox</h2>
        <p>site: http://www.jacklmoore.com/colorbox/</p>
        <p><a class="group1" href="<?php echo $base_url; ?>/lib/img/dummy/platinum.png" title="画像タイトル１">Grouped Photo 1</a></p>
        <p><a class="group1" href="<?php echo $base_url; ?>/lib/img/dummy/platinum.png" title="画像タイトル２">Grouped Photo 2</a></p>
        <p><a class="group1" href="<?php echo $base_url; ?>/lib/img/dummy/platinum.png" title="画像タイトル３">Grouped Photo 3</a></p>
      </section>

      <section class="conts__item">
        <h2 class="u-ttl_l">magnific-popup</h2>
        <p>site: http://dimsemenov.com/plugins/magnific-popup/<br>ajax表示使用不可_エラーが出力されます。</p>
        <a class='mfp-btn' href="#inline_content">Click Me (Inline HTML）</a>
        <div id='inline_content' class="mfp-dialog mfp-hide">
          <img
          data-src="<?php echo $base_url; ?>/lib/img/dummy/bronze.png"
          data-retina="<?php echo $base_url; ?>/lib/img/dummy/bronze@2x.png"
          alt="dummy"
          class="u-img__max">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores repudiandae, nihil consectetur dignissimos facere, ipsa recusandae. Enim possimus distinctio, vel voluptatibus amet velit nisi iste quisquam tempore voluptates, doloremque impedit.</p>
        </div>
      </section>


      <section class="conts__item main-item">
        <h2 class="u-ttl_l">Swiper</h2>
        <p>site:http://idangero.us/swiper/</p>
        <div class="swiper-container">
          <div class="swiper-wrapper">
            <div class="swiper-slide">Slide 1</div>
            <div class="swiper-slide">Slide 2</div>
            <div class="swiper-slide">Slide 3</div>
            <div class="swiper-slide">Slide 4</div>
            <div class="swiper-slide">Slide 5</div>
            <div class="swiper-slide">Slide 6</div>
            <div class="swiper-slide">Slide 7</div>
            <div class="swiper-slide">Slide 8</div>
            <div class="swiper-slide">Slide 9</div>
            <div class="swiper-slide">Slide 10</div>
          </div>
          <!-- Add Pagination -->
          <div class="swiper-pagination"></div>
          <!-- Add Arrows -->
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
        </div>
      </section>

      <section class="conts__item main-item">
        <h2 class="u-ttl_l">Vue</h2>
        <p>site: https://jp.vuejs.org/</p>
        <p>以下{{ message }}はVueで出力されています。</p>
        <div id="app">
          {{ message }}
        </div>
      </section>

    </div>
  </article>
</main>

<?php  include ($inc_path."/lib/inc/pagetop.php"); ?>
<?php  include ($inc_path."/lib/inc/footer.php"); ?>
<?php  include ($inc_path."/lib/inc/foot.php"); ?>
