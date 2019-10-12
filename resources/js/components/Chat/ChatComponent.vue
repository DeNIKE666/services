<template>
    <div class="chat">
        <div class="message">
            <small>DeNIKE</small>
            <p>текст сообщения</p>
        </div>

        <div class="message">
            <small>DeNIKE</small>
            <p>текст сообщения</p>
        </div>

        <div class="message">
            <small>DeNIKE</small>
            <p>текст сообщения</p>
        </div>
        <div class="control">
            <textarea type="text" placeholder="Введите сообщение"></textarea>
            <button @click="createMessage">Отправить</button>
        </div>
    </div>
</template>

<script>

    export default {

        props: ['user' , 'seller'],

        methods: {
            createMessage() {
                axios.post('/dashboard/dialog/' + this.seller.id).then(response => {
                });
            }
        },

        created() {

            Echo.private('dialog.2')
                .listen('DialogChat', (e) => {
                    console.log(e);
                });
        }
    }
</script>

<style>
    .chat {
        width: 100%;
        background: white;
        min-height: 400px;
        padding: 20px;
        border: 1px solid #eaeaea;
    }
    .chat .message {
        padding: 0px;
    }

    .chat .message p {
        color: #515058b8;
        font-size: 17px;
        text-align: justify;
    }
    .control {
        display: flex;
        justify-content: space-between;
        flex-direction: column;
    }

    .control button {
        border: 1px solid;
        width: 100px;
        margin-left: 0px;
        height: 49px;
        background-color: #4d81b5;
        color: white;
        padding: 6px;
    }
</style>