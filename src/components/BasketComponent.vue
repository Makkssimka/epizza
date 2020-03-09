<template>
    <div class="bascket-menu">
        <router-link to="/basket" class="bascket-block">
            Корзина <span class="number">{{ basketLength }}</span>
        </router-link>
        <div class="basket-message" :class="{'visible-basket':visible}">
            <p>{{ message }}</p>
            <p>{{ basketLast }}</p>
        </div>
        <div class="basket-menu-list">
            <div class="scroll-bar">
                <ul>
                    <li v-for="(item, index) in basket" :key="index">
                        <div class="image-baket">
                            <img :src="item.product.image" alt="">
                        </div>
                        <div class="title-basket">
                            <div class="title-one">
                                <div>
                                    <p>{{ item.product.title }}</p>
                                    <p v-if="item.product.type" class="count-basket">{{ item.product.structure }} </p>
                                    <p v-else class="count-basket">{{ item.count }} шт.</p>
                                </div>
                                <a class="remove-item" href="#" @click.prevent="removeItem(index)">
                                    <img src="/images/remove-basket.svg">
                                </a>
                            </div>
                            <div class="title-two">
                                <div class="couter-basket">
                                    <a class="btn btn-product" href="#" @click.prevent="removeBasket(item, index)">-</a>
                                    <span>{{ item.count }}</span>
                                    <a class="btn btn-product" href="#" @click.prevent="addBasket(item)">+</a>
                                </div>
                                <div class="price-item-total">
                                    {{ item.count*item.product.price | money }} &#8381;
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="total-price-basket">
                <span>Сумма заказа:</span>
                <span>{{ total | money }} &#8381;</span>
            </div>
        </div>     
    </div>
</template>

<script>
import Scrollbar from "smooth-scrollbar";

export default {
    mounted: function(){
        Scrollbar.init(document.querySelector('.scroll-bar'),{
            continuousScrolling: false,
            alwaysShowTracks: true
        })
    },
    computed: {
        basketLength: function(){
            return this.$store.getters.BASKET_LEN;
        },
        basket: function(){
            return this.$store.getters.BASKET;
        },
        basketLast: function(){
            return this.$store.getters.LAST;
        },
        visible: function(){
            return this.$store.getters.VISIBLE;
        },
        message: function(){
            return this.$store.getters.BASKET_MESSAGE;
        },
        total: function(){
            return this.$store.getters.BASKET_TOTAL;
        }
    },
    methods: {
        addBasket: function(item){
            this.$store.dispatch('ADD_ITEM_COUNT', item);
        },
        removeBasket: function(item, index){
            item.index = index;
            this.$store.dispatch('REMOVE_ITEM_COUNT', item);
        },
        removeItem: function(index){
            this.$store.dispatch('REMOVE_ITEM', index);
        }
    },
    filters: {
        money: function(value){
            return value.toLocaleString('ru-RU');
        }
    }
}
</script>