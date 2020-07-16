<template>
  <div>
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
              <v-icon color="yellow">mdi-star</v-icon>
              <v-icon color="yellow">mdi-star</v-icon>
              <v-icon color="yellow">mdi-star</v-icon>
              <v-icon color="yellow">mdi-star</v-icon>
              <v-icon color="grey">mdi-star</v-icon>
              <span class="body-2 white--text font-weight-bold">4.5</span>
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
          <ProductCard v-for="product in category.products" :key="product.id" :product="product" class="mb-2"/>
        </div>
      </v-container>
    </v-sheet>
    <v-sheet class="py-12" color="grey lighten-3"></v-sheet>
  </div>
</template>

<script>
import ProductCard from "@/components/restaurant/ProductCard";

export default {
  name: "Restaurant",
  data: () => ({
    restaurant: {
      title: "Restaurang Briggen",
      description:
        "Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos temporibus dicta quas doloribus molestias reiciendis aut, similique incidunt excepturi vero iste facere modi magnam veritatis neque ut architecto porro impedit, voluptas quos deleniti commodi, dolor quamaliquid. Magni, a eos!",
    },
    categories: [
      {
        id: 0,
        category: "Huvudrätter",
        products: [
          { id: 0, categoryId: 0, title: "Spaghetti Bolognese", price: "95" },
          { id: 1, categoryId: 0, title: "Spetta med Citronsås", price: "89" },
          { id: 2, categoryId: 0, title: "Oxfilé med klyftpotatis och sås", price: "120" },
        ],
      },
      {
        id: 1,
        category: "Efterrätter",
        products: [
          { id: 3, categoryId: 1, title: "Kladdkaka med grädde", price: "110" },
          { id: 4, categoryId: 1, title: "Rabarberpaj", price: "85" },
          { id: 5, categoryId: 1, title: "Maräng med colaglass", price: "180" },
        ],
      },
    ],
  }),
  methods: {
    onGoBackPressed() {
      this.$router.go(-1);
    },
  },
  components: {
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
