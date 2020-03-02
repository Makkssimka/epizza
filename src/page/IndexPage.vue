<template>
    <div class="index-wrapper">
        <carousel class="carousel-full" :autoplayHoverPause="true" :items=1 :autoplay="true" :nav="false">
            <img src="/images/slide1.jpeg" alt="">
            <img src="/images/slide2.jpeg" alt="">
            <img src="/images/slide3.jpeg" alt="">
        </carousel>
        <div class="container">
            <div class="product-wrapper">
                <pizza-block 
                    v-for="item in pizza" 
                    :key="item.id"
                    :pizza="item">
                </pizza-block>
            </div>
        </div>
    </div>
</template>

<script>
import carousel from "vue-owl-carousel";
import pizzaBlock from "../components/PizzaComponent"
import {pizzaArray} from "../module/product";

export default {
    data: function(){
        return {
            pizza: pizzaArray
        }
    },
    components: {
        carousel,
        pizzaBlock
    }
}
</script>