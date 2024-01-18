
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

