@extends('layouts.vue.main')

@section('title')
    Vue
@endsection
@section('content')
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
@endsection

