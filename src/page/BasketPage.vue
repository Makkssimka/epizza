<template>
    <div class="basket-page">
        <layout-header :steps="step"></layout-header>
        <layout-basket></layout-basket>
    </div>
</template>

<script>
import LayoutHeader from "../components/LayoutHeaderComponent";
import LayoutBasket from "../components/LayoutBasketComponent";

export default {
    components: {
        "layout-header": LayoutHeader,
        "layout-basket": LayoutBasket
    },
    data: function(){
        return {
            step: { one: true, two: false, three: false }
        }
    }
}
</script>