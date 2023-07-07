import Assignment from "./Assignment.js";
import AssignmentTags from "./AssignmentTags.js";

export default {
    components: {AssignmentTags, Assignment},
    template: `
        <section v-show="assignments.length">
        <h2 className="font-bold mb-2">@{{ title }} <span>(@{{ assignments.length }})</span></h2>

        <assignment-tags
            :initial-tags="assignments.map(a => a.tag)"
            :current-tag="currentTag"
            @change="currentTag=$event"
        />

        <ul class="border border-gray-600 p-3 divide-y mt-4">
            <Assignment v-for="assignment in filteredAssignments" v-bind:key="assignment.id" :assignment="assignment"/>
        </ul>
        </section>
    `,
    data() {
        return {
            currentTag: 'all'
        };
    },
    props: {
        assignments: Array,
        title: String
    },
    computed: {
        filteredAssignments() {
            if (this.currentTag === 'all') {
                return this.assignments;
            }
            return this.assignments.filter(a => a.tag === this.currentTag);
        }

    },
    methods:{
        updateCurrentTag(e){
            this.currentTag = e;
        }

    }
}
