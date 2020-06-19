import Api from "@/services/Api";

let controller = "stamps";

export default {
  show() {
    return Api().get(`${controller}/1`);
  },
  showFirstByUser(userId) {
    return Api().get(`${controller}/first_by_user/${userId}`);
  },
  consume(count, stampId) {
    return Api().put(`${controller}/${stampId}/consume`, {
      count: count
    });
  }
};