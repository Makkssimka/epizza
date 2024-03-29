import Vue from 'vue'
import Vuex from 'vuex'
import axios from "axios";

Vue.use(Vuex)

export default new Vuex.Store({
	state: {
		basket: [],
		visible: false,
		last: 'корзина пуста',
		basketMessage: 'Добавлено в корзину:',
		pizzaActive: null,
		contact: null,
		promocode: null,
		url: "https://epizza.su/api/",
		apiUrl: 'https://rest.epizza.su/api/', //'http://127.0.0.1:8000/api/'
		twoVis: false,
		twoPizza: {
			left: null,
			right: null
		},
		settings: {}
	},
	getters: {
		BASKET: state => {
			return state.basket;
		},

		URL: state => {
			return state.url;
		},

		API_URL: state => {
			return state.apiUrl;
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

		PROMO_TOTAL: state => {
			let total = 0;
			state.basket.forEach(item => {
				total += item.product.price*item.count 
			});

			if(state.promocode){
				if (state.promocode.rulesPrice) {
					total = state.promocode.rulesPrice;
				}
				else if(state.promocode.rulesSale){
					total = total - state.promocode.rulesSale;
				}
				else{
					total = total - Math.floor(total*state.promocode.procent/100);
				}
			}

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
		},

		PIZZA_ACTIVE: state => {
			return state.pizzaActive;
		},

		CONTACT: state => {
			return state.contact;
		},

		PROMOCODE: state => {
			return state.promocode;
		},

		TWO_VISBLE: state => {
			return state.twoVis;
		},
		TWO_PIZZA: state => {
			return state.twoPizza;
		},
		SETTINGS: state => {
			return state.settings;
		}
	},
	mutations: {
		UP_BASKET: state => {
			localStorage.setItem('basket', JSON.stringify(state.basket));
		},
		SET_SETTINGS: (state, settings) => {
			state.settings = settings;
		}
	},
	actions: {

		SET_PROMOCODE: (context, promo) => {
			context.state.promocode = promo;
		},

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

		CLEAR_BASKET: (context) => {
			context.state.basket = [];
			context.commit('UP_BASKET');
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

		SET_ACTIVE_PIZZA: (context, pizza) => {
			context.state.pizzaActive = pizza;
		},

		UNSET_ACTIVE_PIZZA: context => {
			context.state.pizzaActive = null;
		},

		ADD_CONTACT: (context, contact) => {
			context.state.contact = contact;
		},

		REMOVE_CONTACT: context => {
			context.state.contact = null;
		},

		SET_TWO_VIS: (context, status) => {
			context.state.twoVis = status;
			context.state.twoPizza.left = null;
			context.state.twoPizza.right = null;
		},
		SET_TWO_PIZZA: (context, pizza) => {
			let twoPizza = context.state.twoPizza;
			if(twoPizza.left){
				twoPizza.right = pizza;
			}
			else{
				twoPizza.left = pizza;
			}
		},
		REMOVE_TWO_PIZZA: (context, position) => {
			context.state.twoPizza[position] = null;
		},
		LOAD_SETTINGS: ({commit, state}) => {
			axios.get(state.apiUrl + 'settings-list')
				.then(response => {
					commit('SET_SETTINGS', response.data);
				})
		}

	}
})
