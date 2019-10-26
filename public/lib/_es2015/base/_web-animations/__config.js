/************************
Web Animations API
つかい方：http://defghi1977.html.xdomain.jp/tech/webanim/webanim.htm
polyfill：https://www.npmjs.com/package/web-animations-js
***********************/

//caniuse
export function caniuse() {

  const el = document.getElementById('caniuse');

  if (Modernizr.webanimations) {
    // supported
    el.innerHTML = 'つかえるよ';
  } else {
    // not-supported
    el.innerHTML = 'つかえないよ';
  }

};

//polyfill-test
export function caniuse_polyfill() {

  const el = document.getElementById('caniuse_polyfill');
  const el__btn_play = document.getElementById('caniuse_polyfill__btn_play');
  const el__btn_pause = document.getElementById('caniuse_polyfill__btn_pause');

  // Element.animateにアニメーションの内容を渡して実行する
  const item = el.animate({
    opacity: [0.5, 1],
    transform: ['scale(0.5)', 'scale(1)'],
  }, {
    direction: 'alternate',
    duration: 1000,
    iterations: Infinity,
  });

  item.cancel();

  el__btn_play.addEventListener("pointerdown", function(ev) {
    item.play();
  });

  el__btn_pause.addEventListener("pointerdown", function(ev) {
    item.pause();
  });

};


//sample
export function sample1() {

  const el = document.getElementById('sample1');

  // Element.animateにアニメーションの内容を渡して実行する
  const item = el.animate({
    opacity: [0, 1],
    transform: ['translateY(30px)', 'translateY(0)'],
    backgroundColor:['yellow','red'],
  }, {
    direction: 'normal',
    duration: 1000,
    endDelay:1000,
    iterations: Infinity,
    iterations:2.5,
    fill:'forwards'
  });

  item.cancel();

  el.addEventListener("pointerdown", function(ev) {
    item.play();
  });

};
