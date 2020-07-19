export default {
  namespaced: true,
  state: {
    categories: [],
    loading: false,
    error: null,
  },
  mutations: {
    setCategories(state, payload) {
      state.categories = payload;
    },
    setLoading(state, payload) {
      state.loading = payload;
    },
    setError(state, payload) {
      state.error = payload;
    },
  },
  actions: {
    fetchCategories({ commit }) {
      const categories = [
        { id: 0, title: "Asiatiskt", imgUrl: "" },
        { id: 1, title: "Grekiskt", imgUrl: "" },
        { id: 2, title: "Amerikanskt", imgUrl: "" },
        { id: 3, title: "Italienskt", imgUrl: "" },
      ];
      commit("setCategories", categories);
    }
  },
  getters: {
    getCategories: (state) => {
      return state.categories;
    },
  },
};
