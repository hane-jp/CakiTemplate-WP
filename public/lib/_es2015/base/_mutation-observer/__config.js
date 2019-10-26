/************************
mutationObserver

MutationObserverについて:http://okakacacao.wpblog.jp/technology/mutation-observer
つかい方例:https://qiita.com/munieru_jp/items/a6f1433652124a2165e4
ブラウザ対応状況:https://caniuse.com/#feat=mutationobserver
polyfillはとくにいらない
***********************/

//caniuse
export function caniuse() {
  const el = document.getElementById('caniuse');
  if (Modernizr.mutationobserver) {
    el.innerHTML = 'つかえるよ';
  } else {
    el.innerHTML = 'つかえないよ';
  }
};

//test
export function caniuse_polyfill() {

  //監視ターゲットの取得
  const el = document.getElementById("caniuse_test");

  //オブザーバーの作成
  const observer = new MutationObserver(ev => {

    console.log(ev);

    //表示確認用
    const el = document.getElementById('test-box');
    el.innerHTML = "変更を監視してました。要素追加されたでしょ？";
    el.animate([
      {opacity : '1'},
      {opacity : '1'},
      {opacity : '0'}
    ], {
      direction: 'alternate',
      duration: 2000,
      fill:'forwards'
    });

  });

  //監視オプションの作成
  //監視プションの一覧：https://developer.mozilla.org/ja/docs/Web/API/MutationObserver#MutationObserverInit
  const options = {
    childList : true
  };

  //監視の開始
  observer.observe(el, options);

  //----

  let i = 0;
  el.addEventListener("pointerdown", function(ev) {
    i ++;
    let item = document.createElement('p');
    item.textContent = '要素追加：'+i;
    this.appendChild(item);
  });

};

//sample1
export function sample1() {

};


//sample2
export function sample2() {

  const chackEl__display_Fn = () => {
    const menubarEl = document.querySelector('.menubar');
    const menubarEl__diplay = document.defaultView.getComputedStyle(menubarEl ,null).display;
    const el = document.getElementById('sample1');
    if(menubarEl__diplay == 'none'){
      el.innerHTML = "表示されてませんよ";
    }else{
      el.innerHTML = "表示されてるよ";
    }
  };

  const resizeEnd = fn => {
    let timer = 0;
    window.onresize = () => {
      if (timer > 0) {
        clearTimeout(timer);
      }
      timer = setTimeout(() => {
        fn(); //ここに処理の内容が入る
      }, 200);
    };
  }

  chackEl__display_Fn();
  resizeEnd(chackEl__display_Fn);

};
