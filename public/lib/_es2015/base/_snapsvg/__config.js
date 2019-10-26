/************************
snap.svg
site: http://snapsvg.io/

グローバルで展開する必要があるため、imports-loaderを使って呼び出す。
npm install imports-loader -save-d
***********************/

//node_module
const Snap = require(`imports-loader?this=>window,fix=>module.exports=0!snapsvg/dist/snap.svg.js`);


export default function () {

  let $svg = $('#sample'),
  $svgMouth = Snap('#js-svg-mouth'),
  pathStart = 'M51.9 620.95L263.33 627.62L263.33 17.14L34.76 13.33L51.9 620.95Z',
  pathEnd ='M224.29 606.67L617.62 606.67L617.62 61.9L472.86 61.9L224.29 606.67Z',
  SPEED = 1000,
  EASING = mina.easeout;

  $('body').on('click',(e) =>{

    //is-activeが付いてるときremoveして元のpathに戻す
    if($(e.currentTarget).hasClass('is-active')){
      $(e.currentTarget).removeClass('is-active');
      $svgMouth.animate({d:pathStart},SPEED,EASING);
    }

    //is-activeが付いてるなかった時is-activeつけてpathを動かす
    else {
      $(e.currentTarget).addClass('is-active');
      $svgMouth.animate({d:pathEnd},SPEED,EASING);
    }

  });


};
