
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('vue-resource');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));
Vue.component('modal', require('./components/Modal.vue'));
Vue.component('loginmodal', require('./components/LoginModal.vue'));
Vue.component('login-modal-form', require('./components/auth/LoginModalForm.vue'));
Vue.component('list-card', require('./components/ListCard.vue'));
Vue.component('scroll', require('./components/Scroll.vue'));

Vue.component('topic-list', require('./components/TopicList.vue'));
Vue.component('topic-slide', require('./components/TopicSlide.vue'));

Vue.component('event-list', require('./components/EventList.vue'));

const app = new Vue({
    el: '#app'
});
