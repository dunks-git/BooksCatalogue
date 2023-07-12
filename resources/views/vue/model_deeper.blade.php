@extends('layouts.vue.main')

@section('title')
    Vue model deeper
@endsection
@section('content')
    <div id="app" class="text-black"></div>
    <script type="module">
        import AppModelDeeper from "{{asset('js/components/AppModelDeeper.js')}}";
        var vuapp = Vue.createApp(AppModelDeeper);
        vuapp.config.compilerOptions.delimiters = ['@@{{', '}}'];
        vuapp.mount('#app');
    </script>
@endsection
