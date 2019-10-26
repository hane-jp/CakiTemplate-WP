//original-css
import "./__main-v.scss";

export default function(){

  window.addEventListener('load',()=>{
    setTimeout(()=>{
      const el = document.querySelector('.main-v__item')
      el.classList.add('active')
    },2000)
  })

}
