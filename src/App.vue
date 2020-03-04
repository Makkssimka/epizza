<template>
  <div id="app">
    <header-component></header-component>
    <menu-component></menu-component>
    <router-view></router-view>
    <footer-component></footer-component>
  </div>
</template>

<script>

import Header from "./components/HeaderComponent"
import Menu from "./components/MenuComponent"
import Footer from "./components/FooterComponent"

export default {
  components: {
    "header-component": Header,
    "menu-component": Menu,
    "footer-component": Footer
  }
  
}
</script>

<style lang="sass">
@import "/sass/index.sass"
</style>
