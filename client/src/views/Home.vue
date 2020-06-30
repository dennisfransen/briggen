<template>
  <v-container class="px-6">
    <!-- <TopSection /> -->
    <div class="py-2"></div>
    <CreditCard :balance="getCoins" />
    <v-text-field
      class="mt-12"
      light
      label="Kod"
      solo
      v-model="submitCode"
      @keyup.enter="consumeVoucher"
    ></v-text-field>
    <v-btn block class="py-6 mb-6" dark color="orange" @click="consumeVoucher">Hämta myntet</v-btn>
    <v-btn
      block
      class="py-6"
      color="success"
      @click="openDialog"
      :disabled="notAbleToGetFreeLunch"
    >Klicka för Gratis lunch</v-btn>
    <div class="py-4"></div>
    <p class="body-1 mx-2 text-center">
      Med hjälp av denna app kan du få gratis lunch. Skriv in koden som står på
      disken och klicka på "samla myntet". Samla på dig 10 mynt som du kan
      använda när du vill.
    </p>

    <v-alert class="text-center" dismissible v-if="getError" type="error">{{ getError }}</v-alert>

    <v-dialog v-model="dialog" width="500">
      <UseCoins :dialog="dialog" @closeDialog="closeDialog" @consumed="fetchStampCount" />
    </v-dialog>
  </v-container>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
import UseCoins from "@/components/Dialogs/UseCoins";
import TopSection from "@/components/TopSection"; //eslint-disable-line
import CreditCard from "@/components/CreditCard";

export default {
  name: "Home",
  data: () => ({
    submitCode: "",
    code: "abc",
    dialog: false
  }),
  created() {
    this.fetchStampCount();
  },
  computed: {
    ...mapGetters("Vouchers", ["getCoins", "getLoading", "getError"]),
    notAbleToGetFreeLunch() {
      return this.getCoins < 10;
    }
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
    },
    goToProfile() {
      this.$router.replace("/");
    }
  },
  components: {
    UseCoins,
    CreditCard,
    TopSection//eslint-disable-line
  }
};
</script>
