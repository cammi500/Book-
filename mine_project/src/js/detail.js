export default {
    name:'detail ',
    data() {
        return {
            book :{},
        }
    },
    methods: {
      async  getOneBook() {
        try{
            let id =this.$route.params.id;
            let {data } =await this.$axios.get(`books/${id}`);
            if(data){
                this.book = data;

            }
        }catch(e){
            console.log(e);
        }
      }
    },

    mounted(){
        // console.log(this.$route.params.id);
        this.getOneBook();
    }
}