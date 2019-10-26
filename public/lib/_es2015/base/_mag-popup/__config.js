/************************
magnific-popup
site: http://dimsemenov.com/plugins/magnific-popup/
npm:https://www.npmjs.com/package/magnific-popup

※ajax表示使用不可_エラーが出力されます。
※有料だけどおすすめ高機能ライトボックス↓
※https://sachinchoolur.github.io/lightgallery.js/
※npm i -d lightgallery.js
***********************/

//node_module
import "magnific-popup";
import "magnific-popup/dist/magnific-popup.css";

//original-css
import './__style.scss';

//export
export default function() {

  $('.mfp-btn').magnificPopup({
    type:'inline',
    fixedContentPos: false,
    fixedBgPos: true,
    overflowY: 'auto',
    closeBtnInside: true,
    preloader: false,
    midClick: true,
    removalDelay: 300,
    mainClass: 'mfp-slide_bottom'
  });

};
