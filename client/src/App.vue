<template>
  <v-app>
    <Headery @searchPressed="searchPressed" />
    <v-content :class="search ? 'pa-0' : null">
      <router-view />
    </v-content>
  </v-app>
</template>

<script>
import Headery from "@/components/templates/Header";

export default {
  name: "App",
  data: () => ({
    search: false,
  }),
  methods: {
    searchPressed(search) {
      this.search = search;
    }
  },
  components: {
    Headery
  }
};
</script>
