<template>
  <v-app-bar app flat color="white" height="64">
    <!-- <v-btn icon>
      <v-icon>mdi-bell</v-icon>
    </v-btn> -->

    <v-spacer></v-spacer>

    <v-toolbar-title>
      <router-link to="/" class="app-title">
        <span class="secondary--text font-weight-bold">DIS</span>
        <span class="secondary--text font-weight-light">EVENT</span>
      </router-link>
    </v-toolbar-title>

    <v-spacer></v-spacer>

    <!-- <v-app-bar-nav-icon @click="drawer = !drawer" /> -->
  </v-app-bar>
</template>

<script>
export default {
  name: "Header",
  data: () => ({
    drawer: false,
  }),
};
</script>

<style>
.app-title {
  text-decoration: none;
}
</style>
