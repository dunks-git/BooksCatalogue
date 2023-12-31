import Assignment from "./Assignment.js";
import AssignmentTags from "./AssignmentTags.js";
import Panel from "./Panel.js";

// <assignment-tags
//             :initial-tags="assignments.map(a => a.tag)"
// :current-tag="currentTag"
// @change="currentTag=$event"
//     />

// <assignment-tags
//     v-model="currentTag"
//             :initial-tags="assignments.map(a => a.tag)"
//     />

export default {
    components: {AssignmentTags, Assignment, Panel},
    template: `
<!--      <section v-show="show && assignments.length" class="w-60 bg-gray-700 p-4 border border-gray-600 rounded-lg">-->
      <Panel v-show="show && assignments.length" class="w-60 my-panel">
      <div class="flex justify-between items-start">
        <h2 className="font-bold mb-2">
          @{{ title }} <span>(@{{ assignments.length }})</span>
        </h2>
<!--          <button v-show="canToggle" @click="show = false">&times;</button>-->
          <button v-show="canToggle" @click="$emit('toggle')">&times;</button>
      </div>

      <assignment-tags
          v-model:currentTag="currentTag"
          :initial-tags="assignments.map(a => a.tag)"
      />

      <ul class="border border-gray-600 p-3 divide-y mt-4">
        <Assignment v-for="assignment in filteredAssignments" v-bind:key="assignment.id" :assignment="assignment"/>
      </ul>
      <slot></slot>
<!--      <template v-slot:footer>-->
      <template #footer>
          my footer goes here
      </template>

<!--      </section>-->
      </Panel>
    `,
    data() {
        return {
            currentTag: 'all',
            show: true
        };
    },
    props: {
        assignments: Array,
        title: String,
        canToggle: {type: Boolean, default: false}
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
