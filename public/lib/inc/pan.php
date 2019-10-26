<div class="pan">
  <ul class="pan__row" itemscope itemtype="http://data-vocabulary.org/Breadcrumab">
    <li class="pan__item_home"><a href="<?php echo $base_url; ?>/" itemprop="url"><span itemprop="title"><?php echo $siteName; ?> ホーム</span></a></li>
    <?php

    //パンくずに階層がある場合は、設置箇所に以下を記述する
    //$panAry[] = array("/test/url/index.php","パンくず名");
    //$panAry[] = array("/test/url/index2.php","パンくず名2");
    if(!empty($panAry)){
      foreach ($panAry as $key => $value){
        echo '<li class="pan__item"><a href="'.$base_url.$panAry[$key][0].'" itemprop="url"><span itemprop="title">'.$panAry[$key][1].'</span></a></li>';
        echo (PHP_EOL);
      }
    };

    ?>
    <li class="pan__item_thispage"><a href="#" itemprop="url"><span itemprop="title"><?php echo $pageTtl; ?></span></a></li>
  </ul>
</div>
