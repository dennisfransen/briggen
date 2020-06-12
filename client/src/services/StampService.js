import Api from "@/services/Api";

let controller = "stamps";

export default {
  show() {
    return Api().get(`${controller}/1`);
  }
};