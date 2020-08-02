<template>
  <div>
    <v-container>
      <h3 class="title">Asiatiska restauranger</h3>
    </v-container>
    <v-list>
      <v-list-item v-for="item in restaurants" :key="item.id" class="px-0">
        <v-img :src="item.imgUrl" height="100">
          <v-sheet color="rgba(0,0,0,0.4)" height="100%" tile>
            <v-container fill-height>
              <h3 class="white--text">{{ item.title }}</h3>
              <v-row no-gutters align="center" justify="space-between">
                <StarRating
                    v-model="item.rating"
                    icon-size="18"
                    font-size="body-2"
                    font-color="white--text"
                    justify="start"
                />
                <v-sheet color="rgba(0,0,0,0.6)" class="py-1 px-2">
                  <v-icon small color="white" class="mr-1">mdi-clock-fast</v-icon>
                  <span class="body-2 white--text">{{ item.distance_time }}min</span>
                </v-sheet>
              </v-row>
            </v-container>
          </v-sheet>
        </v-img>
      </v-list-item>
    </v-list>
  </div>
</template>

<script>
import StarRating from "@/components/core/StarRating";

export default {
  name: "Restaurants",
  components: {
    StarRating
  },
  // TODO: Fetch restaurants based on this.$route.params.category_id
  data: () => ({
    restaurants : [
      {
        id: 0,
        imgUrl: 'https://cdn.vuetifyjs.com/images/lists/1.jpg',
        title: 'Brunch this weekend?',
        rating: 3.0,
        distance_time: 25,
      },
      {
        id: 1,
        imgUrl: 'https://cdn.vuetifyjs.com/images/lists/2.jpg',
        title: 'Summer BBQ',
        rating: 1.0,
        distance_time: 45,
      },
      {
        id: 2,
        imgUrl: 'https://cdn.vuetifyjs.com/images/lists/3.jpg',
        title: 'Oui oui',
        rating: 4.0,
        distance_time: 95,
      },
      {
        id: 3,
        imgUrl: 'https://cdn.vuetifyjs.com/images/lists/4.jpg',
        title: 'Birthday gift',
        rating: 3.0,
        distance_time: 10,
      },
      {
        id: 4,
        imgUrl: 'https://cdn.vuetifyjs.com/images/lists/5.jpg',
        title: 'Recipe to try',
        rating: 2.5,
        distance_time: 2,
      },
    ],
  }),
}
</script>
