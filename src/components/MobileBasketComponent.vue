<template>
    <div class="mobile-basket">
        <router-link to="/basket" class="basket-mobile">
            <img src="/images/shopping-bag.svg">
            <div class="basket-number-mobile">{{ basketLength }}</div>
        </router-link>
        <div class="basket-message" :class="{'visible-basket':visible}">
            <p>{{ message }}</p>
            <p>{{ basketLast }}</p>
        </div>
    </div>
</template>

<script>
export default {
    computed: {
        basketLength: function(){
            return this.$store.getters.BASKET_LEN;
        },
        visible: function(){
            return this.$store.getters.VISIBLE;
        },
        basketLast: function(){
            return this.$store.getters.LAST;
        },
        message: function(){
            return this.$store.getters.BASKET_MESSAGE;
        },
    }
}
</script>