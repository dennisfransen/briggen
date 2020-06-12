import Api from "@/services/Api";

let controller = "vouchers";

export default {
  consume(code) {
    return Api().put(`${controller}/consume`, {
      code: code
    });
  }
};