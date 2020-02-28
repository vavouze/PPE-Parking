require('./bootstrap');
import Vue from 'vue';
import App from './App.vue';



Vue.config.productionTip = false;
var app = new Vue({
    el: '#app',
    data: {
        modal: false
    },
    methods: {
        toggleModal() {
            this.modal = !this.modal
        }
    }
})