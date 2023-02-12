<template>
    <div class="layout-footer">
        <div class="container layout-footer-number">
            <a :href="'tel:' + settings.telephones">{{ settings.telephones }}</a>
            <p>Звонок бесплатный</p>
        </div>
        <div class="container layout-footer-copyright">
            2018-{{ todey }} &#169; <router-link to="/">Ёpizza</router-link>
        </div>
    </div>
</template>

<script>
export default {
    computed: {
        todey: function(){
            return new Date().getFullYear();
        },
        settings: function (){
            return this.$store.getters.SETTINGS;
        }
    }
}
</script>