// import './bootstrap';

import { createApp } from 'vue';
import Carousel from './components/Carousel.vue';

const app = createApp({});

app.component('Carousel', Carousel);
app.mount('#app');
