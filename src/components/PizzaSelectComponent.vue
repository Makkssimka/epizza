<template>
    <div class="pizza-select-wrapper" :class="{'pizza-select-visible': pizza}">
        <div class="pizza-select" v-if="pizza">
            <img class="close-select" src="/images/x.svg" @click="close"/>
            <div class="pizza-size-image">
                <div class="small-radius radius"></div>
                <div class="middle-radius radius"></div>
                <div class="large-radius radius"></div>
                <img v-if="width == 't'" class="pizza" :class="pizzaClass" :src="pizza.images.thin"/>
                <img v-else class="pizza" :class="pizzaClass" :src="pizza.images.bold"/>
            </div>
            <div class="pizza-select-name">{{ pizza.title }}</div>
            <div class="pizza-select-subname">{{ desc }}</div>
            <div class="pizza-select-structure">
                {{ pizza.structure.join(', ') }}
            </div>
            <div class="pizza-size-button">
                <div class="pizza-size-chekbox">
                    <input type="radio" name="size" id="s" value="s" v-model="size">
                    <label for="s">Маленькая</label>
                </div>
                <div class="pizza-size-chekbox">
                    <input type="radio" name="size" id="m" value="m" v-model="size">
                    <label for="m">Средняя</label>
                </div>
                <div class="pizza-size-chekbox">
                    <input type="radio" name="size" id="l" value="l" v-model="size">
                    <label for="l">Большая</label>
                </div>
            </div>
            <div class="pizza-width-button">
                <div class="pizza-size-chekbox">
                    <input type="radio" name="width" id="b" value="b" v-model="width">
                    <label for="b">Традиционное</label>
                </div>
                <div class="pizza-size-chekbox" :class="{'inactive-checkbox': inactive}">
                    <input type="radio" name="width" id="t" value="t" v-model="width">
                    <label for="t">Тонкое</label>
                </div>
            </div>
            <div class="pizza-add-button">
                <a href="#" class="btn-select btn" @click.prevent="addBasket(pizza)">Добавить в корзину за {{ price }} &#8381;</a>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    data: function(){
        return{
            size: 's',
            width: 'b'
        }
    },
    computed: {
        pizzaClass: function(){
            let pSize = null;
            switch(this.size){
                case 's':
                    pSize = 'pizza-small';
                    break;
                case 'm':
                    pSize = 'pizza-middle';
                    break;
                case 'l':
                    pSize = 'pizza-large';
                    break;
            }
            return pSize;
        },
        inactive: function(){
            return this.size == 's'?true:false;
        },
        desc: function(){
            let sz = {'s':25, 'm':30, 'l':35};
            let wt = {'b':'традиционное', 't':'тонкое'};
            return `${ sz[this.size] } см, ${ wt[this.width] } тесто`
        },
        pizza: function(){
            return this.$store.getters.PIZZA_ACTIVE;
        },
        price: function(){
            return this.pizza.price[this.size+this.width];
        }
    },
    watch: {
        size: function(value){
            if(value == 's') this.width = 'b';
        },
        pizza: function(value){
            if(value){
                document.body.style.overflow = 'hidden';
            }
            else{
                document.body.style.overflow = 'auto';
            }
            let elem = document.querySelector('.pizza-select-wrapper');
            setTimeout(() => {elem.scrollTop = 9999}, 100);
        }
    },
    methods: {
        close: function(){
            this.$store.dispatch('UNSET_ACTIVE_PIZZA');
            this.size = 's';
            this.width = 'b';
        },
        addBasket: function(pizza){
            let product = {};
            product.id = pizza.id + this.size + this.width;
            product.title = pizza.title;
            product.price = this.price;
            product.structure = this.desc;
            product.image = pizza.images[this.width == 'b'?'bold':'thin'];
            product.type = 'pizza';

            this.$store.dispatch('ADD_BASKET', product);
            this.$store.dispatch('UNSET_ACTIVE_PIZZA');
            this.size = 's';
            this.width = 'b';
        }
    }
}
</script>