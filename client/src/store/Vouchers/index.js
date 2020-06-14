import VoucherService from "@/services/VoucherService";
import StampService from "@/services/StampService";

export default {
  namespaced: true,
  state: {
    coins: 0,
    loading: false,
    error: null,
  },
  mutations: {
    setCoins(state, payload) {
      state.coins = payload;
    },
    setLoading(state, payload) {
      state.loading = payload;
    },
    setError(state, payload) {
      state.error = payload;
    },
  },
  actions: {
    consume({ commit, dispatch }, submitCode) {
      commit("setError", null);
      commit("setLoading", true);
      VoucherService.consume(submitCode)
        .then((response) => {
          commit("setCoins", response.data.data.count);
          dispatch("fetchStamCount");
          commit("setLoading", false);
        })
        .catch((err) => {
          commit("setError", err.response.data.errors[0]);
          commit("setLoading", false);
        })
        .finally(() => {
          submitCode = "";
        });
    },
    async fetchStampCount({ commit }) {
      commit("setError", null);
      commit("setLoading", true);
      await StampService.show()
        .then((response) => {
          commit("setCoins", response.data.data.count);
          commit("setLoading", false);
        })
        .catch((err) => {
          commit("setError", err.response.data.errors[0]);
          commit("setLoading", false);
        });
    },
  },
  getters: {
    getCoins: (state) => {
      return state.coins;
    },
    getLoading: (state) => {
      return state.loading;
    },
    getError: (state) => {
      return state.error;
    },
  },
};
