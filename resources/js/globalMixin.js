export default {
    data(){
      return {
          test_data : " test data ......."
      }
    },
    mounted() {
        console.log('mounted', { name: this.$options.name })
    }
}
