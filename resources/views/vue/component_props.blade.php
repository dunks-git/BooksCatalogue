@extends('layouts.vue.main')

@section('title')
    Vue component props
@endsection
@section('style')
    <style>
        @keyframes spinner {
            to {
                transform: rotate(360deg);
            }
        }

        .is-loading{
            color: transparent;
        }

        .is-loading:before {
            content: '';
            box-sizing: border-box;
            position: absolute;
            top: 50%;
            left: 50%;
            width: 20px;
            height: 20px;
            margin-top: -10px;
            margin-left: -10px;
            border-radius: 50%;
            border: 2px solid #ccc;
            border-top-color: #000;
            animation: spinner .6s linear infinite;
        }
    </style>
@endsection
@section('content')
    <div id="app">
        {{--        <app-button type="primary">Submit</app-button>--}}
        {{--        <app-button :processing=true>Submit</app-button>--}}
{{--        <app-button :processing=true>Submit</app-button>--}}
    </div>
    <script type="module">
        import App from "{{asset('js/components/app.js')}}";

        var vuapp = Vue.createApp(App);
        vuapp.config.compilerOptions.delimiters = ['@@{{', '}}'];
        vuapp.mount('#app');

    </script>

@endsection
