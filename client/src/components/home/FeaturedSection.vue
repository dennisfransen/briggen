<template>
  <v-sheet>
    <h3>Trender</h3>
    <v-slide-group v-model="model" center-active active-class="success">
      <v-slide-item v-for="feature in featured" :key="feature.id">
        <v-card class="my-4 mr-4 border-10 m-left" height="100" width="200">
          <v-img height="100" src="@/assets/food1.jpg">
            <v-sheet height="100%" color="rgba(255, 255, 255, 0.1">
              <v-row class="fill-height" align="center" justify="center">
                <h3 class="title white--text">{{ feature.title }}</h3>
              </v-row>
            </v-sheet>
          </v-img>
        </v-card>
      </v-slide-item>
    </v-slide-group>
  </v-sheet>
</template>

<script>
import { mapActions, mapGetters } from "vuex";

export default {
  name: "FeaturedSection",
  mounted() {
    this.fetchFeatured();
    this.featured = this.getFeatured;
  },
  data: () => ({
    featured: [],
    model: null,
  }),
  computed: {
    ...mapGetters("Featured", ["getFeatured"]),
  },
  methods: {
    ...mapActions("Featured", ["fetchFeatured"]),
  },
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
