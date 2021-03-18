<template>
    <div class="action-page layout-page">
        <mobile-basket></mobile-basket>
        <header-component></header-component>
        <menu-component></menu-component>
        <div class="index-wrapper">
            <div class="container">
                <div class="head-product">Акции доставки и самовывоза</div>
                <div class="action-list">
                    <div class="item-action" v-for="item in actions" :key="item.index">
                        <img :src="item.images.mobile" :alt="item.title">
                        <div class="action-title">{{ item.title }}</div>
                        <div class="action-description">{{ item.description }}</div>
                    </div>
                </div>
            </div>
        </div>
        <footer-component></footer-component>
    </div>
</template>

<script>
import Header from "../components/HeaderComponent"
import Menu from "../components/MenuComponent"
import Footer from "../components/FooterComponent"
import MobileBasket from "../components/MobileBasketComponent"

import axios from 'axios';

export default {
    data: function(){
        return {
            actions: null
        }
    },
    created: function(){
        document.title = "Наши акции | Ёpizza - доставка пиццы в Волжском";
        document.querySelector("meta[name='description']").setAttribute('content', "Акции и скидки на пиццы");

        let preloader = document.querySelector('.preloader-wrapper');
        setTimeout(() => {
            preloader.classList.remove('preloader-bottom-slide');
            preloader.classList.add('preloader-top-slide');
        }, 350);

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
        "footer-component": Footer
    }
}
</script>