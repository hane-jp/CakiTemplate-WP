/*
name:pagetop
desc:ページトップへ移動ボタンの表示表示
site:none(AmiTemplate-orign)
*/

//original-css
import './__style.scss';

//export
export default function() {

  /*---------------setting----------------*/

  //要素取得
  const pagetopEl = document.querySelector('.pagetop')

  //初期設定
  let App // = App || {}
  App = {
    amount : 300, //表示位置
    flag : false, //表示の真偽値
    y : () => { return window.scrollY },
  }

  /*---------------functions----------------*/

  //visible/hideアニメーション
  const fadeAnime = (direction) => {
    return pagetopEl.animate([{
      transform: 'translateY(80px)',
      opacity: '0',
    },{
      transform: 'translateY(0)',
      opacity: '1',
    }],{
      direction: direction,
      duration: 300,
      easing: 'ease-out',
      fill: 'both',
    })
  }

  //visible/hideコントロール
  const visibleFn = () => {
    App.flag = true
    pagetopEl.style.display = 'block'
    fadeAnime('normal').play()
  }
  const hideFn = () => {
    App.flag = false
    fadeAnime('reverse').play()
    fadeAnime('reverse').onfinish = () => {
      if(!App.flag) pagetopEl.style.display = 'none'
    }
  }

  //スクロール時の処理
  let timerId
  const scrollLis = (ev) => {
    if(timerId) return
    timerId = setTimeout(() => {
      timerId = null
      if(App.y() > App.amount && !App.flag) visibleFn()
      if(App.y() <= App.amount && App.flag) hideFn()
    },300)
  }

  /*---------------set&run----------------*/

  //初回表示時
  const setFn = () => {
    pagetopEl.style.display = 'none'
    pagetopEl.style.transform = 'translateY(80px)'
    pagetopEl.style.opacity = '0'
    if(App.y() > App.amount) visibleFn()
  }

  //実行内容
  const runFn = () => {
    document.addEventListener('scroll',scrollLis)
  }

  //実行
  setFn()
  runFn()

};