/*
name:gnav-deep_pc
desc:グロナビ下層の表示非表示（PC）
site:none(AmiTemplate-orign)
*/

//export
export default function () {

  /*---------------setting----------------*/

  //要素取得
  const deepAry = document.querySelectorAll('.gnav-deep')
  const linkAry = []
  const navAry = []
  for (let i = 0; i < deepAry.length; i++ ){
    for(const el of deepAry[i].children){
      if(el.classList.contains('gnav__link')){ linkAry[i] = el }
      if(el.classList.contains('gnav-deep__nav')){ navAry[i] = el }
    }
  }

  //要素生成
  const mq = window.matchMedia("(max-width: 666px)")

  /*---------------functions----------------*/

  //deepNavアニメーション
  const navAnime = (el,direction) => {
    return el.animate([{
      opacity: 0,
      transform:'translate3D(-50%,30px,0)',
    },{
      opacity: 1,
      transform:'translate3D(-50%,0,0)',
    }], {
      direction: direction,
      duration: 300,
      easing: 'ease',
      fill :'both',
    })
  }
  const navAnimeReset = (el,direction) => {
    return el.animate([{
      opacity: 1,
      transform:'translate3D(0,0,0)',
    },{
      opacity: 1,
      transform:'translate3D(0,0,0)',
    }], {
      duration: 1,
      fill :'both',
    })
  }

  //deepNavオープン用関数
  const visibleNavFn = (linkEl,navEl) => {
    navEl.style.display = 'block'
    linkEl.classList.add('js-active')
    navAnime(navEl,'normal').play()
  }

  //deepNavクローズ用関数
  const hideNavFn = (linkEl,navEl) => {
    linkEl.classList.remove('js-active')
    navAnime(navEl,'reverse').play()
    navAnime(navEl,'reverse').onfinish = () =>　{
      navEl.style.display = 'none'
    }
  }

  //リンク要素のクリックを禁止
  const linkClickLis = (ev) => {
    ev.preventDefault()
  }

  //リンクエンター時の処理
  const linkEnterLis = (linkEl,navEl,ev) =>{
    const isContains = ev.target.classList.contains('js-active')
    if(!isContains) visibleNavFn(linkEl,navEl)
  }

  //deep-nav要素から出たときの処理
  const deepLeaveLis = (linkEl,navEl,ev) => {
    hideNavFn(linkEl,navEl)
  }

  //ナビ要素以外をタッチしたときの処理
  const docTouchLis = (linkEl,navEl,ev) => {
    const isContains = (className) => { return ev.target.classList.contains(className) }
    if(!isContains('gnav-deep__link') && !isContains('gnav__link')){
      hideNavFn(linkEl,navEl)
    }
  }

  //リスナーに引数をbind
  const linkEnterBindLisAry = []
  const deepLeaveBindLisAry = []
  const docTouchBindLisAry = []
  for(let i = 0; i < deepAry.length; i++){
    linkEnterBindLisAry[i] = linkEnterLis.bind(null,linkAry[i],navAry[i])
    deepLeaveBindLisAry[i] = deepLeaveLis.bind(null,linkAry[i],navAry[i])
    docTouchBindLisAry[i] = docTouchLis.bind(null,linkAry[i],navAry[i])
  }


  /*---------------set&run----------------*/

  //実行内容
  const runFn = (mq) => {
    for(let i = 0; i < deepAry.length; i++){
      linkAry[i].addEventListener('pointerenter', linkClickLis)
      linkAry[i].addEventListener('pointerenter' , linkEnterBindLisAry[i])
      deepAry[i].addEventListener('mouseleave', deepLeaveBindLisAry[i])
      document.addEventListener('touchstart', docTouchBindLisAry[i])
      navAry[i].style.display = 'none'
      if (mq.matches) {
        linkAry[i].removeEventListener('pointerenter', linkClickLis)
        linkAry[i].removeEventListener('pointerenter' , linkEnterBindLisAry[i])
        deepAry[i].removeEventListener('mouseleave', deepLeaveBindLisAry[i])
        document.removeEventListener('touchstart', docTouchBindLisAry[i])
        navAry[i].style.display = 'block'
        navAnimeReset(navAry[i]).play()
      }
    }
  }

  //実行
  mq.addListener(runFn)
  runFn(mq)

};
