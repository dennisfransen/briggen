<template>
  <v-sheet>
    <h3>Nyheter</h3>
    <v-carousel class="my-4" cycle height="260" hide-delimiters show-arrows-on-hover>
      <v-carousel-item v-for="restaurant in featuredRestaurants" :key="restaurant.id" @click="onFeaturedRestaurantPressed(restaurant.id)">
        <v-card class="border-10 m-left">
          <v-img :src="restaurant.presentation_image_url" height="150"></v-img>
            <v-container fill-height>
              <h4 class="title">{{ restaurant.title }}</h4>
              <v-row align="center">
                <v-col cols="5">
                  <v-icon color="orange">mdi-map-marker</v-icon>
                  <span class="subtitle-1">Inom 2km</span>
                </v-col>
                <v-col cols="7">
                  <StarRating class="mr-4" v-model="restaurant.star_value" icon-size="24" font-size="subtitle-1" justify="end"/>
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
import CorporationService from "@/services/CorporationService";

export default {
  name: "FeaturedSection",
  data: () => ({
    featuredRestaurants: [],
  
  }),
  created() {
    CorporationService.index()
        .then(response => {
          this.featuredRestaurants = response.data.data;
        });
  },
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