<template>
    <div class="contact-page layout-page">
        <mobile-basket></mobile-basket>
        <header-component></header-component>
        <menu-component></menu-component>
        <div class="index-wrapper">
            <div class="container">
                <div class="head-product">Контакты</div>
                <div class="contact-wrapper">
                    <div class="contact-info">
                        <div class="contact-head">Наш адрес:</div>
                        <div class="contact-desc">{{ settings.addresses }}</div>
                    </div>
                    <div class="contact-info">
                        <div class="contact-head">Наш телефон:</div>
                        <div class="contact-desc"><a :href="'tel:' + settings.telephones">{{ settings.telephones }}</a></div>
                    </div>
                    <div class="contact-info">
                        <div class="contact-head">Наш e-mail:</div>
                        <div class="contact-desc"><a :href="'mailto:' + settings.emails">{{ settings.emails }}</a></div>
                    </div>
                </div>
                <div class="contact-map"></div>
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

export default {
    data: function(){
        return {
            actions: null
        }
    },
    created: function(){
        document.title = "Контакты | Ёpizza - доставка пиццы в Волжском"
        document.querySelector("meta[name='description']").setAttribute('content', "Наши контактные телефоны и адреса");

        let preloader = document.querySelector('.preloader-wrapper');
        setTimeout(() => {
            preloader.classList.remove('preloader-bottom-slide');
            preloader.classList.add('preloader-top-slide');
        }, 350);
    },
    mounted: function(){
        let mapWrap = document.querySelector('.contact-map');
        let script = document.createElement('script');
        script.setAttribute('src', 'https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A18d9fe1996e804aa5e0181f29916f74bc74afa47a7547ccea06c0c0bc0f78613&amp;width=100%25&amp;height=400&amp;lang=ru_RU&amp;scroll=true');
        script.setAttribute('async', true);
        mapWrap.appendChild(script);
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
    },
    computed: {
        settings: function (){
            return this.$store.getters.SETTINGS;
        }
    }
}
</script>