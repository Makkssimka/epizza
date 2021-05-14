<template>
    <div class="layout-order layout-full">
        <div class="container">
            <div class="basket-container">
                <h1>Кому доставить?</h1>
                <div class="person-info input-wrapper">
                    <input name="name" class="input required" type="text" v-model="name" placeholder="Имя">
                    <the-mask name="tel" class="input required" :mask="['+7(###) ###-##-##']" v-model="tel" placeholder="Номер телефона без 8"></the-mask>
                </div>
                <h1>Куда доставить?</h1>
                <div class="delivery-btn-wrapper">
                    <input type="checkbox" id="delivery" v-model="noDelivery">
                    <label for="delivery">Самовывоз</label>
                </div>
                <div v-if="noDelivery" class="delivery-info input-wrapper">
                    <p>Ваш заказ можете забрать по адресу:</p>
                    <p class="adress">
                        <img src="/images/map-pin.svg">
                        г.Волжский, ул.Александрова, д.9а, ТЦ "Галерея"
                    </p>
                </div>
                <div v-else class="delivery-info input-wrapper">
                    <input name="street" class="input required" type="text" v-model="street" placeholder="Название улицы">
                    <input name="house" class="input required" type="text" v-model="house" placeholder="Дом">
                    <input name="apartment" class="input required" type="text" v-model="apartment" placeholder="Квартира">
                    <input name="door" class="input required" type="text" v-model="door" placeholder="Подъезд">
                    <input name="stage" class="input required" type="text" v-model="stage" placeholder="Этаж">
                </div>
                <div class="delivery-message input-wrapper">
                    <textarea name="message" class="textarea" rows="3" v-model="message" placeholder="Примечание к заказу"></textarea>
                </div>
                <h1>Когда доставить?</h1>
                <div class="preorder-btn-wrapper">
                    <input type="checkbox" id="preorder" v-model="preorder">
                    <label for="preorder">Предзаказ</label>
                </div>
                <div v-if="preorder" class="preorder-info">
                    <the-mask name="date_order" class="input required" :mask="['##/##']" :value="dateOrder"></the-mask>
                    <the-mask name="time_order" class="input required" :mask="['##:##']" :value="timeOrder"></the-mask>
                </div>
                <div v-else class="preorder-info">
                    <p class="preorder">
                        <img src="/images/clock.svg">
                        Доставим ваш заказ в ближайшее время
                    </p>
                </div>
                <h1>Способ оплаты</h1>
                <div class="pay-btn-wrapper">
                    <input type="checkbox" id="pay" v-model="pay">
                    <label for="pay">Оплата картой</label>
                </div>
                <div v-if="pay" class="pay-info">
                    <p class="pay">
                        <img src="/images/credit-card.svg">
                        Выбрана оплата картой
                    </p>
                </div>
                <div v-else class="pay-info">
                    <input name="pay" v-if="!сalculation" class="input required" type="text" v-model="paySum" placeholder="Введите купюру">
                    <div class="pay-btn-wrapper">
                        <input name="сalculation" type="checkbox" id="сalculation" v-model="сalculation">
                        <label for="сalculation">Под расчет</label>
                    </div>
                </div>
                <div class="layout-button">
                    <router-link to="/basket" class="btn btn-grey">Вернуться к корзине</router-link>
                    <a href="#" class="btn btn-select" @click.prevent="submitForm">Заказать</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import scrollTo from "scroll-to-element";

export default {
    data: function(){
        return {
            name: null,
            tel: null,
            noDelivery: false,
            street: null,
            house: null,
            apartment: null,
            door: null,
            stage: null,
            message: null,
            preorder: null,
            pay: null,
            paySum: null,
            сalculation: null,
            resultObj: {}
        }
    },
    computed: {
        basket: function(){
            return this.$store.getters.BASKET;
        },
        dateOrder: function(){
            let date = new Date();
            let day = date.getDate().toString().length == 1?`0${date.getDate()}`:date.getDate();
            let month = (date.getMonth() + 1).toString().length == 1?`0${date.getMonth()+1}`:date.getMonth()+1;
            return `${day}${month}`;
        },
        timeOrder: function(){
            let date = new Date();
            let hours =  (date.getHours() + 1).toString().length == 1?`0${date.getHours()+1}`:date.getHours()+1;
            let minutes = date.getMinutes().toString().length == 1?`0${date.getMinutes()}`:date.getMinutes();
            return `${hours}${minutes}`;
        }
    },
    methods: {
        submitForm: function(){
            let inputs = document.querySelectorAll('.input, .textarea');
            let errors = [];

            for(let item of inputs){
                if(item.value <1 && item.classList.contains('required')){
                    item.classList.add('input-error');
                    errors.push(item);
                }
                else{
                    item.classList.remove('input-error');
                    this.resultObj[item.getAttribute('name')] = item.value;
                }
            }

            this.resultObj.сalculation = this.сalculation;

            if(errors.length){
                scrollTo(errors[0], {
                    offset: -70,
                    ease: 'out-expo'
                });
            }
            else{
                this.$store.dispatch('ADD_CONTACT', this.resultObj);
                this.$router.push('/result');
            }
        }
    }
}
</script>