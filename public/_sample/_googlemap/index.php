<?php
$pageTtl = "GoogleMapサンプルページ";
include ("../../function.php");
$metaTtl = $pageTtl."-".$siteName;
$metaDesc = $siteDescription;
$body_class ="csv";
include ($inc_path."/lib/inc/head.php");
include ($inc_path."/lib/inc/header.php");
?>

<main class="main">
  <article class="main__row">

    <header class="main__header main-header">
      <div class="main-header__bg"></div>
      <div class="main-header__row">
        <h1 class="main-header__ttl"><?php echo $pageTtl; ?></h1>
        <p class="main-header__desc">埋め込みGoogleMap（APIキーなし・あり版）のサンプル</p>
      </div>
    </header>
    <?php
    $panAry[] = array("/_sample" ,"サンプル集");
    include ($inc_path."/lib/inc/pan.php");
    ?>

    <div class="main__conts conts">

      <section class="conts__item">
        <h2 class="u-ttl_l">APIキーなし</h2>
        <p><a href="https://www.google.co.jp/maps" target="_blank" class="u-icon__link">GoogleMapサイト</a>を利用してiframeで埋め込み</p>

        <h3 class="u-ttl_m">レスポンシブWEBデザイン対応</h3>

        <div class="u-iframe" style="height:400px">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3241.747975468364!2d139.74324421590788!3d35.65858048019972!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188bbd9009ec09%3A0x481a93f0d2a409dd!2z5p2x5Lqs44K_44Ov44O8!5e0!3m2!1sja!2sjp!4v1510970880621" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>

      </section>

      <section class="conts__item">
        <h2 class="u-ttl_l">APIキーあり</h2>
        <h3 class="u-ttl_m">事前にAPIキーを準備</h3>
        <ul class="u-list__ul mb2">
          <li>Googleアカウントを使い<a href="https://console.cloud.google.com/" target="_blank" class="u-icon__link"><b>Google API Console</b></a>で<b>プロジェクト</b>を作成（<b>AmiTemplate-project</b>みたいにプロジェクト名とかサイト名とか）。</li>
          <li><b>APIとサービス > 承認情報</b>から承認情報を作成して、APIキーを発行。</li>
          <li><b>APIとサービス > ライブラリ</b>から利用するAPI(Google Maps Embed APIなど)を有効化。</li>
          <li>仕事で利用する場合は不正使用や割り当ての盗用を防止するために<b>APIとサービス > 承認情報</b>から<b>キーの制限</b>を行なうこと。</li>
        </ul>
        <div class="u-assist">
          <h3 class="u-ttl_s">キーの制限について</h3>
          <ul class="u-list__ul">
            <li><b>キーの制限　> アプリケーションの制限</b><br>APIキーを使用できるウェブサイト、IP アドレス、またはアプリを指定。</li>
            <li><b>キーの制限　> APIの制限</b><br>APIキーで呼び出すことができるAPIを制限。</li>
          </ul>
        </div>


        <h3 class="u-ttl_m">Google Maps Embed API</h3>
        <p>Google Maps Embed API に使用制限はないが細かな調整はできない。<a href="https://developers.google.com/maps/documentation/embed/start?hl=ja" target="_blank" class="u-icon__link">クイック スタート マップの作成</a>を利用して、対象操作（表示方法）を選んでiframeで埋め込み。（<a href="https://developers.google.com/maps/documentation/embed/?hl=ja" target="_blank" class="u-icon__list">チュートリアルとドキュメント</a>リンク。）</p>

        <h4 class="u-ttl_s">サンプル：運転ルートを表示する</h4>
        <div class="u-iframe" style="height:400px">
          <iframe width="600" height="450" frameborder="0" style="border:0"
          src="https://www.google.com/maps/embed/v1/directions?origin=東京タワー&destination=place_id:ChIJC6JR8NaOGGARgfRN9Cf9cEc&key=AIzaSyAwM3YlNU_nPJaQyg_wPkiDsdkvBOEQVmU" allowfullscreen></iframe>
        </div>

        <h3 class="u-ttl_m">Google Maps JavaScript API</h3>
        <p>使いすぎると<b>課金が発生</b>するので事前に<a href="https://developers.google.com/maps/documentation/javascript/usage" target="_blank" class="u-icon__link">Google Maps JavaScript API の使用制限</a>を確認すること。</p>
        <p>使い方は、<a href="https://developers.google.com/maps/documentation/javascript?hl=ja" target="_blank" class="u-icon__link">チュートリアルとドキュメント</a>を参照。</p>

        <div class="u-assist">

          <ul class="u-list__ul">
            <li>
              npm: <a href="https://www.npmjs.com/package/load-google-maps-api-2" target="_blank" class="u-icon__link">load-google-maps-api-2</a>
            </li>
            <li>
              googleMap-styles: <a href="https://mapstyle.withgoogle.com/" target="_blank" class="u-icon__link">スタイルジェネレーター</a>
            </li>
            <li>
              googleMap-maker: <a href="https://developers.google.com/maps/documentation/javascript/markers?hl=ja" target="_blank" class="u-icon__link">マーカーについて</a>
            </li>
            <li>
              googleMap-infowindow: <a href="https://developers.google.com/maps/documentation/javascript/infowindows?hl=ja" target="_blank" class="u-icon__link">情報ウィンドウについて</a>
            </li>
          </ul>
        </div>

        <h4 class="u-ttl_m">サンプル：デザインを入れたバージョン</h4>

        <div id="map" style="height:400px;"></div>

      </section>
    </div>
  </article>
</main>

<?php  include ($inc_path."/lib/inc/pagetop.php"); ?>
<?php  include ($inc_path."/lib/inc/footer.php"); ?>
<?php  include ($inc_path."/lib/inc/foot.php"); ?>
