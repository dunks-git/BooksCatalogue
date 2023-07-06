import Assignment from "./Assignment.js";

export default {
    components: {Assignment},
    template: `
        <section v-show="assignments.length">
        <h2 className="font-bold mb-2">@{{ title }} <span>(@{{ assignments.length }})</span></h2>

        <div class="flex gap-2">
            <button
                @click="currentTag = tag"
                v-for="tag in tags"
                class="border rounded px-1 py-px text-xs"
                v-bind:class="{'border-blue-500 text-blue-500': tag === currentTag}"
            >@{{ tag }}
            </button>
        </div>

        <ul class="border border-gray-600 p-3 divide-y mt-4">
            <Assignment v-for="assignment in filteredAssignments" v-bind:key="assignment.id" :assignment="assignment"/>
        </ul>
        </section>
    `,
    props: {
        assignments: Array,
        title: String

    },
    computed: {

        filteredAssignments() {
            // return this.assignments;
            if (this.currentTag === 'all') {
                return this.assignments;
            }

            return this.assignments.filter(a => a.tag === this.currentTag);
        },
        tags() {
            // return ['science', 'math', 'reading'];
            // return this.assignments.map(a=>a.tag);
            return new Set(['all', ...new Set(this.assignments.map(a => a.tag))]);
        }

    },
    data() {
        return {
            currentTag: 'all'
        };
    }
}
