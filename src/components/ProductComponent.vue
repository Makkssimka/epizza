<template>
    <div class="product-item">
        <a href="#" class="images-product">
            <img :src="product.image" alt="">
        </a>
        <div class="desc-product">
            <p class="title-product">{{ product.title }}</p>
            <p class="structure-product">{{ product.structure.join(', ') }}</p>
        </div>
        <div class="price-product-wrapper">
            <div class="price-broduct">{{ product.price }} &#8381;</div>
            <a href="#" class="btn btn-product" @click.prevent="addBasket(product)">В корзину</a>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        product: Object
    },
    methods: {
        addBasket: function(product){
            this.$store.dispatch('ADD_BASKET', product);
        }
    }
}
</script>