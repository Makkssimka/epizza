<template>
    <div class="layout-result layout-full">
        <div class="container">
            <div v-if="contact" class="basket-container">
                <h1>{{ head }}</h1>
                <div class="result-wrapper">
                    <transition name="check">
                        <div class="result-img" key="load" v-if="load">
                            <img class="rotate" src="/images/refresh-cw.svg">
                        </div>
                        <div class="result-img" key="check" v-else>
                            {{ orderNumber }}
                        </div>
                    </transition>
                    <p>{{ subMessage }}</p>
                </div>
                <div class="layout-button">
                    <router-link to="/" class="btn btn-grey">На главную</router-link>
                </div>
            </div>
            <div v-else class="basket-container">
                <h1>Контактные данные не найдены</h1>
                <div class="result-wrapper">
                    <div class="result-img">
                        <img src="/images/alert-circle.svg">
                    </div>
                    <p>Вернитесь назад и заполните все необходимые данные!</p>
                </div>
                <div class="layout-button">
                    <router-link to="/order" class="btn btn-grey">Назад</router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data: function(){
        return {
            head: "Оформление заказа",
            subMessage: 'Ожидайте, идет оформление заказа',
            load: true,
            orderNumber: null
        }
    },
    mounted: async function(){

        if(this.contact && this.basket){

            let url = this.$store.getters.URL+"mail";
            let data = new FormData();
            data.set('contact', JSON.stringify(this.contact));
            data.set('basket', JSON.stringify(this.basket));
            data.set('promocode', JSON.stringify(this.promocode));
            data.set('promocode', JSON.stringify(this.promocode));
            data.set('sale', JSON.stringify(this.sale));

            const response = await this.sendOrderToDashboard();

            data.set('number', response.data.id);

            axios.post(url, data)
                .then((response) => {
                    setTimeout( () => {
                        this.head = "Заказ принят. Номер заказа";
                        this.load = false;
                        this.subMessage = "Ваш заказ принят. Приятного аппетита";
                        this.orderNumber = response.data;
                        this.$store.dispatch('CLEAR_BASKET');
                    }, 1000)
                });
        }

    },
    computed: {
        contact: function(){
            return this.$store.getters.CONTACT;
        },
        basket: function(){
            return this.$store.getters.BASKET;
        },
        promocode: function(){
            return this.$store.getters.PROMOCODE;
        },
        sale: function(){
            return this.$store.getters.PROMO_TOTAL;
        }
    },
    methods: {
        sendOrderToDashboard() {
            const basket = this.basket;
            const contact = this.contact;
            const regular = this.$store.getters.BASKET_TOTAL;
            const total = this.$store.getters.PROMO_TOTAL;
            const promoCode = this.$store.getters.PROMOCODE;
            const apiUrl = this.$store.getters.API_URL;

            let cart = [];
            basket.forEach(item => {
                cart.push({
                    type: item.product.type,
                    size: item.product.id.toString().replace(/\d/g, ''),
                    title: item.product.title,
                    price: item.product.price,
                    count: item.count
                })
            });

            let fullDate = '';

            if (contact.date_order && contact.time_order) {
                const year = new Date().getFullYear();
                const [date, month] = contact.date_order.split('/');

                fullDate = `${year}-${month}-${date}`;
            }

            const  data = {
                cart: cart,
                timeDelivery: 60,
                address: {
                    name: contact.name,
                    telephone: contact.tel,
                    fullAddress: contact.street ? `${contact.street} д ${contact.house}` : '',
                    apartment: contact.apartment ?? null,
                    entrance: contact.door ?? null,
                    stage: contact.stage ?? null,
                    preOrder: (contact.date_order && contact.time_order) ? 1 : 0,
                    preOrderDate: fullDate ? fullDate : '',
                    preOrderTime: contact.time_order ? contact.time_order : ''
                },
                price: {
                    regular: regular,
                    total: total,
                    promoCode: promoCode ? promoCode.promocode : ''
                },
                payToCart: (!contact.calculation && !contact.pay) ? 1 : 0,
                payFull: contact.calculation ? 1 : 0,
                payChange: contact.pay ? contact.pay : null,
                comment: contact.message ? contact.message : ''
            }

            return axios.post(apiUrl + 'order', data);

        }
    }
}
</script>