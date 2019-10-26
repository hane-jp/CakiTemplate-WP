<?php
$pageTtl = "CSVサンプルページ";
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
        <p class="main-header__desc">CSVファイルを読んでVue.jsでページネーション付きリストを表示</p>
      </div>
    </header>
    <?php
    $panAry[] = array("/_sample" ,"サンプル集");
    include ($inc_path."/lib/inc/pan.php");
    ?>
    <div class="main__conts conts">

      <section class="conts__item">
        <h2 class="u-ttl_l">表示速度確認サンプル</h2>
        <ul class="u-list__ul">
          <li>仕様CSVは【<a href="http://jusyo.jp/" target="_blank" class="u-icon__link">住所.jp</a>】から埼玉住所をダウンロード（3643件）</li>
          <li>Ajaxで非同期通信</li>
        </ul>
      </section>

      <section class="conts__item" id="app">
        <h2 class="u-ttl_l">リスト表示</h2>

        <div id="csv_output">CSVファイルを読み込み中</div>

        <nav>
          <ul class="u-pagination mb3">
            <li class="u-pagination__item">
              <label @click="first" class="u-pagination__link_first"><span>&laquo;</span></label>
            </li>
            <li class="u-pagination__item">
              <label @click="prev" class="u-pagination__link_prev"><span>&lt;</span></label>
            </li>
            <li class="u-pagination__item" v-for="i in displayPageRange" :class="{active: i-1 === currentPage}">
              <label @click="pageSelect(i)" class="u-pagination__link">{{ i }}</label>
            </li>
            <li class="u-pagination__item">
              <label @click="next" class="u-pagination__link_next"><span>&gt;</span></label>
            </li>
            <li class="u-pagination__item">
              <label @click="last" class="u-pagination__link_last"><span>&raquo;</span></label>
            </li>
          </ul>
        </nav>

        <table class="u-table">
          <colgroup>
            <col span="22" style="width:4%;">
          </colgroup>
          <thead>
            <tr v-for="(line,index) in displayItems"  v-if="index < 1" class="u-table_th">
              <th v-for="(value, key,index) in line">{{ key }}</th>
            </tr>
          </thead>
          <tr v-for="line in displayItems">
            <td v-for="(value, key, index) in line" v-bind:data-label="key">{{ value }}</td>
          </tr>
        </table>

      </section>
    </div>
  </article>
</main>

<?php  include ($inc_path."/lib/inc/pagetop.php"); ?>
<?php  include ($inc_path."/lib/inc/footer.php"); ?>
<?php  include ($inc_path."/lib/inc/foot.php"); ?>
