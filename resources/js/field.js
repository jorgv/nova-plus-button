import Toasted from 'vue-toasted'
Nova.booting((Vue, router) => {
    Vue.use(Toasted, {
        theme: 'nova',
        position: 'bottom-right',
        duration: 6000,
    })
    Vue.component('index-plus-button', require('./components/IndexField'));
    Vue.component('detail-plus-button', require('./components/DetailField'));
    Vue.component('form-plus-button', require('./components/FormField'));
})
