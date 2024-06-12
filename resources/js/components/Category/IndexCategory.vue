<template>
    <div class="container">
        <div class="row mt-1">
            <div class="col-12">
                <input type="text" v-model="filter" class="form-control" placeholder="Filtrar por nome">
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="categoriesItem in categories" :key="categoriesItem.id">
                            <td>{{ categoriesItem.id }}</td>
                            <td>{{ categoriesItem.name }}</td>
                            <td>
                                <a :href="`/categories/${categoriesItem.id}`" class="btn btn-outline-secondary">DETAILS</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import {debounce} from '../../utils';

export default {
    data() {
        return {
            categories: [],
            filter: ''
        }
    },
    created(){
     this.debouncedFetch = debounce ( async (newValue, oldValue)=> {
            console.log("value changed: ", newValue, oldValue);
            const response = await axios.get('/api/categories?filter[search]=' + newValue);
            this.categories = response.data.data;       
         }, 1000);
    },
    watch: {
        filter(...args) {
        this.debouncedFetch(...args);
        }
    },
    async mounted() {
        try {
            const response = await axios.get('/api/categories'); 
            this.categories = response.data.data;
        } catch (error) {
            console.error(error);
        }
    }
}
</script>
