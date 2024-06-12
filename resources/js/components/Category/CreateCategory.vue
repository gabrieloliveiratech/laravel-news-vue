<template>
  <div>
    <div class="mt-4" :class="`alert alert-${alert.type}`" v-if="alert.show">
      {{ alert.message }}
    </div>

    <div class="d-flex justify-content-center" v-if="isLoading">
      <div class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
    </div>

    <form class="mt-4" @submit.prevent="submitForm" v-else>
      <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" id="name" v-model="name" class="form-control" required>
      </div>
      <button type="submit" class="mt-1 btn btn-primary">Salvar</button>
    </form>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      name: '',
      isLoading: false,
      alert: {
        show: false,
        type: '',
        message: ''
      }
    };
  },
  methods: {
    async submitForm() {
      this.isLoading = true;

      try {
        const response = await axios.post('/api/categories', {
          name: this.name,
        });

        if (response.status === 201) {
          this.alert = {
            show: true,
            type: 'success',
            message: 'Categoria criada com sucesso!'
          };

          this.name = '';
        }
      } catch (error) {
        this.alert = {
          show: true,
          type: 'danger',
          message: 'Ocorreu um erro ao criar a categoria.'
        };
      } finally {
        this.isLoading = false;
      }
    },
  },
};
</script>