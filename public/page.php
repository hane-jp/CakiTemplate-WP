<?php
//base
include ("function.php");
$pageTtl = get_the_title();

//meta
$metaTtl = $pageTtl."-".$siteName;
$metaDesc = $siteDescription;
$class = $body_class." ".$mydir." ".$filename;
$body_class ="";
$metaThum = '';

//htmlHeader
include ($inc_path."/lib/inc/head.php");
include ($inc_path."/lib/inc/header.php");
?>
<main class="main">
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
		<?php if(have_posts()): while(have_posts()): the_post(); ?>
		<?php the_content(); ?>
		<?php endwhile; endif; ?>
	</div>
</main>
<?php  include ($inc_path."/lib/inc/pagetop.php"); ?>
<?php  include ($inc_path."/lib/inc/footer.php"); ?>
<?php  include ($inc_path."/lib/inc/foot.php"); ?>
