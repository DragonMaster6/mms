require('./bootstrap');

import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue3'
import { ZiggyVue } from 'ziggy'

createInertiaApp({
  resolve: name => require(`./pages/${name}`),
  setup({el, App, props, plugin}) {
    createApp({render: () => h(App, props)})
      .use(plugin)
      .use(ZiggyVue)
      .mount(el)
  }
})
