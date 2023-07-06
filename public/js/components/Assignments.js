import AssignmentList from "./AssignmentList.js";
export default {
    components:{AssignmentList},

    template: `
      <section class="space-y-6">
        <AssignmentList :assignments="filters.inProgress" title="In Progress"/>
        <AssignmentList :assignments="filters.completed" title="Completed"/>
      </section>
    `,
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
        filters(){
            return {
                inProgress: this.assignments.filter(a => !a.complete),
                completed: this.assignments.filter(a => a.complete)
            }
        }
    }
}
