export default {
    template:`
      <div :class="{
      'p-4 border  rounded-lg':true,
      'bg-white border-gray-300 text-black':theme=='light',
      'bg-gray-700 border-gray-600':theme=='dark'

}">
      <!--            <h2 classs="font-bold">@{{ heading }}</h2>-->
      <!--        <h2 classs="font-bold" v-text="heading"></h2>-->
      <h2 v-if="$slots.heading" class="font-bold mb-2">
        <slot name="heading"/>
      </h2>

      <!--      <slot name="default"/>-->
      <slot/>
      <footer v-if="$slots.footer" class="border-gray-600 border-t mt-4 pt-4 text-sm">
        <slot name="footer"/>
      </footer>
      </div>
    `,
    props:{
        heading: String,
        theme: { type: String, default: 'dark'}
    }
}
