<template>
    <div class="container">

        <form action="/create" method="post">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="login">Укажите логин или Email</label>
                <input class="form-control" type="text" name="login">
                <span v-text=""></span>
                <button @submit="check"></button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                loginExists: 'Такой логин уже существует',
                EmailExists: 'Такой Email уже существует',
            }
        },

        methods: {
            check: function () {
                console.log('checl submited');
            }
        }
    }
</script>
