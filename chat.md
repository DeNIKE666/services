    <chat-log :messages="messages"></chat-log>
    <chat-composer v-on:messagesent="addMessage"></chat-composer>
    
    const app = new Vue({
        el: '#dashboard',
        data: {
            messages: [],
            usersInRoom: []
        },
        methods: {
            addMessage(message) {
    
               axios.post('/messages/send', message).then(response => {
                   console.log(response.data);
               })
    
            }
        },
        created() {
    
            axios.get('/messages').then(response => {
                this.messages = response.data;
            });
    
            Echo.join('example-channel')
                .listen('PusherEvent', (e) => {
                    this.messages.push({
                        message: e.message.message,
                        user: e.user,
                    })
                });
    
        },
    
    });

Vue.component('chat-message', require('./components/ChatMessage.vue').default);
Vue.component('chat-log', require('./components/ChatLog.vue').default);
Vue.component('chat-composer', require('./components/ChatComposer.vue').default);