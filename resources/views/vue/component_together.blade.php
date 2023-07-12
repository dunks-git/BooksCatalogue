@extends('layouts.vue.main')

@section('title')
    Vue component together
@endsection
@section('content')
{{--    <div id="app"><app-together></app-together></div>--}}
    <div id="app"></div>
    <script type="module">
        import AppTogether from "{{asset('js/components/AppTogether.js')}}";
        // let app = {
        //     components: {
        //         'app-together':AppTogether
        //     }
        // };

        var vuapp = Vue.createApp(AppTogether);
        vuapp.config.compilerOptions.delimiters = ['@@{{', '}}'];
        vuapp.mount('#app');
    </script>
@endsection
