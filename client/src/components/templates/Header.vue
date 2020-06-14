<template>
  <div>
    <v-app-bar app flat color="transparent" height="64">
      <v-btn icon v-if="getUser">
        <v-icon>mdi-account</v-icon>
      </v-btn>
      <v-spacer></v-spacer>
      <v-toolbar-title>
        <router-link to="/" class="app-title">
          <span class="secondary--text font-weight-bold">DIS</span>
          <span class="secondary--text font-weight-light">EVENT</span>
        </router-link>
      </v-toolbar-title>
      <v-spacer></v-spacer>
      <v-app-bar-nav-icon v-if="getUser" @click="drawer = !drawer" />
    </v-app-bar>

    <v-navigation-drawer app v-model="drawer" temporary right width="100%">
      <v-list>
        <!-- <v-list-item-group v-model="item" color="primary">
          <v-list-item v-for="(item, i) in items" :key="i" :to="item.link">
            <v-list-item-icon>
              <v-icon v-text="item.icon"></v-icon>
            </v-list-item-icon>
            <v-list-item-content>
              <v-list-item-title v-text="item.text"></v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </v-list-item-group> -->
        <v-list-item-group>
          <v-list-item @click="logout">
            <v-list-item-icon>
              <v-icon>mdi-logout</v-icon>
            </v-list-item-icon>
            <v-list-item-content>
              <v-list-item-title>Logout</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </v-list-item-group>
      </v-list>
    </v-navigation-drawer>
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";

export default {
  name: "Header",
  data: () => ({
    drawer: false,
  }),
  computed: {
    ...mapGetters(["getUser"]),
  },
  methods: {
    ...mapActions(["logout"]),
  },
};
</script>

<style>
.app-title {
  text-decoration: none;
}
</style>
