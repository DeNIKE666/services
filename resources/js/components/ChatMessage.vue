<template>
    <div class="chat-message">
        <p>{{ message.message }}</p>
        <small>{{ message.user.login }}</small>
    </div>
</template>

<script>
    export default {
        props: ['message'],
    }
</script>

<style lang="css">

    .chat-message {
        margin-bottom: 20px;
    }

    .chat-message p, small {
        padding: 0px 15px;
    }


</style>
