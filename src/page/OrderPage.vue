<template>
    <div class="order-page layout-page">
        <layout-header :steps="step"></layout-header>
        <layout-mobile :step="stepMobile"></layout-mobile>
        <layout-order></layout-order>
        <layout-footer></layout-footer>
    </div>
</template>

<script>
import LayoutHeader from "../components/LayoutHeaderComponent";
import LayoutOrder from "../components/LayoutOrderComponent";
import LayoutFooter from "../components/LayoutFooterComponent";
import LayoutMobile from "../components/LoyoutHeaderMobileComponent";

export default {
    created: function(){
        document.title = "Форма доставки | Ёpizza - доставка пиццы в Волжском"

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
        "layout-order": LayoutOrder,
        "layout-footer": LayoutFooter,
        "layout-mobile": LayoutMobile
    },
    data: function(){
        return {
            step: { one: true, two: true, three: false },
            stepMobile: { name: "оформление заказа", number: 2 }
        }
    }
}
</script>