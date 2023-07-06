@extends('layouts.vue.main')

@section('title')
    Vue component files
@endsection
@section('content')
    <div id="app">
        <app-button>Submit</app-button>
    </div>
    <script type="module">
        Vue.options.delimiters = ['${', '}'];
        // import AppButton from "../../../public/js/components/AppButton.vue";
        import AppButton from "{{ asset('js/components/AppButton.js') }}";
        let app = {
            components: {
                'app-button':AppButton
            }
        };
        var vuapp = Vue.createApp(app);
        vuapp.config.compilerOptions.delimiters = ['${', '}'];
        vuapp.mount('#app');

    </script>

@endsection
