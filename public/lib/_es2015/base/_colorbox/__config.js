/************************
colorbox
site: http://www.jacklmoore.com/colorbox/
npm:https://www.npmjs.com/package/jquery-colorbox
***********************/

//node_module
import "jquery-colorbox";
import "jquery-colorbox/example3/colorbox.css";

//original-css
import './__style.scss';

//export
export default function() {

  $(function(){

    $(".group1").colorbox({
      rel:'group1',
      width:"90%",
      height:"90%",
      transition:"fade"
    });

    $(".group2").colorbox({
      rel:'group2',
      width:"95%",
      height:"95%",
      transition:"fade"
    });

  });

};
