export function sampleX() {

  const el = document.querySelector('#sample-x > .dot')

  el.style.height = '20px'
  el.style.width = '20px'
  el.style.backgroundColor = '#333'
  el.style.borderRadius = '50%'

  const frames = [
    {transform: 'translateX(0)',filter: 'blur(0)' },
    {transform: 'translateX(200px)',filter: 'blur(1px)' }
  ]

  //options - https://developer.mozilla.org/en-US/docs/Web/API/Element/animate
  const options = {
    duration: 1000,
    iterations: Infinity,
    direction: 'alternate',
    easing: 'cubic-bezier(.6, 0, 1, .6)',
    fill: 'both',
  }

  const anime__item = el.animate(frames, options)

}

export function sampleY() {

  const el = document.querySelector('#sample-y > .dot')

  el.style.height = '20px'
  el.style.width = '20px'
  el.style.backgroundColor = '#333'
  el.style.borderRadius = '50%'

  const frames = [
    {transform: 'translateY(0)',filter: 'blur(0)' },
    {transform: 'translateY(200px)',filter: 'blur(1px)' }
  ]

  //options - https://developer.mozilla.org/en-US/docs/Web/API/Element/animate
  const options = {
    duration: 1000,
    iterations: Infinity,
    direction: 'alternate',
    easing: 'cubic-bezier(.6, 0, 1, .6)',
    fill: 'both',
  }

  const anime__item = el.animate(frames, options)

}

export function sampleXY() {

  const el = document.querySelector('#sample-xy > .dot')

  el.style.height = '20px'
  el.style.width = '20px'
  el.style.backgroundColor = '#333'
  el.style.borderRadius = '50%'

  const frames = [
    {transform: 'translate(0,0)',filter: 'blur(0)' },
    {transform: 'translate(200px,200px)',filter: 'blur(1px)' }
  ]

  //options - https://developer.mozilla.org/en-US/docs/Web/API/Element/animate
  const options = {
    duration: 1000,
    iterations: Infinity,
    direction: 'alternate',
    easing: 'cubic-bezier(.6, 0, 1, .6)',
    fill: 'both',
  }

  const anime__item = el.animate(frames, options)

}

export function sampleR() {

  const el = document.querySelector('#sample-r > .dot')

  el.style.height = '20px'
  el.style.width = '20px'
  el.style.backgroundColor = '#333'
  el.style.borderRadius = '50%'
  el.style.transformOrigin = '50px 50px'
  el.style.position = 'relative'
  el.style.top = '50px'
  el.style.left = '50px'

  const frames = [
    {transform: 'rotate(0deg)',filter: 'blur(0)' },
    {transform: 'rotate(360deg)',filter: 'blur(1px)' }
  ]

  //options - https://developer.mozilla.org/en-US/docs/Web/API/Element/animate
  const options = {
    duration: 1000,
    iterations: Infinity,
    direction: 'normal',
    easing: 'cubic-bezier(.53,.3,.53,.79)',
    fill: 'both',
  }

  const anime__item = el.animate(frames, options)

}


export function sampleTest() {

  let box = document.getElementById('sample-test')

  for (let i = 0; i < 10; i = i +1){
    let item = document.createElement('div')
    item.classList.add('dot')
    box.appendChild(item)
  }

  const els = document.querySelectorAll('#sample-test > .dot')

  for (const el of els){
    let num = Math.random()
    let i = (Math.random()*2)-1
    let color = (Math.random() * 0xFFFFFF | 0).toString(16)
    el.style.height = (100*num) + 'px'
    el.style.width = (100*num) + 'px'
    el.style.backgroundColor = '#333'
    el.style.borderRadius = '50%'
    el.style.transformOrigin = (150*i) + 'px'
    el.style.position = 'absolute'
    el.style.top = '50%'
    el.style.left = '50%'
    el.style.opacity = num
    el.style.boxShadow = '0 2px 40px ' + "#" + ("000000" + color).slice(-6)
    el.style.backgroundColor = "#" + ("000000" + color).slice(-6)

  }

  const frames = [
    {transform: 'rotate(0deg)',filter: 'blur(0)' },
    {transform: 'rotate(360deg)',filter: 'blur(1px)' }
  ]

  for(const el of els){
    let max = 1.2
    let min = 0.2
    let i = Math.floor( Math.random() * (max + 1 - min) ) + min ;
    el.animate(frames, {
      duration: (5000*i),
      iterations : Infinity,
      direction: 'normal',
      easing: 'cubic-bezier(.53,.3,.53,.79)',
      fill: 'both',
    })
  }
}

