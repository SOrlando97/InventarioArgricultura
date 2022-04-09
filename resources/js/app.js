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

//se busca el button con id btnstartscan para su uso futuro
const btnstartscanQR = document.getElementById('btnstartscan')
//se busca el button con id btnendscan para su uso futuro
const btnendscanQR = document.getElementById('btnendscan')
//se crea variable global scanner
var scanner =""
//se agrega al button con id btnstartscan un eventlistener, que se acciona haciendo click en el
btnstartscanQR.addEventListener('click',()=>{
	//variable scanner tomara lo que hay en la etiqueta video con id "preview", escaneara cada 1 frame, y no escaneara en segundo plano
	scanner = new Instascan.Scanner({ video: document.getElementById('preview'), scanPeriod: 1, mirror: false, backgroundScan: false });
	//se añade un Listener al escaner, en cuanto detecta un codigo qr lo decodifica y pone su resultado en la constante content
    scanner.addListener('scan',function(content){
		//Se redirige a la pagina que muestra el codigo QR
        window.location.href = content;
    });
	/** 
	 * se añade una funcion de la libreria instascan que toma todas las camaras disponibles del dispositivo,
	 * y revisa si este tiene una o mas de una camara, de ser asi activa una de ellas
	 * si el dispositivo solo tiene una camara se activa esa, si tiene mas de 1 se activa la segunda camara
	 * que en dispositivos mobiles tiende a ser la camara trasera
	 */
    Instascan.Camera.getCameras().then(function (cameras){
        if(cameras.length>1){
            scanner.start(cameras[1]);      
        }else if(cameras.length=1) {
          scanner.start(cameras[0]); 
            }
	//si no hay camaras tira un error donde no se encontraron camaras
    }).catch(function(e){
        alert('No se encontraron camaras disponibles');
    });
})
//se agrega al button con id btnendscan un eventlistener, que se acciona haciendo click en el
// en este se detiene cualquier escaneo y se apagan las camaras
btnendscanQR.addEventListener('click',()=>{
	scanner.stop()
})
//constante li, que sera igual a las etiquetas li dentro del html
const li = document.querySelectorAll('.li')
//constante opcion, que sera igual a las etiquetas div dentro del html que contienen las pestñas
const opcion = document.querySelectorAll('.opciones')
//ciclo por cada etiqueta li realiza una accion, añade un eventlistener y remueve todas las clases de css llamadas "activo"
li.forEach((cadaLi, i)=>{
	li[i].addEventListener('click',()=>{

		li.forEach((cadali,i)=>{
			li[i].classList.remove('activo')
			opcion[i].classList.remove('activo')
		})
//se agrega la clase "activo" a la pestaña que ha sido seleccionada
		li[i].classList.add('activo')
		opcion[i].classList.add('activo')

	})
})
 