<template>
    <div class="index-wrapper">
        <carousel class="carousel-full" :autoplayHoverPause="true" :items=1 :autoplay="true" :nav="false">
            <img src="/images/slide1.jpeg" alt="">
            <img src="/images/slide2.jpeg" alt="">
            <img src="/images/slide3.jpeg" alt="">
        </carousel>
        <div class="container" id="pizza">
            <div class="product-wrapper">
                <pizza-block 
                    v-for="item in pizza" 
                    :key="item.id"
                    :pizza="item">
                </pizza-block>
            </div>
        </div>
        <div class="container" id="souse">
            <div class="head-product">Соусы</div>
            <div class="product-wrapper">
                <product-block 
                    v-for="item in souse" 
                    :key="item.id"
                    :product="item">
                </product-block>
            </div>
        </div>
        <div class="container" id="zakuski">
            <div class="head-product">Закуски</div>
            <div class="product-wrapper">
                <product-block 
                    v-for="item in zakuski" 
                    :key="item.id"
                    :product="item">
                </product-block>
            </div>
        </div>
        <div class="container" id="sault">
            <div class="head-product">Салаты</div>
            <div class="product-wrapper">
                <product-block 
                    v-for="item in sault" 
                    :key="item.id"
                    :product="item">
                </product-block>
            </div>
        </div>
        <div class="container" id="drink">
            <div class="head-product">Напитки</div>
            <div class="product-wrapper">
                <product-block 
                    v-for="item in drink" 
                    :key="item.id"
                    :product="item">
                </product-block>
            </div>
        </div>
    </div>
</template>

<script>
import carousel from "vue-owl-carousel";
import pizzaBlock from "../components/PizzaComponent";
import productBlock from "../components/ProductComponent";
import {pizzaArray, souseArray, zakuskiArray, saultArray, drinkArray} from "../module/product";

export default {
    data: function(){
        return {
            pizza: pizzaArray,
            souse: souseArray,
            zakuski: zakuskiArray,
            sault: saultArray,
            drink: drinkArray
        }
    },
    components: {
        carousel,
        pizzaBlock,
        productBlock
    }
}
</script>