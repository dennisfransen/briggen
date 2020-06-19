<template>
  <v-container fill-height>
    <Coin :number="getCoins" />
    <v-card class="mx-auto" max-width="500" dark flat color="transparent">
      <v-card-text>
        <v-text-field light clearable label="Kod (hint: 12345)" solo rounded v-model="submitCode" @keyup.enter="consumeVoucher"></v-text-field>
        <v-btn block class="py-6 mb-6" color="accent" rounded @click="consumeVoucher">Samla myntet</v-btn>
        <v-btn block class="py-6" color="success" rounded @click="openDialog" v-if="!notAbleToGetFreeLunch">Klicka för Gratis lunch</v-btn>
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
      <UseCoins :dialog="dialog" @closeDialog="closeDialog" @consumed="fetchStampCount"/>
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

    consumeVoucher() {
      this.consume(this.submitCode);
      this.submitCode = "";
    },
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
