export default {
    name :'home',
    // mounted(){
    //     console.log(this.$axios);
    // }
    // mounted(){
    //     this.$axios.get('/books')
    //     .then(res =>console.log(res.data)
    //     )
    // }
    data() {
        return {
            books :[]
        }
    },
    methods: {
        async getBooks(){
            try{
                let res =await this.$axios.get('/books')
                if(res){
                    this.books =res.data.data;
                    console.log(res.data);
                }

            }catch(e){
                console.log(e);
            }
        }
    },
    mounted() {
        this.getBooks();
    },
}