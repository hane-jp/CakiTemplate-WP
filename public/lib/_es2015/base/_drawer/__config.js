//
//iscrol

/************************
jquery-drawer
site: http://git.blivesta.com/drawer/
npm:https://www.npmjs.com/package/jquery-drawer

iscrol

***********************/


//node_module
import drawer from "jquery-drawer";

//スムーズなスクロールをサポート
import IScroll from "iscroll";
window.IScroll = IScroll;


import 'jquery-drawer/scss/drawer.scss';

//original-css
//import "./__style.scss";

//export
export default function(){
  $(function(){
    $('.drawer').drawer();
  });
};
