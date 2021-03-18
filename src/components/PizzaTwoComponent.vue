<template>
    <div class="product-item" >
        <a href="#" v-if="!twoVis" class="images-product" @click.prevent="selectTwoPizza">
            <img src="images/pizza/two-pizza.png" alt="">
        </a>
        <a href="#" v-else class="images-product" @click.prevent="closeTwoPizza">
            <img src="images/pizza/two-pizza.png" alt="">
        </a>
        <div class="desc-product">
            <p class="title-product">Пицца из двух половинок</p>
            <p class="structure-product">Соберите свою пиццу с двумя разными вкусами</p>
        </div>
        <div class="price-product-wrapper">
            <div class="price-broduct">от 350 &#8381;</div>
            <a href="#" v-if="isJob" class="btn btn-product btn-inactive">Закрыто</a>
            <a href="#" v-else-if="!twoVis" class="btn btn-product" @click.prevent="selectTwoPizza">Выбрать</a>
            <a href="#" v-else class="btn btn-product" @click.prevent="closeTwoPizza">Отмена</a>
        </div>
    </div>
</template>

<script>
import job from '../modules/timeJob';

export default {
    methods: {
        selectTwoPizza: function(){
            this.$store.dispatch('SET_TWO_VIS', true);
        },
        closeTwoPizza: function(){
            this.$store.dispatch('SET_TWO_VIS', false);
        }
    },
    computed: {
        twoVis: function(){
            return this.$store.getters.TWO_VISBLE;
        },
        isJob: function(){
            return job;
        }
    },
}
</script>