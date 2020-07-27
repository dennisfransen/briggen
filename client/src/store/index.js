import Vue from "vue";
import Vuex from "vuex";
import router from "@/router";
import Vouchers from "./Vouchers";
import Order from "./Order";
import Restaurant from "./Restaurant";
import Categories from "./Categories";
import Featured from "./Featured";
import MyRestaurant from "./MyRestaurant";
import AuthenticationService from "../services/AuthenticationService";
import createPersistedState from "vuex-persistedstate";

Vue.use(Vuex);

export default new Vuex.Store({
  plugins: [
    createPersistedState({
      paths: [
        "user",
        "token"
      ]
    })
  ],
  strict: true,
  state: {
    user: null,
    loading: false,
    error: null,
    token: null,
  },
  mutations: {
    setUser(state, payload) {
      state.user = payload;
    },
    setToken(state, payload) {
      state.token = payload;
    },
    setLoading(state, payload) {
      state.loading = payload;
    },
    setError(state, payload) {
      state.error = payload;
    },
  },
  actions: {
    login({commit}, form) {
      commit("setError", null);
      commit("setLoading", true);

      AuthenticationService.login(form)
        .then(response => {
          commit("setToken", response.data.data.access_token);
          commit("setUser", response.data.data.user);

          router.replace("/");
        })
        .catch(() => {
          commit("setError", "Lösenordet stämmer inte");
        })
        .finally(() => {
          commit("setLoading", false);
        });
    },
    register({commit}, form) {
      commit("setError", null);
      commit("setLoading", true);

      AuthenticationService.register(form)
        .then(response => {
          commit("setToken", response.data.data.access_token);
          commit("setUser", response.data.data.user);

          router.replace("/");
        })
        .catch(() => {
          commit("setError", "Lösenordet stämmer inte");
        })
        .finally(() => {
          commit("setLoading", false);
        });
    },
    logout({commit}) {
      commit("setUser", null);
      commit("setToken", null);
      router.replace("/login");
    },
    setUser({commit}, user) {
      commit("setUser", user);
    },
    setToken({commit}, token) {
      commit("setToken", token);
    }
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
    Order,
    Restaurant,
    Categories,
    Featured,
    MyRestaurant,
  },
});
