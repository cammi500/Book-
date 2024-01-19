
 <template>
   <router-view v-slot="{ Component }">
    <component :is="Component" />
   
  </router-view> 
</template> 

 <script>
import BookPage from './pages/BookPage.vue';
  export default {
    components :{
      BookPage
    }
  }
</script> 

<!-- <template>
  <ul>
    <li v-for="category in categories" :key="category.id">
    {{ category.name }}
    </li>
  </ul>
</template>
<script>
import axios from 'axios'
export default {
data(){
  return {
    categories :[]
  }
},
methods: {
  async getCategory(){
    let res = await this.$axios.get('/categories');
    this.categories = res.data;
  }
},
mounted(){
  this.getCategory()
}
}
</script> -->

