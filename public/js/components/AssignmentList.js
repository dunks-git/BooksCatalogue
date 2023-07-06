import Assignment from "./Assignment.js";

export default {
    components: {Assignment},
    template: `
      <section v-show="assignments.length">
      <h2 className="font-bold mb-2">@{{ title }}</h2>
      <ul class="border border-gray-600 p-3 divide-y">
        <Assignment v-for="assignment in assignments" v-bind:key="assignment.id" :assignment="assignment"/>
      </ul>
      </section>
    `,
    props: {
        assignments: Array,
        title: String

    }
}
