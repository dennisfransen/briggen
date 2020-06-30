<template>
  <v-app>
    <Headery v-if="getUser" />
    <v-content>
      <router-view />
    </v-content>
  </v-app>
</template>

<script>
import Headery from "@/components/templates/Header";
import { mapGetters } from "vuex";

export default {
  name: "App",
  computed: {
    ...mapGetters(["getUser"])
  },
  components: {
    Headery
  }
};
</script>

<style scoped>
/* .my-bg {
  background-image: url("./assets/grass.jpg");
  background-position: center;
  background-size: cover;
}

.secondary-bg {
  background-color: #272727;
} */
</style>