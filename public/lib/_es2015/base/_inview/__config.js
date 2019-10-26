/************************
inview
site: https://github.com/protonet/jquery.inview
npm:https://www.npmjs.com/package/jquery-inview
***********************/

//node_module
import inView from "jquery-inview";

//original-css
import './__style.scss';

//export
export default function(){

  $('.inview-target').on('inview', function(event, isInView) {
    if (isInView) {
      $(this).addClass('inview');
    } else {
      $(this).removeClass('inview');
    }
  });

};
