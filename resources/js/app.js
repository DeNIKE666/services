require ('./bootstrap');


Vue.component('chat-component', require('./components/Chat/ChatComponent').default);


const chat = new Vue({
    el: '#dashboard',
});
