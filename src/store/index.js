import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    basket: []
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
      context.state.basket.push({
        product: product,
        count: 1
      });
      context.commit('UP_BASKET');
    }
  }
})
