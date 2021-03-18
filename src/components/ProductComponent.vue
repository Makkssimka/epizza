<template>
    <div class="product-item product-item-mobile">
        <a href="#" class="images-product">
            <img :src="product.image" alt="">
        </a>
        <div class="desc-product">
            <p class="title-product">{{ product.title }}</p>
            <p class="structure-product">{{ product.structure.join(', ') }}</p>
        </div>
        <div class="price-product-wrapper">
            <div class="price-broduct">{{ product.price }} &#8381;</div>
            
            <div v-if="inBasket" class="btn-wrap-product counter-product">
                <a href="#" class="btn btn-product" @click.prevent="removeBasket(product)">-</a>
                <span class="counter">{{ inBasket }}</span>
                <a href="#" class="btn btn-product" @click.prevent="addBasket(product)">+</a>
            </div>
            <div v-else class="btn-wrap-product">
                <a href="#" v-if="isJob" class="btn btn-product btn-inactive">Закрыто</a>
                <a href="#" v-else class="btn btn-product" @click.prevent="addBasket(product)">В корзину</a>
            </div>
        </div>
    </div>
</template>

<script>
import job from '../modules/timeJob';

export default {
    props: {
        product: Object
    },
    methods: {
        addBasket: function(product){
            this.$store.dispatch('ADD_BASKET', product);
        },
        removeBasket: function(product){
            this.$store.dispatch('REMOVE_BASKET', product);
        }
    },
    computed: {
        inBasket: function(){
            let basket = this.$store.getters.BASKET;
            if(basket.length){
                let res = basket.find(item => (item.product.id == this.product.id && item.product.title == this.product.title));
                return res?res.count:false;
            }
            else{
                return false;
            }
        },
        isJob: function(){
            return job;
        }
    }
}
</script>