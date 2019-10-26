/*
name:touch-hover
desc:タッチデバイスでhover利用を可能に
site:none(AmiTemplate-orign)
*/

//export
export default function () {

  /*---------------setting----------------*/

  //要素取得
  const ancerEls = document.querySelectorAll('a')
  const labelEls = document.querySelectorAll('label')
  const buttonEls = document.querySelectorAll('button')

  //要素生成
  const elsAry = [ancerEls,labelEls,buttonEls]

  /*---------------functions----------------*/

  //マウスが入った時
  const enterLis = (ev) => {
    ev.target.classList.add('touch')
    // console.log(ev.target + 'touch')
  }

  //マウスが外れた時
  const leaveLis = (ev) => {
    ev.target.classList.remove('touch')
    // console.log(ev.target + 'remove-touch')
  }

  /*---------------set&run----------------*/

  //初回表示時
  const setFn = (el) => {
    el.setAttribute('touch-action','pan-y')
  }

  //実行内容
  const runFn = () => {
    for(const els of elsAry){
      for (const el of els){
        setFn(el)
        el.addEventListener('touchstart', enterLis)
        el.addEventListener('touchend', leaveLis)
      }
    }
  }
  //実行
  runFn()
}
