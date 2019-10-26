/************************
Swiper
site:http://idangero.us/swiper/
***********************/

//node_module
import Swiper from "swiper";
import "swiper/dist/css/swiper.css";

//original-css
import "./__style.scss";

//export
export default function(){

  var swiper = new Swiper('.swiper-container', {
    pagination: '.swiper-pagination',
    nextButton: '.swiper-button-next',
    prevButton: '.swiper-button-prev',
    slidesPerView: 1,
    paginationClickable: true,
    spaceBetween: 30,
    loop: true
  });

};
