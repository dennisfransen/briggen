<template>
  <v-container v-if="orderedItems">
    <v-list two-line subheader>
      <div v-for="item in orderedItems" :key="item.id" >
        <v-list-item class="px-0">
          <v-list-item-content>
            <v-list-item-title class="body-1 font-weight-bold" v-text="item.title"></v-list-item-title>
            <v-list-item-subtitle class="body-1 font-weight-light" v-text="item.timestamp"></v-list-item-subtitle>
          </v-list-item-content>

          <v-list-item-icon>
              <v-icon v-if="item.recieved" color="success">mdi-check</v-icon>
              <v-icon v-else color="warning">mdi-clock-outline</v-icon>
          </v-list-item-icon>
        </v-list-item>
        <v-divider></v-divider>
      </div>
    </v-list>
    <v-footer app class="py-4">
      <v-btn block dark color="success">Betala Notan</v-btn>
    </v-footer>
  </v-container>
</template>

<script>
import { mapGetters } from "vuex";

export default {
  name: "Ordered",
  mounted() {
    this.orderedItems = this.getOrderedItems;
  },
  data: () => ({
    orderedItems: null,
  }),
  computed: {
    ...mapGetters("Order", ["getOrderedItems"]),
  },
};
</script>

<style scoped>
.pay-btn-container {
  position: absolute;
  bottom: 1em;
  right: 0;
  left: 0;
  padding: 0 1em;
}
</style>
