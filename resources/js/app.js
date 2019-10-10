require ('./bootstrap');


Vue.component('chat-message', require('./components/ChatMessage.vue').default);
Vue.component('chat-log', require('./components/ChatLog.vue').default);
Vue.component('chat-composer', require('./components/ChatComposer.vue').default);

const app = new Vue({
    el: '#dashboard',
    data: {
        messages: [],
    },
    methods: {
        addMessage(message) {
           this.messages.push(message);

           axios.post('/messages/send', message).then(response => {
           })

        }
    },
    created() {

        Echo.join('example-channel')
            .listen('PusherEvent', (e) => {
                this.messages.push({
                    message: e.message.message,
                    user: e.user,
                })
            });

        axios.get('/messages').then(response => {
            this.messages = response.data;
        });

    },

});
