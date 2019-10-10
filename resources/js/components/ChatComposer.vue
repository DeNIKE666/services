<template>
    <div class="chat-composer">
        <input type="text" v-model="messageText" @keyup.enter="sendMessage">
        <button class="button ripple-effect" @click="sendMessage"> Отправить </button>
    </div>
</template>

<script>
    export default {

        data() {
            return {
                messageText: 'Default',
            }
        },

        methods: {
            sendMessage() {

                if (this.messageText !== '') {
                    this.$emit('messagesent', {
                        message: this.messageText,
                        user: {
                            login: $('#user').text(),
                        }
                    });
                    this.messageText = '';
                }
            }
        }
    }
</script>

<style lang="css">

    .chat-composer {
        display: flex;
    }

    .chat-composer input {
        flex: 1 auto;
    }

    .chat-composer button {
        border-radius: 0;
    }
</style>