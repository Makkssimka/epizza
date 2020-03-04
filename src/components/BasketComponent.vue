<template>
    <div class="bascket-menu">
        <a href="#" class="bascket-block">
            Корзина <span class="number">{{ basketLength }}</span>
        </a>
        <div class="basket-message" :class="{'visible-basket':visible}">
            <p>Добавлено в карзину:</p>
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
        basket: function(){
            return this.$store.getters.BASKET;
        },
        basketLast: function(){
            return this.$store.getters.LAST;
        },
        visible: function(){
            return this.$store.getters.VISIBLE;
        }
    }
}
</script>