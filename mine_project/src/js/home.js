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
            all: "All",
            books :[],
            categories :[]
        }
    },
    methods: {
        async getBooks(){
            try{
                let res =await this.$axios.get('/books')
                if(res){
                    this.books =res.data.data;
                    // console.log(res.data);
                }

            }catch(e){
                console.log(e);
            }
        },

        async getCategories(){
            try{
                let res =await this.$axios.get('/categories')
                if(res){
                    this.categories =res.data;
                    // console.log(res.data);
                }

            }catch(e){
                console.log(e);
            }
        },

        // async filterBook(category){
        //     // console.log(category);
        //     try{
        //         let {data :books} =await this.$axios.get('/books?category=' + category);
        //         if(books){
        //             // this.books =books.data;
        //             console.log(books);

        //         }
        //     }catch(e){
        //         console.log(e);
        //     }
        // }

        async filterRecipeByCategory(category) {
            try {
              let { data: books } = await this.$axios.get('/books?category=' + category)
              if(books){
                this.books = books.data;
              }
            }catch(e) {
              console.log(e)
            }
          },
    },
    mounted() {
        this.getBooks();
        this.getCategories();
        // this.filterBook();
    },
}