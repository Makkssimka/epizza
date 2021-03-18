<template>
    <div class="two-select-pizza-wrapper">
        <div class="two-pizza-window" v-touch:swipe="openTwoPizza" @touchmove.prevent="" @touchmove.stop="" :class="{'two-pizza-window-invisible': !twoVis, 'two-pizza-window-open': open}">
            <div class="two-pizza-close" @click.prevent="closeTwoPizza">
                <img src="/images/x.svg" alt="">
            </div>
            <div class="two-pizza-open" :class="{'two-pizza-open-open': open}" @click.prevent="toogleTwoPizza">
                <img src="/images/angle-up.svg" alt="">
            </div>
            <div class="two-pizza-image">
                <div v-if="twoPizza.left" class="two-img-left" :style="{'background-image': 'url('+twoPizza.left.image+')'}"></div>
                <div v-if="twoPizza.right" class="two-img-right" :style="{'background-image': 'url('+twoPizza.right.image+')'}"></div>
            </div>
            <div class="two-pizza-desc">
                <div class="head-two-desc">
                    Выберите правую и левую половнки вашей пиццы
                </div>
                <div class="subhead-two-desc">
                    Выберите понравившуюся пиццу и нажмите "Добавить"
                </div>
                <div class="left-pizza-wrapper">

                    <div class="full-two-pizza full-two-left" v-if="twoPizza.left">
                        <div class="remove-full-two-pizza" @click="removeTwoPizza('left')">
                            <img src="/images/x.svg" alt="">
                        </div>
                        <div class="full-two-img">
                            <img :src="twoPizza.left.image">
                        </div>
                        <div>{{ twoPizza.left.title }}</div>
                    </div>
                    <div class="empty-two-pizza" v-else>
                        <img src="images/pizza-simple.svg">
                        <div>левая половинка</div>
                    </div>

                    <div class="full-two-pizza full-two-right" v-if="twoPizza.right">
                        <div class="remove-full-two-pizza" @click="removeTwoPizza('right')">
                            <img src="/images/x.svg" alt="">
                        </div>
                        <div class="full-two-img">
                            <img :src="twoPizza.right.image">
                        </div>
                        <div>{{ twoPizza.right.title }}</div>
                    </div>
                    <div class="empty-two-pizza" v-else>
                        <img src="images/pizza-simple.svg">
                        <div>правая половинка</div>
                    </div>

                </div>
                <div class="two-pizza-select-size">
                    <div class="pizza-size-button">
                        <div class="pizza-size-chekbox">
                            <input type="radio" name="sizeTwo" id="m" value="m" v-model="sizeTwo">
                            <label for="m">Средняя</label>
                        </div>
                        <div class="pizza-size-chekbox">
                            <input type="radio" name="sizeTwo" id="l" value="l" v-model="sizeTwo">
                            <label for="l">Большая</label>
                        </div>
                    </div>
                    <div class="pizza-width-button">
                        <div class="pizza-size-chekbox">
                            <input type="radio" name="widthTwo" id="b" value="b" v-model="widthTwo">
                            <label for="b">Традиционное</label>
                        </div>
                        <div class="pizza-size-chekbox">
                            <input type="radio" name="widthTwo" id="t" value="t" v-model="widthTwo">
                            <label for="t">Тонкое</label>
                        </div>
                    </div>
                    <div class="pizza-add-button">
                        <router-link to="/basket" v-if="!price" class="btn-select btn" >В корзину</router-link>
                        <a href="#" v-else class="btn-select btn" @click.prevent="addBasket">Добавить в корзину за {{ price }} &#8381;</a>
                    </div>
                    <div class="pizza-close-button">
                        <a href="#" @click.prevent="closeTwoPizza">Не собирать</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: function(){
        return {
            sizeTwo: "m",
            widthTwo: "b",
            open: false
        }
    },
    computed: {
        twoVis: function(){
            return this.$store.getters.TWO_VISBLE;
        },
        twoPizza: function(){
            return this.$store.getters.TWO_PIZZA;
        },
        price: function(){
            let priceSelect = this.sizeTwo+this.widthTwo;
            if(this.twoPizza.left && this.twoPizza.right){
                let priceLeft = this.twoPizza.left.price[priceSelect];
                let priceRight = this.twoPizza.right.price[priceSelect];
                return priceLeft/2 + priceRight/2;
            }
            else{
                return 0
            }
        }
    },
    methods: {
        closeTwoPizza: function(){
            this.open = false;
            this.$store.dispatch('SET_TWO_VIS', false);
        },
        toogleTwoPizza: function(){
            this.open = !this.open;
        },
        openTwoPizza: function(direction){
            if(direction == "top"){
                this.open = true;
            }
            else{
                this.open = false;
            }
        },
        removeTwoPizza: function(position){
            this.$store.dispatch('REMOVE_TWO_PIZZA', position);
        },
        addBasket: function(){
            let product = {};
            let sz = {'m':30, 'l':35};
            let wt = {'b':'традиционное', 't':'тонкое'};

            product.id = this.twoPizza.left.id.toString()+this.twoPizza.right.id+this.sizeTwo+this.widthTwo;
            product.title = this.twoPizza.left.title + " / " + this.twoPizza.right.title;
            product.price = this.price;
            product.structure = `${sz[this.sizeTwo]} см, ${wt[this.widthTwo]} тесто, ${ this.twoPizza.left.weight[this.sizeTwo+this.widthTwo]/2 + this.twoPizza.right.weight[this.sizeTwo+this.widthTwo]/2} гр.`
            product.image = [this.twoPizza.left.images[this.widthTwo == 'b'?'bold':'thin'], this.twoPizza.right.images[this.widthTwo == 'b'?'bold':'thin']];
            product.type = 'pizza';

            this.$store.dispatch('ADD_BASKET', product);
            this.sizeTwo = "m";
            this.widthTwo = "b";
            this.closeTwoPizza();
        }
    }
}
</script>