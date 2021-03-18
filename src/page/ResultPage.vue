<template>
    <div class="result-page layout-page">
        <layout-header :steps="step"></layout-header>
        <layout-mobile :step="stepMobile"></layout-mobile>
        <result-header></result-header>
        <layout-footer></layout-footer>
    </div>
</template>

<script>
import LayoutHeader from "../components/LayoutHeaderComponent";
import LayoutResult from "../components/LayoutResultComponent";
import LayoutFooter from "../components/LayoutFooterComponent";
import LayoutMobile from "../components/LoyoutHeaderMobileComponent";

export default {
    created: function(){
        document.title = "Заказ принят | Ёpizza - доставка пиццы в Волжском";
        document.querySelector("meta[name='description']").setAttribute('content', "Номер вашего заказа");

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
        "result-header": LayoutResult,
        "layout-footer": LayoutFooter,
        "layout-mobile": LayoutMobile
    },
    data: function(){
        return {
            step: { one: true, two: true, three: true },
            stepMobile: { name: "заказ принят", number: 3 }
        }
    }
}
</script>