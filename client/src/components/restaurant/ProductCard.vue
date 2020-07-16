<template>
  <v-card class="product-card">
    <v-container fill-height py-0>
      <v-row align="center">
        <v-col cols="10" class="py-2">
          <v-row align="center" no-gutters>
            <v-col cols="auto" class="mr-3">
              <v-img height="64" width="64" src="@/assets/plate2.jpg"></v-img>
            </v-col>
            <v-col cols="8">
              <div style="max-width: 100%">
                <h4 class="subtitle-2 product-title">{{ product.title }}</h4>
              </div>
              <p class="caption green--text mb-0 mt-1">{{ product.price }}.00 SEK</p>
              <StarRating v-model="starValue" icon-size="15" font-size="caption"/>
            </v-col>
          </v-row>
        </v-col>
        <v-col cols="2" class="text-end py-1">
          <v-btn icon x-small class="grey" color="white" @click="increaseProductCount">
            <v-icon small>mdi-plus</v-icon>
          </v-btn>
          <div class="mt-1 ml-auto product-count text-center">
            {{ productCount }}
          </div>
          <v-btn icon x-small class="grey" color="white" @click="decreaseProductCount">
            <v-icon small>mdi-minus</v-icon>
          </v-btn>
        </v-col>
      </v-row>
    </v-container>
  </v-card>
</template>

<script>
import StarRating from "@/components/core/StarRating";

export default {
  name: "ProductCard",
  props: {
    product: Object,
  },
  data: () => ({
    productCount: 0,
    starValue: "4.5",
  }),
  methods: {
    increaseProductCount() {
      this.productCount++;
    },
    decreaseProductCount() {
      if (this.productCount < 1) return;
      this.productCount--;
    }
  },
  components: {
    StarRating,
  },
};
</script>

<style scoped>
.product-card {
  border-radius: 10px !important;
}

.product-title {
  text-overflow: ellipsis;
  white-space: nowrap;
  overflow: hidden;
}

.product-count {
  height: 20px;
  width: 20px;
  border-radius: 100%;
  border: 1.5px solid grey;
  margin: 0.2em 0;
  font-size: 0.675rem;
  font-weight: 700;
  line-height: 18px;
}
</style>
