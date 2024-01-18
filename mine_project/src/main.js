import { createApp } from 'vue'
import './style.css'
import App from './App.vue'
import axios from 'axios'
import Home from './pages/Home.vue'
import Detail from './pages/Detail.vue'
import BookPage from './pages/BookPage.vue'
import { createRouter,createWebHistory } from 'vue-router'


axios.defaults.baseUrl ="http://localhost:8000/api"

const routes =[
    {path:"/", component :Home, name:'home'},
    {path:"/detail", component :Detail,name:'detail'},
    {path:"/bookPage", component :BookPage,name:'form'},
]

const router = createRouter({
    // 4. Provide the history implementation to use. We are using the hash history for simplicity here.
    history: createWebHistory(),
    routes, // short for `routes: routes`
  })

  const app =createApp(App);
  app.config.globalProperties.$axios =axios;
  app.use(router) 
  app.mount('#app')
