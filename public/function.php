<?php

#1) [ $base_url ]を、ディレクトリ構成に合わせて修正してください
// $base_url = str_replace($_SERVER['DOCUMENT_ROOT'], '', dirname(__FILE__));
$base_url = get_template_directory_uri();

#2) 開発環境に合わせて、エラーハンドリングしてください
ini_set('display_errors', 1);

#3）開発環境に合わせて、サーバーのフルパスを取得してください
$inc_path = (dirname(__FILE__));

#-------- html関連 -------#

include ($inc_path."/lib/functions/htmlMetas.php");
include ($inc_path."/lib/functions/htmlLinks.php");
include ($inc_path."/lib/functions/htmlBodyClass.php");

?>
