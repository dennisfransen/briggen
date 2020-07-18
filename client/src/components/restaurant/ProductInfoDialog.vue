<template>
    <v-card>
      <v-btn class="close-btn" absolute top right icon @click="closeDialog">
        <v-icon>mdi-close</v-icon>
      </v-btn>
      <div class="py-2"></div>
      <v-img height="250" contain src="@/assets/plate2.jpg"></v-img>
      <div class="py-2"></div>
      <v-card-text>
        <h3 class="subtitle-1 font-weight-bold">{{ product.title }}</h3>
        <div class="py-1"></div>
        <p class="caption">{{ product.description }}</p>
        <h4 class="subtitle-2">Innehåller</h4>
        <v-row>
          <v-col cols="4">
            <p class="body-2 mb-1">Mjölk</p>
            <p class="body-2 mb-1">Soja</p>
          </v-col>
          <v-col cols="4">
            <p class="body-2 mb-1">Ägg</p>
            <p class="body-2 mb-1">Vete</p>
          </v-col>
          <v-col cols="4">
            <p class="body-2 mb-1">Jordnötter</p>
          </v-col>
        </v-row>
        <h4 class="subtitle-2">Rekommenderad dryck</h4>
        <div class="py-1"></div>
        <p class="caption">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Libero dolor</p>
      </v-card-text>
    </v-card>
</template>

<script>
export default {
  name: "ProductInfoDialog",
  mounted() {
    this.fetchFullProductInfo();
  },
  props: {
    product: Object,
    value: Boolean,
  },
  data: () => ({
    fullProduct: {},
  }),
  methods: {
    fetchFullProductInfo() {
      console.log(`Fetching full info with id: ${this.product.id}`);
    },
    closeDialog() {
      this.$emit("input", false);
    },
  },
};
</script>

<style scoped>
.close-btn {
  z-index: 1;
}
</style>