<template>
    <div class="product-item">
        <a href="#" class="images-product" @click.prevent="selectPizza(pizza)">
            <img :src="pizza.image" alt="">
        </a>
        <div class="desc-product">
            <p class="title-product">{{ pizza.title }}</p>
            <p class="structure-product">{{ pizza.weight.mb }} гр, {{ pizza.structure.join(', ') }}</p>
        </div>
        <div class="price-product-wrapper">
            <div class="price-broduct">от {{ pizza.price.mb }} &#8381;</div>
            <a href="#" class="btn btn-product" @click.prevent="selectPizza(pizza)">Выбрать</a>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        pizza: Object
    },
    methods: {
        selectPizza: function(pizza){
            this.$store.dispatch('SET_ACTIVE_PIZZA', pizza);
        }
    }
}
</script>