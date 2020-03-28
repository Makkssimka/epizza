<template>
    <div class="layout-footer">
        <div class="container layout-footer-number">
            <a href="tel:+79061718118">+7 906 17-18-118</a>
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
        }
    }
}
</script>