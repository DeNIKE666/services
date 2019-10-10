<template>
    <div class="chat-log">
        <chat-message v-for="message in messages" v-bind:message="message"></chat-message>
        <div class="empty" v-show="messages.length == 0">
            НЕТ СООБЩЕНИЙ
        </div>
    </div>
</template>

<script>
    export default {
        props: ['messages' , 'user'],
    }
</script>

<style lang="css">

    .chat-log {
        overflow: overlay;
        height: 400px;
    }

    .chat-log .chat-message:nth-child(even) {
        background-color: #e3e3e6;
        padding: 20px 0px 20px 0px;
    }
    .empty {
        padding: 100px;
        text-align: center;
    }
</style>
