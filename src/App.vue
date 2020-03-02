<template>
  <div id="app">
    <header-component></header-component>
    <menu-component :basket="basket"></menu-component>
    <router-view></router-view>
  </div>
</template>

<script>

import Header from "./components/HeaderComponent"
import Menu from "./components/MenuComponent"

export default {
  data: function(){
    return{
      basket: []
    }
  },
  components: {
    "header-component": Header,
    "menu-component": Menu
  }
  
}
</script>

<style lang="sass">
@import "/sass/index.sass"
</style>
