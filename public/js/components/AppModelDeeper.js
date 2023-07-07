export default {
    template: `
<!--        <input type="text" v-bind:value="name" @input="name=$event.target.value">-->
        <input type="text" v-model="name">
    `,
    data() {
        return {
            name: ''
        }
    }
}
