// import AppButton from "./AppButton.js";
//
// export default {
//     components: {
//         'app-button':AppButton
//     }
// }

import Assignments from "./Assignments.js";
import Panel from "./Panel.js";

export default {
    components: {Assignments, Panel},
    template: `
      <div class="grid gap-6">
      <assignments></assignments>

<!--      <panel heading="Hello Panel!"  />-->
      <panel>
          default1 without template
      </panel>
      <panel>
          <template v-slot:heading>
          This is my Heading content
          </template>
<!--          <template v-slot:default>-->
<!--          This is my default content-->
<!--          </template>-->
          This is my default content without template
      </panel>
      <panel>
          <template v-slot:heading>
          This is my Last heading content
          </template>
          <template v-slot:footer>
          This is my Footer content
          </template>
          This is my default content without template upper footer
      </panel>
      <panel theme="light">
          <template v-slot:heading>
          This is my light heading content
          </template>
          <template v-slot:footer>
          This is my Light Footer content
          </template>
          This is my Light default content without template upper footer
      </panel>
      </div>
    `,
    props: {
        add: Object
    }

}
