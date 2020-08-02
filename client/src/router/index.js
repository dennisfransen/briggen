import Vue from "vue";
import VueRouter from "vue-router";
// import AuthGuard from "./authGuard";
import LoginFacebookCallback from "@/components/auth/LoginFacebookCallback";
import Home from "@/views/Home";
import Login from "@/views/Login";
import Register from "@/views/Register";
import Restaurant from "@/views/Restaurant";
import Admin from "@/views/Admin";
import Ordered from "@/views/Ordered";
import Products from "@/views/my_restaurant/Products";
import Restaurants from "@/views/Restaurants";

Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    name: "Home",
    component: Home,
    // beforeEnter: AuthGuard,
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
    path: "/restaurant/:id",
    name: "Restaurant",
    component: Restaurant,
  },
  {
    path: "/admin",
    name: "Admin",
    component: Admin,
  },
  {
    path: "/ordered",
    name: "Ordered",
    component: Ordered,
  },
  {
    path: "/products",
    name: "Products",
    component: Products,
  },
  {
    path: "/restaurants/:category_id",
    name: "Restaurants",
    component: Restaurants,
  },
  {
    path: "/login/facebook/callback/:userId/:userType/:accessToken",
    name: "loginFacebookCallback",
    component: LoginFacebookCallback,
  },
];

const router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes,
});

export default router;
