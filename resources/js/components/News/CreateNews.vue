<template>
  <div>
    <!-- Alert Message -->
    <div v-if="alert.show" :class="`alert alert-${alert.type}`" class="mt-4" dismissible fade>
      {{ alert.message }}
    </div>

    <!-- Loading Spinner -->
    <div class="d-flex justify-content-center" v-if="isLoading">
      <div class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
    </div>

    <!-- Form -->
    <form class="mt-4" @submit.prevent="submitForm" v-else>
      <div class="mt-1 form-group">
        <label for="title">Titulo</label>
        <input type="text" id="title" v-model="title" class="form-control" required>
      </div>
      <div class="mt-1 form-group">
        <label for="content">Conteúdo</label>
        <textarea id="content" v-model="content" class="form-control" required></textarea>
      </div>
      <div class="mt-1 form-group">
        <label for="categories">Categorias</label>
        <v-select
          id="categories"
          v-model="selectedCategories"
          :options="categories"
          label="name"
          multiple
          :reduce="category => category.id"
        ></v-select>
      </div>
      <button type="submit" class="mt-1 btn btn-primary">Salvar</button>
    </form>
  </div>
</template>

<script>
import axios from 'axios';
import vSelect from 'vue-select';
import 'vue-select/dist/vue-select.css'; // Importando o CSS do vue-select

export default {
  components: {
    vSelect
  },
  data() {
    return {
      title: '',
      content: '',
      categories: [],
      selectedCategories: [],
      isLoading: false,
      alert: {
        show: false,
        type: '',
        message: ''
      }
    };
  },
  async created() {
    this.fetchCategories();
  },
  methods: {
  async fetchCategories() {
  this.isLoading = true;
  try {
    const response = await axios.get('/api/categories');
      this.categories = response.data.data;
  } catch (error) {
    console.error('Error fetching categories:', error);
  } finally {
    this.isLoading = false;
  }
},
    async submitForm() {
      this.isLoading = true;

      try {
        const response = await axios.post('/api/news', {
          title: this.title,
          content: this.content,
          categories: this.selectedCategories,
        });

        this.alert = {
          show: true,
          type: 'success',
          message: 'Notícia criada com sucesso!'
        };

        this.title = '';
        this.content = '';
        this.selectedCategories = [];
      } catch (error) {
        this.alert = {
          show: true,
          type: 'danger',
          message: 'Ocorreu um erro ao criar a notícia.'
        };
      } finally {
        this.isLoading = false;
      }
    },
  },
};
</script>

<style scoped>
/* Customiza o componente vue-select */
.v-select .vs__dropdown-toggle {
  border: none;
}
.v-select .vs__selected-options {
  list-style-type: none;
  padding-left: 0;
}
.v-select .vs__dropdown-menu .vs__dropdown-option {
  background-color: #f8f9fa;
}
.vs__dropdown-option:hover {
  background-color: #babec2 !important;
}
</style>
