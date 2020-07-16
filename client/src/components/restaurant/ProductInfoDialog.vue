<template>
    <v-card>
      <h1>{{ product.title }}</h1>
      <v-btn @click="closeDialog">
        Stäng information
      </v-btn>
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
