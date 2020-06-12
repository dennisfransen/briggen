import axios from "axios";
import store from "@/store/index";

export default () => {
  return axios.create({
    baseURL: process.env.VUE_APP_API + "/api/v1/",
    headers: {
      Authorization: `Bearer ${store.state.token}`,
      "Content-Type": "application/json",
      Accept: "application/json"
    }
  });
};
