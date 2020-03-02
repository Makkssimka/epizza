<template>
    <nav class="menu-wrapper" v-bind:class="{ 'list-menu-visible': isVisible }">
        <div class="container">
            <ul class="list-menu">
                <li><router-link class="menu-image" to="/">
                    <img src="/images/epizza-logo-simple.svg" alt="">
                </router-link></li>
                <li><a href="/">Пицца</a></li>
                <li><a href="/">Соусы</a></li>
                <li><a href="/">Закуски</a></li>
                <li><a href="/">Салаты</a></li>
                <li><a href="/">Напитки</a></li>
                <li><a href="/">Акции</a></li>
            </ul>
            <div class="bascket-menu">
                <a href="#" class="bascket-block">
                    Корзина <span class="number">{{ basketLength }}</span>
                </a>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
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
        basketLength: function(){
            return this.basket.length;
        }
    },
    props: {
        basket: Array
    }
}
</script>