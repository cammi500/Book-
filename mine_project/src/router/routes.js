import Home from '@/pages/Home.vue'
import Detail from '@/pages/Detail.vue'
import BookPage from '@/pages/BookPage.vue'

const routes =[
    {path:"/", component :Home, name:'home'},
    {path:"/detail", component :Detail,name:'detail'},
    {path:"/bookPage", component :BookPage,name:'form'},
]
export default routes;