export default {
    namespaced: true,
    state: {
      featured: [],
      loading: false,
      error: null,
    },
    mutations: {
        setFeatured(state, payload) {
        state.featured = payload;
      },
      setLoading(state, payload) {
        state.loading = payload;
      },
      setError(state, payload) {
        state.error = payload;
      },
    },
    actions: {
      fetchFeatured({ commit }) {
        const featured = [
          { id: 0, title: "Rabatter", imgUrl: "" },
          { id: 1, title: "Dina Favoriter", imgUrl: "" },
        ];
        commit("setFeatured", featured);
      }
    },
    getters: {
      getFeatured: (state) => {
        return state.featured;
      },
    },
  };
  