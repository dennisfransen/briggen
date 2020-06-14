import Vue from "vue";
import Vuex from "vuex";
import router from "@/router";
import Vouchers from "./Vouchers";

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    user: null,
    loading: false,
    error: null,
  },
  mutations: {
    setUser(state, payload) {
      state.user = payload;
    },
    setLoading(state, payload) {
      state.loading = payload;
    },
    setError(state, payload) {
      state.error = payload;
    },
  },
  actions: {
    login({ commit }, { email, password }) {
      const user = {
        email: email,
        password: password,
      };

      commit("setUser", user);
      router.replace("/");
    },
    register({ commit }, { email, password, passwordVerify }) {
      commit("setError", null);
      commit("setLoading", true);
      if (password !== passwordVerify) {
        commit("setError", "Lösenordet stämmer inte");
        commit("setLoading", false);
        return;
      }

      const user = {
        email: email,
        password: password,
      };

      commit("setUser", user);
      router.replace("/");
    },
    logout({ commit }) {
      commit("setUser", null);
      router.replace("/login");
    },
  },
  getters: {
    getUser: (state) => {
      return state.user;
    },
    getLoading: (state) => {
      return state.loading;
    },
    getError: (state) => {
      return state.error;
    },
  },
  modules: {
    Vouchers,
  },
});
