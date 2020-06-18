import Api from "@/services/Api";

export default {
  register(credentials) {
    return Api().post("register", credentials);
  },
  login(credentials) {
    return Api().post("login", credentials);
  },
  logout() {
    return Api().post("logout");
  },
  viewUser(userId) {
    return Api().get("users/" + userId);
  },
  updateUser(form, userId) {
    return Api().put("users/" + userId, form);
  }
};
