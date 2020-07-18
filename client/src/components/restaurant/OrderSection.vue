<template>
  <v-footer app class="px-4" tile>
    <v-row align="center" justify="center">
      <v-col cols="4" class="text-center">
        <h3 class="title font-weight-black">{{ getTotalValue }}</h3>
        <p class="caption mb-0">Totalbelopp</p>
      </v-col>
      <v-col cols="4">
        <v-row justify="center">
          <v-icon small class="mr-1">mdi-silverware-fork-knife</v-icon>
          <p class="body-2 mb-0">
            <span class="font-weight-bold">{{ getTotalOrderFoodItems }} </span>
            <span class="caption">Maträtter</span>
          </p>
        </v-row>
        <v-row class="justify-center">
          <v-icon small class="mr-1">mdi-cup</v-icon>
          <p class="body-2 mb-0">
            <span class="font-weight-bold">{{ getTotalOrderDrinkItems }} </span>
            <span class="caption">Drinkar</span>
          </p>
        </v-row>
      </v-col>
      <v-col cols="4">
        <v-btn color="success">
          Beställ
        </v-btn>
      </v-col>
    </v-row>
  </v-footer>
</template>

<script>
import { mapGetters } from "vuex";

export default {
  name: "OrderSection",
  computed: {
    ...mapGetters("Order", [
      "getTotalValue",
      "getTotalOrderDrinkItems",
      "getTotalOrderFoodItems",
    ]),
  },
};
</script>
