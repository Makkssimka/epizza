<template>
  <div id="app">
    <pizza-select></pizza-select>
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
import PizzaSelect from "./components/PizzaSelectComponent"

export default {
  components: {
    "header-component": Header,
    "menu-component": Menu,
    "footer-component": Footer,
    "pizza-select": PizzaSelect
  },
  mounted: function(){
    this.$store.dispatch('GET_BASKET');
  }
  
}
</script>

<style lang="sass">
@import "/sass/index.sass"
</style>
