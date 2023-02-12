<template>
    <header class="header-wrapper">
        <div class="container">
            <div class="logo-header">
                <router-link to="/" title="ЁPizza">
                    <img src="/images/epizza-logo.svg" alt="Ёpizza">
                </router-link>
            </div>
            <div class="text-header">
                <p>Доставка пиццы в <span>Волжском</span></p>
                <div class="time-header">
                    с <span>{{ settings['job-from'] }}</span> до <span>{{ settings['job-to'] }}</span>
                </div>
            </div>
            <div class="number-header">
                <a :href="'tel:' + settings.telephones">{{ settings.telephones }}</a>
                <p>Звонок бесплатный</p>
            </div>
        </div>
    </header>
</template>

<script>
export default {
    computed: {
        settings: function() {
            return this.$store.getters.SETTINGS;
        }
    }
}
</script>