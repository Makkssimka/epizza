import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
	state: {
		basket: [],
		visible: false,
		last: 'корзина пуста',
		basketMessage: 'Добавлено в корзину:'
	},
	getters: {
		BASKET: state => {
			return state.basket;
		},

		BASKET_LEN: state => {
			let len = 0;
			state.basket.forEach( elem => {
				len = len + elem.count;
			});
			return len;
		},

		BASKET_TOTAL: state => {
			let total = 0;
			state.basket.forEach(item => {
				total += item.product.price*item.count 
			});
			return total;
		},

		BASKET_MESSAGE: state => {
			return state.basketMessage;
		},

		VISIBLE: state => {
			return state.visible;
		},

		LAST: state => {
			return state.last;
		}
	},
	mutations: {
		UP_BASKET: state => {
			localStorage.setItem('basket', JSON.stringify(state.basket));
		}
	},
	actions: {

		GET_BASKET: context => {
			context.state.basket = localStorage.getItem('basket')?JSON.parse(localStorage.getItem('basket')):[];
		},

		ADD_BASKET: (context, product) => {

			let pr = context.state.basket.find((item) => (item.product.id == product.id && item.product.title == product.title));
			if(pr){
				pr.count++;
			}
			else{
				context.state.basket.push({
					product: product,
					count: 1
				});
			}
			context.commit('UP_BASKET');

			context.state.basketMessage = "Добавлено в корзину:";
			context.state.last = `${product.title} 1 шт`;
			context.state.visible = true;
			setTimeout(() => context.state.visible = false, 2000);
		},

		REMOVE_BASKET: (context, product) => {
			let bask = context.state.basket;
			let pr = bask.findIndex((item) => (item.product.id == product.id && item.product.title == product.title));

			if(bask[pr].count > 1){
				bask[pr].count--;
			}
			else{
				bask.splice(pr, 1);
			}
			context.commit('UP_BASKET');

			context.state.basketMessage = "Удалено из корзины:";
			context.state.last = `${product.title} 1 шт`;
			context.state.visible = true;
			setTimeout(() => context.state.visible = false, 1000);
		},

		REMOVE_ITEM_COUNT: (context, item) => {
			let bask = context.state.basket;
			if(item.count > 1){
				item.count--;
			}
			else{
				bask.splice(item.index, 1);
			}
			context.commit('UP_BASKET');
		},

		REMOVE_ITEM: (context, index) => {
			let bask = context.state.basket;
			bask.splice(index, 1);
			context.commit('UP_BASKET');
		},

		ADD_ITEM_COUNT: (context, item) => {
			item.count++;
			context.commit('UP_BASKET');
		},

	}
})
