import AssignmentList from "./AssignmentList.js";
import AssignmentCreate from "./AssignmentCreate.js";

export default {
    components: {AssignmentList, AssignmentCreate},

    template: `
        <section class="space-y-6">
        <AssignmentList :assignments="filters.inProgress" title="In Progress"/>
        <AssignmentList :assignments="filters.completed" title="Completed"/>

        <!--        <AssignmentCreate :assignments="assignments"/>-->
        <!--        <AssignmentCreate v-on:addEvent=""/>-->
        <AssignmentCreate @addEvent="add"/>


        </section>
    `,
    data() {
        return {
            assignments: [
                {name: 'Finish project', complete: false, id: 1, tag: 'math'},
                {name: 'Read chapter 4', complete: false, id: 2, tag: 'science'},
                {name: 'Turn in homework', complete: false, id: 3, tag: 'math'}
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
    // methods: {
    //     add() {
    //         // alert(this.newAssignment);
    //         this.assignments.push({
    //             name: this.newAssignment,
    //             complete: false,
    //             id: this.assignments.length + 1
    //         });
    //         this.newAssignment = '';
    //     },
    // }
    methods: {
        add(name, complete, tag) {
            this.assignments.push({
                name: name,
                complete: complete,
                tag: tag,
                id: this.assignments.length + 1
            });
        }
    }

}
