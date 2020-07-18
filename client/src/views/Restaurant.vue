<template>
  <div v-if="restaurant">
    <v-img src="@/assets/wineanddine.jpg" height="250">
      <v-btn class="px-0 white" min-width="36" absolute top left @click="onGoBackPressed">
        <v-icon color="secondary lighten-2">mdi-chevron-left</v-icon>
      </v-btn>
      <div class="img-bottom">
        <v-container>
          <v-row no-gutters>
            <h2 class="title white--text">{{ restaurant.title }}</h2>
          </v-row>
          <v-row no-gutters>
            <v-col cols="6">
              <v-icon color="orange">mdi-map-marker</v-icon>
              <span class="body-2 white--text">inom 2km</span>
            </v-col>
            <v-col cols="6" class="text-end">
              <StarRating class="mr-4" v-model="restaurant.rating" font-size="subtitle-1" justify="end" font-color="white--text"/>
            </v-col>
          </v-row>
        </v-container>
      </div>
    </v-img>
    <v-container>
      <div class="py-2"></div>
      <h3 class="subtitle-2">Information</h3>
      <div class="py-2"></div>
      <p class="caption">
        {{ restaurant.description }}
      </p>
      <h3 class="subtitle-2">Meny</h3>
    </v-container>
    <v-sheet color="grey lighten-3" tile>
      <v-container>
        <div v-for="(category, index) in categories" :key="index">
          <h4 class="overline py-4">{{ category.category }}</h4>
          <ProductCard v-for="product in category.products" :key="product.id" :product="product" />
        </div>
      </v-container>
    </v-sheet>
    <v-sheet v-show="getTotalOrderItems" class="py-10" color="grey lighten-3"></v-sheet>
  </div>
</template>

<script>
import StarRating from "@/components/core/StarRating";
import ProductCard from "@/components/restaurant/ProductCard";
import { mapActions, mapGetters } from "vuex";

export default {
  name: "Restaurant",
  mounted() {
    this.fetchRestaurant();
    this.fetchCategoriesWithProducts();
    this.restaurant = this.getRestaurant;
    this.categories = this.getCategoriesWithProducts
  },
  data: () => ({
    restaurant: null,
    categories: null, 
  }),
  computed: {
    ...mapGetters("Restaurant", [
      "getRestaurant", 
      "getCategoriesWithProducts"
    ]),
    ...mapGetters("Order", [
      "getTotalOrderItems", 
    ])
  },
  methods: {
    ...mapActions("Restaurant", [
      "fetchRestaurant",
      "fetchCategoriesWithProducts",
    ]),
    onGoBackPressed() {
      this.$router.go(-1);
    },
  },
  components: {
    StarRating,
    ProductCard,
  },
};
</script>

<style scoped>
.v-btn {
  border-radius: 10px !important;
}

.img-bottom {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
}
</style>
