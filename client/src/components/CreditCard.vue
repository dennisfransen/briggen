<template>
  <v-card class="mx-auto credit-card secondary" height="160" width="400">
    <v-img src="../assets/logo_footer.png" contain class="my-image"></v-img>
    <v-card-text class="white--text">
      <h2 class="title">
        <span>Hejsan, </span>
        <span>Dennis Fransén</span>
      </h2>
      <!-- <p class="mb-6 body-1">Balans</p> -->
      <p class="mb-6 body-1">Briggen</p>
      <p class="font-weight-black" style="font-size: 1.7rem">${{ balance }}</p>
    </v-card-text>
  </v-card>
</template>

<script>
export default {
  name: "CreditCard",
  props: {
    balance: Number,
  },
};
</script>

<style scoped>
.credit-card {
  border-radius: 15px !important;
}

.my-image {
  position: absolute;
  right: 30px;
  top: 20px;
  bottom: 20px;
  width: 80px;
}
</style>
