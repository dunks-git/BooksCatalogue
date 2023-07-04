@extends('layouts.vue.main')

@section('title')
    Vue component
@endsection
@section('content')
    <div id="app">
        <app-button>Submit</app-button>
    </div>
    <script>

        let app = {
            components: {
                'app-button': {
                    template: `
<button  class="bg-gray-200 hover:bg-gray-400 border rounded px-5 py-2 disabled:cursor-not-allowed" :disabled="processing" ><slot /></button>
                    `,
                    data() {
                        return {
                            processing: true
                        };
                    },
                    mounted() {
                        // alert('app-button mounted');
                    }
                },

                'assignments-list': {},
                'assignments-list-item': {},
                'accordion': {}
            }
        };
        let AppButton = {};
        let AsssignmentList = {};
        let AsssignmentListItem = {};

        var vuapp = Vue.createApp(app);
        vuapp.config.compilerOptions.delimiters = ['${', '}'];
        vuapp.mount('#app');

    </script>

@endsection
