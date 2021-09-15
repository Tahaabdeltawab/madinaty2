<template>
  <div id="app">
    <loading ref="loading" />

    <transition name="page" mode="out-in">
      <component :is="layout" v-if="layout" />
    </transition>
  </div>
</template>

<script>
import Loading from './Loading'

// Load layout components dynamically.
const layoutsReducer = (components, [name, component]) => {
    components[name] = component.default || component
    return components
  }
const requireContext = require.context('~/layouts', false, /.*\.vue$/)

const layouts = requireContext.keys()
  .map(file =>
    [file.replace(/(^.\/)|(\.vue$)/g, ''), requireContext(file)]
  )
  .reduce(layoutsReducer, {})

export default {
  el: '#app',

  components: {
    Loading
  },

  data: () => ({
    layout: null,
    defaultLayout: 'default'
  }),

  metaInfo () {
    const { appName } = window.config

    return {
      title: appName,
      titleTemplate: `%s · ${appName}`
    }
  },

  mounted () {
    this.$loading = this.$refs.loading
  },

  methods: {
    /**
     * Set the application layout.
     *
     * @param {String} layout
     */
    // the layout is coming from any pageComponent.layout prop or the default layout 'default' see home.vue {layout: basic}
    // this method is called from router/index.js line 84
    setLayout (layout) {
      if (!layout || !layouts[layout]) {
        layout = this.defaultLayout
      }

      this.layout = layouts[layout]
    }
  }
}
</script>
