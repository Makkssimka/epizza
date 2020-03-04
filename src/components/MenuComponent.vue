<template>
    <nav class="menu-wrapper" v-bind:class="{ 'list-menu-visible': isVisible }">
        <div class="container">
            <ul class="list-menu">
                <li><router-link class="menu-image" to="/">
                    <img src="/images/epizza-logo-simple.svg" alt="">
                </router-link></li>
                <li><a href="#pizza" @click.prevent="scrollAnkhor">Пицца</a></li>
                <li><a href="#souse" @click.prevent="scrollAnkhor">Соусы</a></li>
                <li><a href="#zakuski" @click.prevent="scrollAnkhor">Закуски</a></li>
                <li><a href="#sault" @click.prevent="scrollAnkhor">Салаты</a></li>
                <li><a href="#drink" @click.prevent="scrollAnkhor">Напитки</a></li>
                <li><a href="/">Акции</a></li>
            </ul>
            <basket></basket>
        </div>
    </nav>
</template>

<script>
import scrollTo from "scroll-to-element";
import Basket from "../components/BasketComponent";

export default {
    components: {
        basket: Basket
    },
    data: function(){
        return {
            isVisible: false
        }
    },
    mounted: function(){
        window.onscroll = () => {
            let scroll = window.pageYOffset || document.documentElement.scrollTop;
            this.isVisible = (scroll > 75)?true:false;
        };
    },
    methods: {
        scrollAnkhor: function(e){
            let idElem = e.target.hash;
            let elem = document.querySelector(idElem);
            scrollTo(elem, {
                offset: -70,
                ease: 'out-expo'
            });
        }
    }
}
</script>