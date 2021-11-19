<template>
<div>
    <pizza-select></pizza-select>
    <mobile-basket></mobile-basket>
    <header-component></header-component>
    <menu-component></menu-component>
    <div class="index-wrapper">
        <carousel v-if="actions" class="carousel-full" :autoplayHoverPause="true" :items=1 :autoplay="true" :nav="false">
            <router-link v-for="item in actions" :key="item.id" to="/action">
                <img :src="item.images.full">
            </router-link>
        </carousel>
        <carousel v-if="actions" class="carousel-mobile" :margin=25 :items=1 :autoplay="false" :nav="false">
            <router-link to="/action" v-for="item in actions" :key="item.id" class="item-carousel">
                <img :src="item.images.mobile">
                <p>{{ item.title }}</p>
            </router-link>
        </carousel>
        <div class="container" id="pizza">
            <div class="product-wrapper">
                <pizza-two></pizza-two>
                <pizza-block 
                    v-for="item in pizza" 
                    :key="item.id"
                    :pizza="item">
                </pizza-block>
            </div>
        </div>
        <div v-if="souse.length" class="container" id="souse">
            <div class="head-product">Соусы</div>
            <div class="product-wrapper">
                <product-block 
                    v-for="item in souse" 
                    :key="item.id"
                    :product="item">
                </product-block>
            </div>
        </div>
        <div v-if="zakuski.length" class="container" id="zakuski">
            <div class="head-product">Закуски</div>
            <div class="product-wrapper">
                <product-block 
                    v-for="item in zakuski" 
                    :key="item.id"
                    :product="item">
                </product-block>
            </div>
        </div>
        <div v-if="sault.length" class="container" id="sault">
            <div class="head-product">Салаты</div>
            <div class="product-wrapper">
                <product-block 
                    v-for="item in sault" 
                    :key="item.id"
                    :product="item">
                </product-block>
            </div>
        </div>
        <div v-if="desert.length" class="container" id="desert">
          <div class="head-product">Десерты</div>
          <div class="product-wrapper">
            <product-block
                v-for="item in desert"
                :key="item.id"
                :product="item">
            </product-block>
          </div>
        </div>
        <div v-if="drink.length" class="container" id="drink">
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
    <footer-component></footer-component>
    <two-pizza-select></two-pizza-select>
</div>
</template>

<script>
import carousel from "vue-owl-carousel";
import pizzaBlock from "../components/PizzaComponent";
import pizzaTwo from "../components/PizzaTwoComponent";
import twoPizzaSelect from "../components/TwoPizzaSelectComponent";
import productBlock from "../components/ProductComponent";

import Header from "../components/HeaderComponent"
import Menu from "../components/MenuComponent"
import Footer from "../components/FooterComponent"
import PizzaSelect from "../components/PizzaSelectComponent"
import MobileBasket from "../components/MobileBasketComponent"

import axios from 'axios';

export default {
    data: function(){
        return {
            pizza: [],
            souse: [],
            zakuski: [],
            sault: [],
            desert: [],
            drink: [],
            actions: null
        }
    },
    created: function(){
        document.title = "Ёpizza - доставка пиццы в Волжском";
        document.querySelector("meta[name='description']").setAttribute('content', "Вкусная пицца с быстрой бесплатной доставкой домой и в офис в Волжском.");

        let urlProduct = this.$store.getters.URL+"product";
        axios.get(urlProduct).then((response) => {
            this.souse = response.data.souse;
            this.zakuski = response.data.zakuski;
            this.sault = response.data.sault;
            this.desert = response.data.desert;
            this.drink = response.data.drink;
        });

        let urlPizza = this.$store.getters.URL+"pizza";
        axios.get(urlPizza).then((response) => {
            this.pizza = response.data;
            let preloader = document.querySelector('.preloader-wrapper');
            setTimeout(() => {
                preloader.classList.remove('preloader-bottom-slide');
                preloader.classList.add('preloader-top-slide');
            }, 350);
        });

        let urlActions = this.$store.getters.URL+"action";
        axios.get(urlActions).then((response) => {
            this.actions = response.data;
        });
    },
    beforeRouteLeave (to, from, next) {
        let preloader = document.querySelector('.preloader-wrapper');
        preloader.classList.remove('preloader-top-slide');
        preloader.classList.add('preloader-bottom-slide');
        setTimeout(() => {
            next();
        }, 250);
    },
    components: {
        "mobile-basket": MobileBasket,
        "header-component": Header,
        "menu-component": Menu,
        "footer-component": Footer,
        "pizza-select": PizzaSelect,
        carousel,
        pizzaBlock,
        pizzaTwo,
        twoPizzaSelect,
        productBlock,
    }
}
</script>