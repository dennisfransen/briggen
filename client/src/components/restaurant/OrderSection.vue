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
        <v-btn color="success" @click="onOrderPressed">
          Beställ
        </v-btn>
      </v-col>
    </v-row>
    <v-dialog v-model="dialog" max-width="600">
      <v-card class="pt-5 pb-6">
        <v-card-text class="subtitle-1 font-weight-bold">
          Är du nöjd med din beställning?
        </v-card-text>
        <div class="py-3"></div>
        <v-card-text class="pb-0" v-for="(item, index) in orderItems" :key="index">
          <v-row no-gutters justify="space-between">
            <p class="body-1">
              <span class="font-weight-bold">
                {{ item.amount }} 
              </span>
              {{ item.title }}</p>
            <p class="body-1">{{ item.price }} kr/st</p>
          </v-row>
          <v-divider></v-divider>
          <div class="py-2"></div>
        </v-card-text>

        <v-card-actions class="mt-4 justify-center">
          <v-btn absolute top right icon @click="dialog = false">
            <v-icon>mdi-close</v-icon>
          </v-btn>
          <v-btn fab small color="success" @click="onOrderConfirmationPressed">
            <v-icon>mdi-check</v-icon>
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-footer>
</template>

<script>
import { mapGetters, mapActions } from "vuex";

export default {
  name: "OrderSection",
  data: () => ({
    dialog: false,
  }),
  computed: {
    ...mapGetters("Order", [
      "getOrderItems",
      "getTotalValue",
      "getTotalOrderDrinkItems",
      "getTotalOrderFoodItems",
    ]),
    orderItems() {
      let result = {};
      this.getOrderItems.forEach((item) => {
        if (!result[item.title]) {
          result[item.title] = {
            amount: 0,
            title: item.title,
            price: item.price,
          };
        }
        ++result[item.title].amount;
      });
      return result;
    },
  },
  methods: {
    ...mapActions("Order", ["placeOrder"]),
    onOrderPressed() {
      this.dialog = true;
    },
    onOrderConfirmationPressed() {
      this.dialog = false;
      this.placeOrder();
      this.$router.replace("/ordered");
    },
  },
};
</script>
