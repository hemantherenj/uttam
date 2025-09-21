<div>
    <div x-data="dataTableApp()" class="p-6">

    <!-- Header: Search + Add -->
    <div class="flex flex-col md:flex-row justify-between items-center mb-4 gap-2">
      <input type="text" x-model="search" placeholder="Search products..."
      class="w-full md:w-1/3 p-2 border rounded dark:bg-gray-700 dark:border-gray-600">
      <button @click="openAddModal()" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Add Product</button>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
      <table class="min-w-full table-auto bg-white dark:bg-gray-800 shadow-md rounded">
        <thead class="bg-gray-100 dark:bg-gray-700">
          <tr>
            <th class="px-4 py-2 cursor-pointer" @click="sortBy('image')">Image</th>
            <th class="px-4 py-2 cursor-pointer" @click="sortBy('name')">Name</th>
            <th class="px-4 py-2 cursor-pointer" @click="sortBy('category')">Category</th>
            <th class="px-4 py-2 cursor-pointer" @click="sortBy('price')">Price</th>
            <th class="px-4 py-2 cursor-pointer" @click="sortBy('stock')">Stock</th>
            <th class="px-4 py-2">Actions</th>
          </tr>
        </thead>
        <tbody>
          <template x-for="(product, index) in paginatedData" :key="index">
            <tr class="border-b dark:border-gray-700">
              <td class="px-4 py-2"><img :src="product.image" class="h-12 w-12 object-cover rounded"></td>
              <td class="px-4 py-2" x-text="product.name"></td>
              <td class="px-4 py-2" x-text="product.category"></td>
              <td class="px-4 py-2" x-text="product.price"></td>
              <td class="px-4 py-2" x-text="product.stock"></td>
              <td class="px-4 py-2 flex gap-2">
                <button @click="openEditModal(index)" class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600">Edit</button>
                <button @click="deleteProduct(index)" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">Delete</button>
              </td>
            </tr>
          </template>
          <template x-if="paginatedData.length === 0">
            <tr>
              <td colspan="6" class="text-center py-4 text-gray-500">No products found.</td>
            </tr>
          </template>
        </tbody>
      </table>
    </div>

    <!-- Pagination -->
    <div class="flex justify-center gap-2 mt-4">
      <button @click="prevPage()" :disabled="currentPage===1"
      class="px-3 py-1 rounded bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 disabled:opacity-50">Prev</button>
      <template x-for="page in totalPages" :key="page">
        <button @click="goToPage(page)" 
        :class="{'bg-blue-600 text-white': page===currentPage, 'bg-gray-200 dark:bg-gray-700': page!==currentPage}"
        class="px-3 py-1 rounded hover:bg-gray-300 dark:hover:bg-gray-600" x-text="page"></button>
      </template>
      <button @click="nextPage()" :disabled="currentPage===totalPages"
      class="px-3 py-1 rounded bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 disabled:opacity-50">Next</button>
    </div>

    <!-- Add/Edit Modal -->
    <div x-show="modalOpen" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
      <div class="bg-white dark:bg-gray-800 p-6 rounded w-96 relative">
        <h3 class="text-xl font-bold mb-4" x-text="modalTitle"></h3>
        <form @submit.prevent="saveProduct()">
          <div class="mb-2">
            <label class="block mb-1">Name</label>
            <input type="text" x-model="form.name" required class="w-full p-2 border rounded dark:bg-gray-700 dark:border-gray-600">
          </div>
          <div class="mb-2">
            <label class="block mb-1">Category</label>
            <input type="text" x-model="form.category" required class="w-full p-2 border rounded dark:bg-gray-700 dark:border-gray-600">
          </div>
          <div class="mb-2">
            <label class="block mb-1">Price</label>
            <input type="number" x-model="form.price" required class="w-full p-2 border rounded dark:bg-gray-700 dark:border-gray-600">
          </div>
          <div class="mb-2">
            <label class="block mb-1">Stock</label>
            <input type="number" x-model="form.stock" required class="w-full p-2 border rounded dark:bg-gray-700 dark:border-gray-600">
          </div>
          <div class="mb-4">
            <label class="block mb-1">Product Image</label>
            <div 
            class="border-2 border-dashed rounded-lg p-4 text-center cursor-pointer"
            @dragover.prevent 
            @drop.prevent="handleDrop($event)"
            @click="$refs.fileInput.click()"
            >
            <template x-if="!form.imagePreview">
              <p class="text-gray-500">Drag & drop or click to upload</p>
            </template>
            <template x-if="form.imagePreview">
              <img :src="form.imagePreview" class="h-32 mx-auto rounded object-cover"/>
            </template>
            <input type="file" x-ref="fileInput" @change="previewImage" class="hidden">
          </div>
        </div>

        <!-- <div class="mb-2">
          <label class="block mb-1">Image</label>
          <input type="file" @change="previewImage($event)" class="w-full">
          <template x-if="form.imagePreview"><img :src="form.imagePreview" class="mt-2 h-20 w-20 object-cover rounded"></template>
        </div> -->
        <div class="flex justify-end gap-2 mt-4">
          <button type="button" @click="closeModal()" class="px-4 py-2 rounded bg-gray-300 dark:bg-gray-600">Cancel</button>
          <button type="submit" class="px-4 py-2 rounded bg-blue-600 text-white hover:bg-blue-700">Save</button>
        </div>
      </form>
    </div>
  </div>

