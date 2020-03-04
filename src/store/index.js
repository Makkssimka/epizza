import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
	state: {
		basket: [],
		visible: false,
		last: 'корзина пуста'
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

			let pr = context.state.basket.find((item) => item.product.id == product.id);
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

			context.state.last = `${product.title} 1 шт`;
			context.state.visible = true;
			setTimeout(() => context.state.visible = false, 2000);
		}
	}
})
