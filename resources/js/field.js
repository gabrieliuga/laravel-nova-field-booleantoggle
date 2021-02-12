Nova.booting((Vue, router, store) => {
  Vue.component('index-BooleanToggle', require('./components/IndexField'))
  Vue.component('detail-BooleanToggle', require('./components/DetailField'))
  Vue.component('form-BooleanToggle', require('./components/FormField'))
})
