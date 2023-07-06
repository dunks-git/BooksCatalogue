export default {
    template: `
        <form @submit.stop.prevent="add">
        <div class="border border-gray-600 text-black bg-white p-2">
            <input v-model="newAssignment" placeholder="New assignment..."/>
            <button type="submit" class="border-l">Add</button>
        </div>
        </form>`,
    // props: {
    //     assignments: Array
    // },
    data() {
        return {
            newAssignment: ''
        }

    },
    methods: {
        add() {
            this.$emit('addEvent',this.newAssignment, false);

            // this.assignments.push({
            //     name: this.newAssignment,
            //     complete: false,
            //     id: this.assignments.length + 1
            // });
            this.newAssignment = '';
        }
    }

}
