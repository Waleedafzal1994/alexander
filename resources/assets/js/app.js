import { createApp } from 'vue';
require('./bootstrap');

let app = createApp({})

app.component('post-component', require('./Components/PostComponent.vue').default);
app.mount("#app")
