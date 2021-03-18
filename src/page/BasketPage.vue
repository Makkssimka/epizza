<template>
    <div class="basket-page layout-page">
        <layout-header :steps="step"></layout-header>
        <layout-mobile :step="stepMobile"></layout-mobile>
        <layout-basket></layout-basket>
        <layout-footer></layout-footer>
    </div>
</template>

<script>
import LayoutHeader from "../components/LayoutHeaderComponent";
import LayoutBasket from "../components/LayoutBasketComponent";
import LayoutFooter from "../components/LayoutFooterComponent";
import LayoutMobile from "../components/LoyoutHeaderMobileComponent";

export default {
    created: function(){
        document.title = "Корзина | Ёpizza - доставка пиццы в Волжском";
        document.querySelector("meta[name='description']").setAttribute('content', "Корзина заказов");

        let preloader = document.querySelector('.preloader-wrapper');
        setTimeout(() => {
            preloader.classList.remove('preloader-bottom-slide');
            preloader.classList.add('preloader-top-slide');
        }, 350);
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
        "layout-header": LayoutHeader,
        "layout-basket": LayoutBasket,
        "layout-footer": LayoutFooter,
        "layout-mobile": LayoutMobile
    },
    data: function(){
        return {
            step: { one: true, two: false, three: false },
            stepMobile: { name: "корзина", number: 1 }
        }
    }
}
</script>