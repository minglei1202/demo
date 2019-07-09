import Vue from 'vue';
import App from './components/ExampleComponent.vue';
import iView from 'iview';
import 'iview/dist/styles/iview.css';

Vue.use(iView);

new Vue({
    el: '#demo',
    render: h => h(App)
});