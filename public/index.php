<?php
$pageTtl = "トップ";
include ("function.php");
$metaTtl = $siteName;
$metaDesc = $siteDescription;
$body_class ="home";
include ($inc_path."/lib/inc/head-home.php");
include ($inc_path."/lib/inc/header.php");
?>

<main class="main">
  <article class="main__row">
    <div class="main__conts conts">

      <section class="conts__item">
        <h2 class="u-ttl_l">本サイトは・・・</h2>
        <p>CakiTemplate-PHPのサンプルです。</p>
        <p>普段使っている中規模サイト制作用の雛形。LAMP環境構築から、gulp、scss、webpackを使ったes2015(JavaScript)の管理などなど…。ベストとは言えないけどベターなプラクティスをもとめて随時更新。</p>

        <h3 class="u-ttl_m">情報</h3>
        <p>現在作成中につきベースになっているAmiTemplateの情報を参照してください。</p>
        <ul class="u-list__ul">
          <li><a href="https://github.com/amishiro/AmiTemplate-PHP" target="_blank" class="u-icon__link">GitHub</a></li>
          <li><a href="https://github.com/amishiro/AmiTemplate-PHP/releases" target="_blank" class="u-icon__link">リリース情報</a></li>
        </ul>

        <h3 class="u-ttl_m">各種レイアウト</h3>
        <p><a href="<?php echo $base_url; ?>/_layout/" class="u-icon__link">こちら</a></p>

        <h3 class="u-ttl_m">各種サンプル</h3>
        <p><a href="<?php echo $base_url; ?>/_sample/" class="u-icon__link">こちら</a></p>

        <h3 class="u-ttl_m">スタイルガイド</h3>
        <p><a href="<?php echo $base_url; ?>/_styleguide/" target="_blank" class="u-icon__link">こちら</a></p>

      </section>
    </div>
  </article>
</main>

<?php  include ($inc_path."/lib/inc/pagetop.php"); ?>
<?php  include ($inc_path."/lib/inc/footer.php"); ?>
<?php  include ($inc_path."/lib/inc/foot.php"); ?>
