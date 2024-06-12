<template>
    <div class="container">
        <div class="row mt-1">
            <div class="col-12">
                <input type="text" v-model="filter" class="form-control" placeholder="Filtrar por título, conteúdo ou categoria">
            </div>
        </div>
        <div class="row" v-if="news.length > 0">
            <div class="col-4 mt-4" v-for="newsItem in news" :key="newsItem.id">
                <div class="card" style="width: 18rem;">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ newsItem.title }}</h5>
                        <p class="card-text" style="height:150px; max-height: 150px; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 6; -webkit-box-orient: vertical;">{{ newsItem.content }}</p>
                        <a :href="`/news/${newsItem.id}`" class="btn btn-outline-secondary">DETAILS</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" v-else>
            <div class="col-12">
                <p>Nenhuma notícia encontrada.</p>
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
            news: [],
            filter: ''
        }
    },
    created(){
     this.debouncedFetch = debounce ( async (newValue, oldValue)=> {
            const response = await axios.get('/api/news?filter[search]=' + newValue);
            this.news = response.data.data;       
         }, 1000);
    },
    watch: {
        filter(...args) {
        this.debouncedFetch(...args);
        }
    },
    async mounted() {
        try {
            const response = await axios.get('/api/news'); 
            this.news = response.data.data;
        } catch (error) {
            console.error(error);
        }
    }
}
</script>
