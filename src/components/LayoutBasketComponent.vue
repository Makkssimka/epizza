<template>
    <div class="layout-basket layout-full">
        <div class="container">
            <div class="basket-container">
                <h1>Корзина</h1>
                <div class="layout-basket-list">
                    <ul v-if="basket.length">
                        <li v-for="(item, index) in basket" :key="index">
                            <div v-if="Array.isArray(item.product.image)" class="layout-bsk-image-array">
                                <div class="layout-bsk-image-left" :style="{'background-image': 'url('+item.product.image[0]+')'}"></div>
                                <div class="layout-bsk-image-right" :style="{'background-image': 'url('+item.product.image[1]+')'}"></div>
                            </div>
                            <div v-else class="layout-bsk-image">
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
                    <p v-else class="empty-basket">
                        Корзина пуста
                    </p>
                </div>
                <div class="layout-total-basket">
                    Сумма заказа: <span>{{ total | money }} &#8381;</span>
                </div>
                <div class="promocode-wrapper">
                    <input type="text" class="input" v-model="promocode" placeholder="Введите промокод">
                    <a href="#" class="btn btn-select" @click.prevent="promocodeSend">Применить</a>
                    <div class="promo-message">{{ promoMessage }}</div>
                </div>
                <div class="layout-total-basket">
                    Сумма к оплате: <span>{{ promeTotal | money }} &#8381;</span>
                </div>
                <div class="layout-button">
                    <router-link to="/" class="btn btn-grey">Вернуться в меню</router-link>
                    <router-link v-if="basket.length" to="/order" class="btn btn-select">Продолжить</router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data: function(){
        return {
            promocode: null,
            promocodeList: [],
            promoMessage: ""
        }
    },
    created: function(){
        let urlPromo = this.$store.getters.URL+"promocode";
        axios.get(urlPromo).then((response) => {
            this.promocodeList = response.data;
        });

        this.promocode = this.$store.getters.PROMOCODE?this.$store.getters.PROMOCODE.promocode:'';
    },
    computed: {
        basket: function(){
            return this.$store.getters.BASKET;
        },
        total: function(){
            return this.$store.getters.BASKET_TOTAL;
        },
        promeTotal: function(){
            return this.$store.getters.PROMO_TOTAL;
        },
        time: function(){
            let dt = new Date();
            return dt.getHours();
        },
        weekday: function(){
            let dt = new Date();
            return dt.getDay();
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
        },
        promocodeSend: function(){
            let promo = this.promocode?this.promocode.toLowerCase():'';
            let promObj = this.promocodeList.find(item => item.promocode.toLowerCase() == promo);
            if(!promObj){
                this.$store.dispatch('SET_PROMOCODE', null);
                this.promoMessage = "промокод не найден";
                return false;
            }

            // ограничение по дням недели
            if(promObj.days && !promObj.days.rules.includes(this.weekday)){
                this.$store.dispatch('SET_PROMOCODE', null);
                this.promoMessage = promObj.days.message;
                return false;
            }

            // ограничение по времени
            if(this.time < promObj.time.from || this.time > promObj.time.to){
                this.$store.dispatch('SET_PROMOCODE', null);
                this.promoMessage = `промокод действует с ${promObj.time.from}:00 до ${promObj.time.to}:00`;
                return false;
            }

            // ограничение по количеству
            if (promObj.count) {
                let counter = 0;
                this.basket.forEach(element => {
                  counter += element.count;
                });

                if (promObj.count != counter) {
                    this.$store.dispatch('SET_PROMOCODE', null);
                    this.promoMessage = `промокод действует при покупке ${promObj.count} пицц`;
                    return false;
                }
            }

            // исключенные пиццы
            if(promObj.exclude) {
                let isExclude = false;
                this.basket.forEach(element => {
                    const id = Number.parseInt(element.product.id);

                    if (promObj.exclude.includes(id)) {
                        isExclude = true;
                        return false;
                    }
                });

                if (isExclude) {
                    this.$store.dispatch('SET_PROMOCODE', null);
                    this.promoMessage = "не выполнены все условия промокода";
                    return false;
                }
            }

            // ограничение по правилу
            if(promObj.rules){
                let ids = '';
                this.basket.forEach(element => {
                    ids += ' '+element.product.id;
                });

                if(!new RegExp(promObj.rules, 'gi').test(ids)){
                    this.$store.dispatch('SET_PROMOCODE', null);
                    this.promoMessage = "не выполнены все условия промокода";
                    return false;
                }
            }


            this.$store.dispatch('SET_PROMOCODE', promObj);
            this.promoMessage = "промокод применен";
        }
    },
    filters: {
        money: function(value){
            return value.toLocaleString('ru-RU');
        }
    }
}
</script>