<template>
  <v-sheet>
    <h3>Kategorier</h3>
    <v-slide-group v-model="model" center-active>
      <v-slide-item
          v-for="category in categories"
          :key="category.id"
          v-slot:default="{ active, toggle }"
      >
        <v-sheet @click="onGoToRestaurantPressed(category.id)">
          <v-card class="my-4 mr-4 border-10 m-left" height="100" width="100" @click="toggle">
            <v-img contain src="@/assets/plate2.jpg"></v-img>
          </v-card>
          <p class="body-2 ma-0 text-center mr-4">{{ category.title }}</p>
        </v-sheet>
      </v-slide-item>
    </v-slide-group>
  </v-sheet>
</template>

<script>
import {mapGetters, mapActions} from "vuex";

export default {
  name: "FeaturedSection",
  mounted() {
    this.fetchCategories();
    this.categories = this.getCategories;
  },
  data: () => ({
    categories: null,
    model: null
  }),
  computed: {
    ...mapGetters("Categories", [
      "getCategories"
    ])
  },
  methods: {
    ...mapActions("Categories", [
      "fetchCategories"
    ]),
    onGoToRestaurantPressed(categoryId) {
      console.log(categoryId)
      this.$router.push(`restaurants/${categoryId}`)
    }
  }
};
</script>

<style scoped>
.border-10 {
  border-radius: 10px !important;
}

.m-left {
  margin-left: 2px;
}

.v-card--link::before {
  border-radius: 10px !important;
}

</style>