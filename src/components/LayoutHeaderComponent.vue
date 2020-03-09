<template>
    <div class="layout-head-wrapper">
        <div class="container">
            <div class="layout-head-logo">
                <router-link to="/" title="ЁPizza">
                    <img src="/images/epizza-logo.svg" alt="Ёpizza">
                </router-link>
            </div>
            <div class="layout-head-step">
                <ul>
                    <li :class="{ active: activeStep.one }">
                        <span>1</span>
                        <p>Корзина</p>
                    </li>
                    <li :class="{ active: activeStep.two }">
                        <span>2</span>
                        <p>Оформление заказа</p>
                    </li>
                    <li :class="{ active: activeStep.three }">
                        <span>3</span>
                        <p>Заказ принят</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: function(){
        return {
            activeStep: this.steps
        }
    },
    props: {
        steps: Object
    }
}
</script>