/************************
layzr.js
site: https://github.com/callmecavs/layzr.js
npm:https://www.npmjs.com/package/layzr.js
***********************/

//node_module
import Layzr from 'layzr.js';

//original-css
//import './__style.scss';

//export
export default function(){

  const layzr = Layzr({
    // オプション設定
    normal: 'data-src', // 通常画像パスの設定
    retina: 'data-retina', // retina画像パスの設定
    srcset: 'data-srcset', // レスポンシブ画像パスの設定
    threshold: 0 // 読み込み位置の調整数値
  });

  layzr.on('src:after', function (element) {
    // 画像の書き換えをした後
    element.classList.add('is-show'); // クラス名を追加してみました。
  });

  document.addEventListener('DOMContentLoaded', function () {
    // update() : 対象要素の更新
    // check() : 表示範囲内にはるか確認し実行
    // handlers() : スクロール・リサイズイベント時の発火 true
    layzr.update().check().handlers(true);
  }, false);

};
