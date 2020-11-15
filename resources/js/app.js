import swal from 'sweetalert';
window.Vue = require('vue');

Vue.component('card', require('./components/Card.vue').default);
Vue.component('card-list', require('./components/CardList.vue').default);
Vue.component('create-article', require('./components/CreateArticle.vue').default);

const app = new Vue({
    el: '#app',
});
