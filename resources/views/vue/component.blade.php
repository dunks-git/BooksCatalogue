@extends('layouts.vue.main')

@section('title')
    Vue component
@endsection
@section('content')
    <div id="app">
        <section v-show="inProgressAssignments.length">
            <h2 class="font-bold mb-2">In Progress</h2>
            <ul>
                <li v-for="assignment in assignments.filter(a=>!a.complete)" v-bind:key="assignment.id">
                    <label>${assignment.name} <input type="checkbox" v-model="assignment.complete"></label>
                </li>
            </ul>
            {{--            <pre>--}}
            {{--                ${ assignments }--}}
            {{--            </pre>--}}
        </section>
        {{--        <section v-show="assignments.filter(a=>a.complete).length" class="mt-3">--}}
        <section v-if="completedAssignments.length" class="mt-3">
            <h2 class="font-bold mb-2">Completed</h2>
            <ul>
                <li v-for="assignment in assignments.filter(a=>a.complete)">
                    <label>${assignment.name} <input type="checkbox" v-model="assignment.complete"
                                                     v-bind:key="assignment.id"></label>
                </li>
            </ul>
        </section>
    </div>
    <script>
        let app = {
            data() {
                return {
                    assignments: [
                        {name: 'Finish project', complete: false, id: 1},
                        {name: 'Read chapter 4', complete: false, id: 2},
                        {name: 'Turn in homework', complete: false, id: 3}
                    ]
                }
            },
            computed: {
                inProgressAssignments() {
                    return this.assignments.filter(a => !a.complete)
                },
                completedAssignments() {
                    return this.assignments.filter(a => a.complete)
                }
            }
        };
        var vuapp = Vue.createApp(app);
        vuapp.config.compilerOptions.delimiters = ['${', '}'];
        vuapp.mount('#app');

    </script>

@endsection
