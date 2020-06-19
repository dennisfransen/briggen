import VoucherService from "@/services/VoucherService";
import StampService from "@/services/StampService";

export default {
  namespaced: true,
  state: {
    coins: 0,
    loading: false,
    error: null,
    stamp: {
      id: null,
      count: null
    }
  },
  mutations: {
    setStamp(state, payload) {
      state.stamp = payload;
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
          commit("setStamp", response.data.data);
          dispatch("fetchStampCount");
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
    async fetchStampCount({ commit, rootGetters }) {
      commit("setError", null);
      commit("setLoading", true);
      await StampService.showFirstByUser(rootGetters.getUser.id)
        .then((response) => {
          commit("setStamp", response.data.data);
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
      return state.stamp.count ? Number(state.stamp.count) : 0;
    },
    getStampId: (state) => {
      return state.stamp.id ?? null;
    },
    getLoading: (state) => {
      return state.loading;
    },
    getError: (state) => {
      return state.error;
    },
  },
};
