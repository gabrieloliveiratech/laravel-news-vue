import { createApp } from 'vue';

import Navbar from './components/App/Navbar.vue';

import IndexNews from './components/News/IndexNews.vue';
import ShowNews from './components/News/ShowNews.vue';
import CreateNews from './components/News/CreateNews.vue';

import IndexCategory from './components/Category/IndexCategory.vue';
import ShowCategory from './components/Category/ShowCategory.vue';
import CreateCategory from './components/Category/CreateCategory.vue';

const app = createApp({});

app.component('navbar', Navbar); 

app.component('index-news', IndexNews);
app.component('show-news', ShowNews);
app.component('create-news', CreateNews);

app.component('index-category', IndexCategory);
app.component('show-category', ShowCategory);
app.component('create-category', CreateCategory);

app.mount('#app');
