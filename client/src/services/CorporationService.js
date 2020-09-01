import Api from "@/services/Api";

let controller = "corporations";

export default {
  index() {
    return Api().get(`${controller}`);
  },
  show(id) {
    return Api().get(`${controller}/${id}`);
  }
};