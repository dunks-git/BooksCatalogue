<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vue</title>
    <script src="{{ asset('js/vue3.js') }}"></script>
    <style>
        html, body {
            height: 100%;
        }

        body {
            display: grid;
            place-items: center;
        }

        .text-red {
            color: #F00;
        }

        .text-green {
            color: #0F0;
        }
    </style>

</head>
<body>
<div id="app">
        <div><input type="text" v-model="greeting"></div>
        <p>${ greeting } (${ greeting.length })</p>
    {{--    <button v-bind:class="buttonClasses">Click me</button>--}}
{{--    <button :class="buttonClasses" v-on:click="toggle">Click me</button>--}}
{{--    <button :class="active ? 'text-red' : 'text-green'" v-on:click="toggle">Click me</button>--}}
    <button :class="active ? 'text-red' : 'text-green'" @click="toggle">Click me</button>
</div>

<script type="module">
    var vuapp = Vue.createApp({
        data() {
            return {
                greeting: 'Hello Vue!',
                buttonClasses: 'text-green',
                active: true
            }
        },

        mounted() {
            setTimeout(() => {
                this.greeting = 'Changed'
            }, 3000)
        },

        methods: {
            toggle() {
                // this.buttonClasses = 'text-red'
                this.active = !this.active
            }

        },


    })
    vuapp.config.compilerOptions.delimiters = ['${', '}']
    vuapp.mount('#app')

</script>

</body>
</html>

