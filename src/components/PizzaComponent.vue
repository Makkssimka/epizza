<template>
    <div class="product-delivery" v-if="pizza.visibl">
        <img src="/images/delivery.svg">
        <p>{{ pizza.title }}</p>
    </div>
    <div class="product-item" v-else>
        <a href="#" v-if="isPizza" class="images-product" @click.prevent="removeTwoPizza(pizza.id)">
            <img :src="pizza.image" alt="">
        </a>
        <a href="#" v-else-if="twoVis" class="images-product" @click.prevent="addTwoPizza(pizza)">
            <img :src="pizza.image" alt="">
        </a>
        <a href="#" v-else class="images-product" @click.prevent="selectPizza(pizza)">
            <img :src="pizza.image" alt="">
        </a>
        <div class="desc-product">
            <p class="title-product">{{ pizza.title }}</p>
            <p class="structure-product">{{ pizza.weight.mb ? pizza.weight.mb : pizza.weight.lb }} гр, {{ pizza.structure.join(', ') }}</p>
        </div>
        <div class="price-product-wrapper">
            <div class="price-broduct">от {{ pizza.price.mb ? pizza.price.mb : pizza.price.lb }} &#8381;</div>
            <a href="#" v-if="isJob" class="btn btn-product btn-inactive">Закрыто</a>
            <a href="#" v-else-if="isPizza" class="btn btn-product" @click.prevent="removeTwoPizza(pizza.id)">Убрать</a>
            <a href="#" v-else-if="twoVis" class="btn btn-product" @click.prevent="addTwoPizza(pizza)">Добавить</a>
            <a href="#" v-else class="btn btn-product" @click.prevent="selectPizza(pizza)">Выбрать</a>
        </div>
    </div>
</template>

<script>
import job from '../modules/timeJob';

export default {
    props: {
        pizza: Object
    },
    methods: {
        selectPizza: function(pizza){
            this.$store.dispatch('SET_ACTIVE_PIZZA', pizza);
        },
        addTwoPizza: function(pizza){
            this.$store.dispatch('SET_TWO_PIZZA', pizza);
        },
        removeTwoPizza: function(pizzaId){
            if(this.twoPizza.left && this.twoPizza.left.id == pizzaId){
                this.$store.dispatch('REMOVE_TWO_PIZZA', "left");
            }
            else{
                this.$store.dispatch('REMOVE_TWO_PIZZA', "right");
            }
        }
    },
    computed: {
        twoVis: function(){
            return this.$store.getters.TWO_VISBLE;
        },
        twoPizza: function(){
            return this.$store.getters.TWO_PIZZA;
        },
        isPizza: function(){
            return (this.twoPizza.left && this.twoPizza.left.id == this.pizza.id) || (this.twoPizza.right && this.twoPizza.right.id == this.pizza.id)?true:false;
        },
        isJob: function(){
            return job;
        }
    },
}
</script>