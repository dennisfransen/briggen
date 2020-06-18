<script>
  import AuthenticationService from "../../services/AuthenticationService";

  export default {
    mounted() {
      this.$store.dispatch("setToken", this.$route.params.accessToken);
      AuthenticationService.viewUser(this.$route.params.userId)
        .then(response => {
          this.$store.dispatch("setUser", response.data.data);
          this.$router.push({name: "Home"});
        })
        .catch(() => {
          this.$router.push({name: "Login"});
        });
    },

    render() {
      return null;
    }
  };
</script>