
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import moment from 'moment'
import VueProgressBar from 'vue-progressbar'
import swal from 'sweetalert2'


import VueRouter from 'vue-router'
import { Form, HasError, AlertError } from 'vform'
window.Form = Form;
window.swal = swal;

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

Vue.use(VueRouter)

let routes = [
  { path: '/dashboard', component: require('./components/Dashboard.vue') },
  { path: '/profile', component: require('./components/Profile.vue') },
  { path: '/users', component: require('./components/Users.vue') },
  { path: '/home', component: require('./components/home.vue') },//this will work as default route

]


const router = new VueRouter({
	mode:'history', 
  routes // short for `routes: routes`
})

Vue.filter('capitalize',function(text){
	return text.charAt(0).toUpperCase() + text.slice(1)
});

//npm install moment --save and import it to top
Vue.filter('datefilter',function(date){
	return moment().format('MMMM Do YYYY');
	//return moment().format('LLLL');
});

//vue progress bar // npm install vue-progressbar
Vue.use(VueProgressBar, {
  color: 'rgb(143, 255, 199)',
  failedColor: 'red',
  height: '50px'
})


//adding Toaster notification
const toast = swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
});
window.toast = toast;

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app',
    router
});
