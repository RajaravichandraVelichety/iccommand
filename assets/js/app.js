require('../css/app.scss')
require('./bootstrap')

// $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
// });

$(document).ready(function() {
    $('[data-toggle="popover"]').popover()

    // Set active main nav class
    let urlPath = window.location.pathname
    $('#iccommand-mainnav-container li.nav-item').each(function(index){
      // Match a path where the urlPath at least starts with this nav item's path
      let urlPathRegExp = new RegExp('^' + $('a', this).attr('href') + '*?')
      if(urlPathRegExp.test(urlPath)){
        $(this).addClass('active')
      } else {
        $(this).removeClass('active')
      }
    })
});

/** VUE SETUP **/
import Vue from 'vue'
import VeeValidate from 'vee-validate'
import PrettyCheckbox from 'pretty-checkbox-vue'

Vue.use(VeeValidate)
Vue.use(PrettyCheckbox)

/** DECLARE COMPONENTS HERE **/
Vue.component('home-page', require('./components/Homepage.vue').default)
Vue.component('admin-user-index', require('./components/admin/UserIndex.vue').default)
Vue.component('admin-user-manage', require('./components/admin/UserManage.vue').default)
Vue.component('map-index', require('./components/map/MapIndex.vue').default)
Vue.component('new-map-item', require('./components/map/NewMapItem.vue').default)
Vue.component('map-item-form', require('./components/map/MapItemForm.vue').default)

/** VUE APP **/
const app = new Vue({
    el: '#app',
});
