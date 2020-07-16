<template>
  <v-sheet>
    <h3>Trender</h3>
    <v-slide-group v-model="model" center-active active-class="success">
      <v-slide-item v-for="n in 4" :key="n" v-slot:default="{ active, toggle }">
        <v-card
          :color="active ? undefined : 'grey lighten-1'"
          class="my-4 mr-4"
          height="100"
          width="200"
          @click="toggle"
        >
          <v-row class="fill-height" align="center" justify="center">
            <v-scale-transition>
              <v-icon v-if="active" color="white" size="48" v-text="'mdi-close-circle-outline'"></v-icon>
            </v-scale-transition>
          </v-row>
        </v-card>
      </v-slide-item>
    </v-slide-group>
  </v-sheet>
</template>

<script>
export default {
  name: "FeaturedSection",
  data: () => ({
    model: null
  })
};
</script>