/************************
Vue
site: https://jp.vuejs.org/
***********************/

//node_module
import Vue from 'Vue';

//export
export default function () {

  var app = new Vue({
    el: '#app',
    data: {
      message: 'Hello Vue!'
    }
  })

};
