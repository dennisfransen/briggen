<template>
  <v-container fill-height>
    <Coin :number="getCoins" />
    <v-card class="mx-auto" max-width="500" dark flat color="transparent">
      <v-card-text>
        <v-text-field light clearable label="Kod" solo rounded v-model="submitCode" @keyup.enter="consume"></v-text-field>
        <v-btn block class="py-6 mb-6" color="accent" rounded @click="consume(submitCode)">Samla myntet</v-btn>
        <v-btn block class="py-6" color="success" rounded @click="openDialog">Klicka för Gratis lunch</v-btn>
        <div class="py-6"></div>
        <p class="body-1 mx-2 text-center">
          Med hjälp av denna app kan du få gratis lunch. 
          Skriv in koden som står på disken och klicka på "samla myntet". 
          Samla på dig 10 mynt som du kan använda när du vill.
        </p>
      </v-card-text>

      <v-alert class="text-center" dismissible v-if="getError" type="error">
        {{ getError }}
      </v-alert>
    </v-card>

    <v-dialog v-model="dialog" width="500">
      <UseCoins :dialog="dialog" @closeDialog="closeDialog" />
    </v-dialog>
  </v-container>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
import Coin from "@/components/Coin";
import UseCoins from "@/components/Dialogs/UseCoins";

export default {
  name: "Home",
  data: () => ({
    submitCode: "",
    code: "abc",
    dialog: false,
  }),
  created() {
    this.fetchStampCount();
  },
  computed: {
    ...mapGetters("Vouchers", ["getCoins", "getLoading", "getError"]),
    notAbleToGetFreeLunch() {
      return this.getCoins < 10;
    },
  },
  methods: {
    ...mapActions("Vouchers", ["consume", "fetchStampCount"]),
   
    openDialog() {
      this.dialog = true;
    },
    closeDialog(value) {
      this.dialog = value;
    }
  },
  components: {
    Coin,
    UseCoins,
  },
};
</script>
