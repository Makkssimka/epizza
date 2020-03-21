<template>
  <div id="app">
    <div class="preloader-wrapper">
        <img src="/images/epizza-logo-animate.svg" alt="">
    </div>
    <router-view></router-view>
  </div>
</template>

<script>

export default {
  mounted: function(){
    this.$store.dispatch('GET_BASKET');
  }
}
</script>

<style lang="sass">
@import "/sass/index.sass"
</style>
