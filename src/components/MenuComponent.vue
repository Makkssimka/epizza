<template>
    <nav class="menu-wrapper" v-bind:class="{ 'list-menu-visible': isVisible }">
        <div class="container">
            <ul class="list-menu" v-if="isIndex">
                <li><router-link class="menu-image" to="/">
                    <img src="/images/epizza-logo-simple.svg" alt="">
                </router-link></li>
                <li><a href="#pizza" @click="scrollAnkhor">Пицца</a></li>
                <li><a href="#souse" @click.prevent="scrollAnkhor">Соусы</a></li>
                <li><a href="#zakuski" @click.prevent="scrollAnkhor">Закуски</a></li>
                <li><a href="#sault" @click.prevent="scrollAnkhor">Салаты</a></li>
                <li><a href="#drink" @click.prevent="scrollAnkhor">Напитки</a></li>
                <li><router-link to="/action">Акции</router-link></li>
            </ul>
            <ul class="list-menu" v-else>
                <li><router-link class="menu-image" to="/">
                    <img src="/images/epizza-logo-simple.svg" alt="">
                </router-link></li>
                <li><router-link to="/">Главная</router-link></li>
                <li><router-link to="/action">Акции</router-link></li>
                <li><router-link to="/contact">Контакты</router-link></li>
                <li><a target="_blank" href="https://yadi.sk/i/wsxtsEAhnmK_hQ">Политика конфиденциальности</a></li>
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
    computed: {
        isIndex: function(){
            return (this.$route.path == '/')?true:false;
        }
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