<template>
  <div id="app">
    <header-component></header-component>
  </div>
</template>

<script>

import Header from "./components/HeaderComponent"

export default {
  components: {
    "header-component": Header
  }
  
}
</script>

<style lang="sass">
@import "/sass/index.sass"
</style>
