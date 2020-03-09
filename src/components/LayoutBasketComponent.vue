<template>
    <div class="layout-basket">
        <div class="container">
            <div class="basket-container">
                <h1>Корзина</h1>
                <div class="layout-basket-list">
                    <ul>
                        <li v-for="(item, index) in basket" :key="index">
                            <div class="layout-bsk-image">
                                <img :src="item.product.image" alt="">
                            </div>
                            <div class="layout-bsk-info">
                                <p>{{ item.product.title }}</p>
                                <span v-if="item.product.type">{{ item.product.structure }} </span>
                                <span v-else>{{ item.count }} шт.</span>
                            </div>
                            <div class="layout-bsk-counter">
                                <a class="btn btn-product" href="#" @click.prevent="removeBasket(item, index)">-</a>
                                <span>{{ item.count }}</span>
                                <a class="btn btn-product" href="#" @click.prevent="addBasket(item)">+</a>
                            </div>
                            <div class="layout-bsk-total">
                                {{ item.product.price*item.count | money }} &#8381;
                            </div>
                            <div class="layout-bsk-del">
                                <a href="#" @click.prevent="removeItem(index)">
                                    <img src="/images/remove-basket.svg" />
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="layout-total-basket">
                    Сумма заказа: <span>{{ total | money }} &#8381;</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    
    computed: {
        basket: function(){
            return this.$store.getters.BASKET;
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