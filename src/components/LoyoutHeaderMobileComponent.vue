<template>
    <div class="mobile-layout-header">
        <div class="container">
            <div class="mobile-layout-logo">
                <router-link to="/">
                    <img src="/images/epizza-logo-simple.svg" alt="">
                </router-link>
            </div>
            <div class="mobile-step">
                {{ step.name }} <span>шаг {{ step.number }}/3</span>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        step: Object
    }
}
</script>