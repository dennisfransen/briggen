const FoodType = {
  FOOD: 0,
  DRINK: 1,
};

export default {
  namespaced: true,
  state: {
    order: [],
    ordered: [],
    hasOrdered: false,
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
    setHasOrdered(state) {
      state.hasOrdered = true;
    },
    setOrderToOrdered(state) {
      const options = { hour: "numeric", minute: "numeric" };
      const date = new Date();

      state.order.forEach(order => {
        state.ordered.unshift({
          ...order,
          id: Math.random(10),
          timestamp: date.toLocaleDateString("sv-SV", options),
          recieved: false,
        });
      })
      state.order = [];
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
        name: payload.name,
        price: payload.price,
        typeId: payload.typeId,
      }
      commit("setProduct", product);
      commit("setLoading", false);
    },
    removeProductFromOrder({ commit }, payload) {
      commit("setLoading", true);
      commit("setError", null);
      commit("deleteProduct", payload);
      commit("setLoading", false);
    },
    placeOrder({ commit }) {
      commit("setOrderToOrdered");
      commit("setHasOrdered");
    },
  },
  getters: {
    getOrderItems: (state) => {
      return state.order;
    },
    getTotalOrderDrinkItems: (state) => {
      const drinkItems = state.order.filter(product => product.typeId === FoodType.DRINK);
      return drinkItems.length;
    },
    getTotalOrderFoodItems: (state) => {
      const foodItems = state.order.filter(product => product.typeId === FoodType.FOOD);
      return foodItems.length;
    },
    getTotalOrderItems: (state) => {
      return state.order.length;
    },
    getOrderedItems: (state) => {
      return state.ordered;
    },
    getTotalValue: (state) => {
      let totalPrice = 0;
      state.order.forEach(product => {
        totalPrice += product.price 
      });

      return totalPrice.toFixed(2);
    },
    getHasOrdered: (state) => {
      return state.hasOrdered;
    }
  },
};
