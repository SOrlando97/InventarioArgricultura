/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
 import Vue from 'vue';
 import VueSweetalert2 from 'vue-sweetalert2';
 import 'sweetalert2/dist/sweetalert2.min.css';
 
 require('./bootstrap');
 
 window.Vue = require('vue').default;
 
 /**
  * The following block of code may be used to automatically register your
  * Vue components. It will recursively scan this directory for the Vue
  * components and automatically register them with their "basename".
  *
  * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
  */
 
 // const files = require.context('./', true, /\.vue$/i)
 // files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
 Vue.use(VueSweetalert2);
 Vue.component('elim-cuenta', require('./components/EliminarCuenta.vue').default);
 Vue.component('contra-cuenta', require('./components/ModUsuarioContra.vue').default);
 Vue.component('new_tipo_prod', require('./components/CrearTipo_Producto.vue').default);
 Vue.component('elim_tipo_prod', require('./components/EliminarTipo_producto.vue').default);
 Vue.component('elim_producto', require('./components/EliminarProducto.vue').default);
 
 /**
  * Next, we will create a fresh Vue application instance and attach it to
  * the page. Then, you may begin adding components to this application
  * or customize the JavaScript scaffolding to fit your unique needs.
  */
 
 const app = new Vue({
     el: '#app',
 });
 