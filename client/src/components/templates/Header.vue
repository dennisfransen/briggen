<template>
  <div>
    <v-app-bar app dense flat hide-on-scroll>
      <v-toolbar-title>
        <router-link to="/" class="app-title">
          <h1 class="secondary--text font-weight-light">Siediti</h1>
        </router-link>
      </v-toolbar-title>
      <v-spacer></v-spacer>
      <v-btn v-if="getHasOrdered" icon @click="onOrdersPressed">
        <v-icon>mdi-cart-arrow-right</v-icon>
      </v-btn>
      <v-btn icon @click="onCurrentRestaurantPressed">
        <v-icon>mdi-table-chair</v-icon>
      </v-btn>
      <v-btn icon @click="onSearchPressed">
        <v-icon>mdi-magnify</v-icon>
      </v-btn>
      <v-app-bar-nav-icon @click="drawer = !drawer" />
    </v-app-bar>

    <v-expand-transition>
      <SearchSection v-show="search" />
    </v-expand-transition>
    <v-navigation-drawer app v-model="drawer" temporary bottom right>
      <v-list>
        <v-list-item-group v-model="item" color="primary">
          <v-list-item v-for="(item, i) in items" :key="i" :to="item.link">
            <v-list-item-icon>
              <v-icon v-text="item.icon"></v-icon>
            </v-list-item-icon>
            <v-list-item-content>
              <v-list-item-title v-text="item.text"></v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </v-list-item-group>
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
import SearchSection from "@/components/home/SearchSection";

import { mapGetters, mapActions } from "vuex";

export default {
  name: "Header",
  data: () => ({
    drawer: false,
    search: false,
    item: null,
    items: [
      { icon: "mdi-apps", text: "Administrera", link: "/admin"}
    ]
  }),
  computed: {
    ...mapGetters(["getUser"]),
    ...mapGetters("Order", [
			"getHasOrdered"
		]),
  },
  methods: {
    ...mapActions(["logout"]),
    onSearchPressed() {
      this.search = !this.search;
      this.$emit('searchPressed', this.search);
    },
    onCurrentRestaurantPressed(restaurantId) {
      this.$router.push(`/restaurant/${restaurantId}`)
    },
    onOrdersPressed() {
      this.$router.push("/ordered")
    }
  },
  components: {
    SearchSection,
  }
};
</script>

<style>
.app-title {
  text-decoration: none;
  font-family: 'Pacifico', cursive;
  font-family: 'Damion', cursive;
  font-size: 0.8rem;
}

h1 {
  padding-right: .1em;
}

</style>
