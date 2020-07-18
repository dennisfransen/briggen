<template>
  <v-app>
    <Headery @searchPressed="searchPressed" />
    <v-content :class="search ? 'pa-0' : null">
      <router-view />
    </v-content>
    <v-expand-transition>
      <OrderSection v-show="getTotalOrderItems" />
    </v-expand-transition>
  </v-app>
</template>

<script>
import Headery from "@/components/templates/Header";
import OrderSection from "@/components/restaurant/OrderSection";
import { mapGetters } from "vuex";

export default {
  name: "App",
  data: () => ({
    search: false,
  }),
  computed: {
    ...mapGetters("Order", [
      "getTotalOrderItems"
    ]),
  },
  methods: {
    searchPressed(search) {
      this.search = search;
    }
  },
  components: {
    Headery,
    OrderSection,
  }
};
</script>
