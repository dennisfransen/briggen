<template>
  <v-sheet>
    <h3>Nyheter</h3>
    <v-carousel class="my-4" cycle height="260" hide-delimiters show-arrows-on-hover>
      <v-carousel-item v-for="restaurant in featuredRestaurants" :key="restaurant.id" @click="onFeaturedRestaurantPressed(restaurant.id)">
        <v-card class="border-10 m-left">
          <v-img :src="restaurant.imgUrl" height="150"></v-img>
            <v-container fill-height>
              <h4 class="title">{{ restaurant.title }}</h4>
              <v-row align="center">
                <v-col cols="5">
                  <v-icon color="orange">mdi-map-marker</v-icon>
                  <span class="subtitle-1">Inom 2km</span>
                </v-col>
                <v-col cols="7">
                  <StarRating class="mr-4" v-model="restaurant.starValue" icon-size="24" font-size="subtitle-1" justify="end"/>
                </v-col>
              </v-row>
            </v-container>
        </v-card>
      </v-carousel-item>
    </v-carousel>
  </v-sheet>
</template>

<script>
import StarRating from "@/components/core/StarRating";

export default {
  name: "FeaturedSection",
  data: () => ({
    featuredRestaurants: [
      { id: 0, title: "Briggen Restaurang", starValue: 3, imgUrl: "https://i.imgur.com/nuCQILz.jpg" },
      { id: 1, title: "Oden Bistro", starValue: 4, imgUrl: "https://i.imgur.com/FxUqTp1.jpg" }
    ],
  
  }),
  methods: {
    onFeaturedRestaurantPressed(restaurantId) {
      this.$router.push(`/restaurant/${restaurantId}`)
    }
  },
  components: {
    StarRating,
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
</style>