</div>

<script>
  previewImage(e){
    const file=e.target.files[0];
    if(file){
      const reader=new FileReader();
      reader.onload=a=>this.form.imagePreview=a.target.result;
      reader.readAsDataURL(file);
      this.form.image=file;
    }
  },
  handleDrop(e){
    const file=e.dataTransfer.files[0];
    if(file){
      const reader=new FileReader();
      reader.onload=a=>this.form.imagePreview=a.target.result;
      reader.readAsDataURL(file);
      this.form.image=file;
    }
  },
</script>

<script>

  function dataTableApp() {
    return {
      products: JSON.parse(localStorage.getItem('products')) || [],
      search: '',
      sortColumn: 'name',
      sortAsc: true,
      currentPage: 1,
      perPage: 5,
      modalOpen: false,
      modalTitle: 'Add Product',
      editIndex: null,
      form: { name:'', category:'', price:0, stock:0, image:'', imagePreview:'' },

      get filteredProducts() {
        let data = this.products.filter(p => 
          p.name.toLowerCase().includes(this.search.toLowerCase()) ||
          p.category.toLowerCase().includes(this.search.toLowerCase())
          );
        return this.sortData(data);
      },

      get totalPages() { return Math.ceil(this.filteredProducts.length / this.perPage) || 1; },
      get paginatedData() { 
        const start = (this.currentPage-1)*this.perPage;
        return this.filteredProducts.slice(start, start+this.perPage);
      },

      sortBy(col) {
        if(this.sortColumn === col) this.sortAsc = !this.sortAsc;
        else { this.sortColumn = col; this.sortAsc = true; }
      },

      sortData(data) {
        return data.sort((a,b)=>{
          if(a[this.sortColumn] < b[this.sortColumn]) return this.sortAsc?-1:1;
          if(a[this.sortColumn] > b[this.sortColumn]) return this.sortAsc?1:-1;
          return 0;
        });
      },

      goToPage(page) { this.currentPage = page; },
      prevPage() { if(this.currentPage>1)this.currentPage--; },
      nextPage() { if(this.currentPage<this.totalPages)this.currentPage++; },

      openAddModal(){ this.modalOpen=true; this.modalTitle='Add Product'; this.editIndex=null; this.form={name:'',category:'',price:0,stock:0,image:'',imagePreview:''}; },
      openEditModal(index){ this.modalOpen=true; this.modalTitle='Edit Product'; this.editIndex=index; this.form={...this.products[index], imagePreview:this.products[index].image}; },
      closeModal(){ this.modalOpen=false; },
      previewImage(event){ const file=event.target.files[0]; if(file){ const reader=new FileReader(); reader.onload=e=>this.form.imagePreview=e.target.result; reader.readAsDataURL(file); this.form.image=file; } },
      saveProduct(){ 
        let prod={...this.form, image:this.form.imagePreview};
        if(this.editIndex===null) this.products.push(prod); 
        else this.products[this.editIndex]=prod; 
        localStorage.setItem('products',JSON.stringify(this.products)); 
        this.closeModal(); 
        this.currentPage=1;
      },
      deleteProduct(index){ if(confirm('Are you sure?')){ this.products.splice(index,1); localStorage.setItem('products',JSON.stringify(this.products)); if(this.currentPage>this.totalPages)this.currentPage=this.totalPages; } }
    }
  }
</script>
</div>
