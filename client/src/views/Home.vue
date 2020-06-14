<template>
  <v-container fill-height>
    <Coin :number="number" />
    <v-card class="mx-auto" max-width="500" flat>
      <v-card-text>
        <v-text-field clearable label="Kod" solo rounded v-model="submitCode" @keyup.enter="consume"></v-text-field>
        <v-btn block class="py-6 mb-6" color="accent" rounded @click="consume">Samla myntet</v-btn>
        <v-btn block class="py-6" color="success" rounded @click="consume">Klicka för Gratis lunch</v-btn>
        <div class="py-6"></div>
        <p class="body-1 mx-2 text-center">
          Med hjälp av denna app kan du få gratis lunch. 
          Skriv in koden som står på disken och klicka på "samla myntet". 
          Samla på dig 10 mynt och använd när du vill.
        </p>
      </v-card-text>

      <v-alert class="text-center" dismissible v-if="error" type="error">
        {{ error }}
      </v-alert>
    </v-card>
  </v-container>
</template>

<script>
import VoucherService from "../services/VoucherService";
import StampService from "../services/StampService";
import Coin from "@/components/Coin";

export default {
  name: "Home",
  data: () => ({
    number: 0,
    submitCode: "",
    code: "abc",
    error: null,

  }),
  created() {
    this.getCoins();
  },
  methods: {
    getCoins() {
      StampService.show().then((response) => {
        this.number = response.data.data.count;
      });
    },

    consume() {
      this.error = null;
      VoucherService.consume(this.submitCode)
        .then((response) => {
          this.number = response.data.data.count;
          this.getCoins();
        })
        .catch((err) => {
          this.error = err.response.data.errors[0];
        })
        .finally(() => {
          this.submitCode = "";
        });
    },
  },
  components: {
    Coin,
  },
};
</script>
