Nova.booting((Vue, router) => {
    Vue.component('index-plus-button', require('./components/IndexField'));
    Vue.component('detail-plus-button', require('./components/DetailField'));
    Vue.component('form-plus-button', require('./components/FormField'));
})
