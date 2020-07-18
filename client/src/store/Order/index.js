
export default {
  namespaced: true,
  state: {
    order: [],
    loading: false,
    error: null,
  },
  mutations: {
    setProduct(state, payload) {
      state.order.push(payload);
    },
    deleteProduct(state, payload) {
      const productToBeDeleted = state.order.find(product => product.id === payload.id)
      const indexOfProduct = state.order.indexOf(productToBeDeleted)
      if (indexOfProduct > -1) {
         state.order.splice(indexOfProduct, 1) 
      }
    },
    setLoading(state, payload) {
      state.loading = payload;
    },
    setError(state, payload) {
      state.error = payload;
    },
  },
  actions: {
    addProductToOrder({ commit }, payload) {
      commit("setLoading", true);
      commit("setError", null);
      const product = {
        id: payload.id,
        title: payload.title,
        price: payload.price
      }
      commit("setProduct", product);
      commit("setLoading", false);
    },
    removeProductFromOrder({ commit }, payload) {
      commit("setLoading", true);
      commit("setError", null);
      commit("deleteProduct", payload);
      commit("setLoading", false);
    }
  },
  getters: {
    getTotalOrderItems: (state) => {
      return state.order.length;
    },
    getTotalValue: (state) => {
      let totalPrice = 0;
      state.order.forEach(product => {
        totalPrice += product.price 
      });

      return totalPrice;
    }
  },
};
