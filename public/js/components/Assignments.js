import AssignmentList from "./AssignmentList.js";
import AssignmentCreate from "./AssignmentCreate.js";

export default {
    components: {AssignmentList, AssignmentCreate},

    template: `
      <!--        <section class="space-y-6">-->
      <section class="flex gap-8">
      <assignment-list :assignments="filters.inProgress" title="In Progress">
        <assignment-create @addEvent="add"/>
      </assignment-list>
      <div v-show="showCompleted">
        <assignment-list
            :assignments="filters.completed"
            title="Completed"
            can-toggle
            @toggle="showCompleted = !showCompleted"
        ></assignment-list>
<!--          <div>bla</div>-->
      </div>

      <!--        <AssignmentCreate :assignments="assignments"/>-->
      <!--        <AssignmentCreate v-on:addEvent=""/>-->
      </section>
    `,
    data() {
        return {
            // assignments: [
            //     {name: 'Finish project', complete: false, id: 1, tag: 'math'},
            //     {name: 'Read chapter 4', complete: false, id: 2, tag: 'science'},
            //     {name: 'Turn in homework', complete: false, id: 3, tag: 'math'}
            // ],
            assignments: [],
            newAssignment: '',
            showCompleted: true
        }
    },
    created() {
        // axios
        fetch('http://localhost:3001/assignments') // returns promise to get this data
            .then(response => response.json())
            // .then(data => {
            //     console.info(data);
            // })
            .then(assignments => {
                this.assignments = assignments
            })
    },
    // mounted(){
    //     alert('created');
    // },
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
