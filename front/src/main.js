import { createApp } from 'vue'
import App from './App.vue'
import 'bootstrap'
import { BootstrapIconsPlugin } from 'bootstrap-icons-vue'
import 'bootstrap/dist/css/bootstrap.min.css'
import './assets/main.css'

const app = createApp(App)
app.use(BootstrapIconsPlugin)
app.mount('#app')
