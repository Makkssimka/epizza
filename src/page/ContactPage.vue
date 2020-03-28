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
                        <div class="contact-desc">г.Волжский, ул.Оломоуцкая, д.30а, ТЦ "Галерея"</div>
                    </div>
                    <div class="contact-info">
                        <div class="contact-head">Наш телефон:</div>
                        <div class="contact-desc"><a href="tel:+79061718118">+7 906 17-18-118</a></div>
                    </div>
                    <div class="contact-info">
                        <div class="contact-head">Наш e-mail:</div>
                        <div class="contact-desc"><a href="mailto:epizza.su@yandex.ru">epizza.su@yandex.ru</a></div>
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

        let preloader = document.querySelector('.preloader-wrapper');
        setTimeout(() => {
            preloader.classList.remove('preloader-bottom-slide');
            preloader.classList.add('preloader-top-slide');
        }, 350);
    },
    mounted: function(){
        let mapWrap = document.querySelector('.contact-map');
        let script = document.createElement('script');
        script.setAttribute('src', 'https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Aa3f42375c2e1ee168b15982f6e4abadb2ec261ea2a2e8f5ca5a8a1c628e55f1f&amp;width=100%&amp;height=400&amp;lang=ru_RU&amp;scroll=true');
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
    }
}
</script>