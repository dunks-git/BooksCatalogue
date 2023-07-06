import AssignmentList from "./AssignmentList.js";

export default {
    components: {AssignmentList},

    template: `
        <section class="space-y-6">
        <AssignmentList :assignments="filters.inProgress" title="In Progress"/>
        <AssignmentList :assignments="filters.completed" title="Completed"/>

        <!--      <form v-on:submit="">-->
        <form @submit.stop.prevent="add">
            <div class="border border-gray-600 text-black bg-white p-2">
                <input v-model="newAssignment" placeholder="New assignment..."/>
                <button type="submit" class="border-l">Add</button>
            </div>
        </form>

        </section>
    `,
    data() {
        return {
            assignments: [
                {name: 'Finish project', complete: false, id: 1},
                {name: 'Read chapter 4', complete: false, id: 2},
                {name: 'Turn in homework', complete: false, id: 3}
            ],
            newAssignment: ''
        }
    },
    computed: {
        filters() {
            return {
                inProgress: this.assignments.filter(a => !a.complete),
                completed: this.assignments.filter(a => a.complete)
            }
        }
    },
    methods: {
        add() {
            // alert(this.newAssignment);
            this.assignments.push({
                name: this.newAssignment,
                complete: false,
                id: this.assignments.length + 1
            });
            this.newAssignment = '';
        },
    }
}
