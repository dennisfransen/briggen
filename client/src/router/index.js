import Vue from "vue";
import VueRouter from "vue-router";
import AuthGuard from "./authGuard";
import Home from "@/views/Home";
import Login from "@/views/Login";
import Register from "@/views/Register";
import LoginFacebookCallback from "@/components/auth/LoginFacebookCallback";

Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    name: "Home",
    component: Home,
    beforeEnter: AuthGuard,
  },
  {
    path: "/login",
    name: "Login",
    component: Login,
  },
  {
    path: "/register",
    name: "Register",
    component: Register,
  },
  {
    path: '/login/facebook/callback/:userId/:userType/:accessToken',
    name: 'loginFacebookCallback',
    component: LoginFacebookCallback,
  }
];

const router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes,
});

export default router;
