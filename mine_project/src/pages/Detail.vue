
  <template>
    
      <div class="
      ">
      <nav class="flex  justify-between items-center h-[80px] border-b xl:px-[80px] md:px-[50px] px-[20px]">
        <div>
          <a href='/' class="text-3xl text-green-400 font-semibold">My Recipe</a>
        </div>
        <div>
          <router-link :to="{name:'home'}" class="px-3 py-3 rounded-lg bg-red-400 hover:opacity-[0.85] transition-all duration-500 text-white flex items-center gap-2">
            <i class="fa-solid fa-plus"></i>
            <div>Add Recipe</div>
          </router-link>
        </div>
      </nav>
    
  
    <main class="flex gap-5 items-center md:flex-row flex-col xl:px-[80px] md:px-[50px] px-[20px] my-11">
      <img class="max-h-[400px]" :src="book.image" alt="product image" />
      <div class="space-y-5">
        <h5 class="text-4xl font-semibold tracking-tight text-gray-900 dark:text-white">
        {{ book.title }}
        </h5>
        <p class="text-gray-500">
        {{ book.description }}
        </p>
        <div class="flex gap-4 border-t py-5 justify-end">
          <a href="form.php" class="bg-blue-400 text-white px-4 py-2 rounded-lg">Edit</a>
          <button class="bg-red-500 text-white px-3 py-2 rounded-lg">Delete</button>
        </div>
      </div>
    </main></div>
  </template>
  <script src="../js/detail.js"></script>