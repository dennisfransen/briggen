<template>
  <v-sheet>
    <h3>Nyheter</h3>
    <v-carousel class="my-4" cycle height="260" hide-delimiters show-arrows-on-hover>
      <v-carousel-item v-for="(slide, i) in slides" :key="i">
        <v-card height="100%">
          <v-img :src="url" height="60%"></v-img>
          <v-card-text class="py-0">
            <v-row>
              <v-col cols="12" class="pb-0">
                <h4 class="title white--text">Restaurang Briggen</h4>
              </v-col>
              <v-col cols="5">
                <v-icon color="orange">mdi-map-marker</v-icon>
                <span class="subtitle-1">Inom 2km</span>
              </v-col>
              <v-col cols="7" class="text-end">
                <v-icon color="yellow" v-for="n in 4" :key="n">mdi-star</v-icon>
                <v-icon class="mr-2">mdi-star</v-icon>
                <span class="font-weight-bold subtitle-1">4.5</span>
              </v-col>
            </v-row>
          </v-card-text>
        </v-card>
      </v-carousel-item>
    </v-carousel>
  </v-sheet>
</template>

<script>
export default {
  name: "FeaturedSection",
  data: () => ({
    slides: ["First", "Second", "Third", "Fourth", "Fifth"],
    url:
      "https://assets.simpleviewcms.com/simpleview/image/fetch/c_fill,f_jpg,h_400,q_65,w_587/https://media.newmindmedia.com/TellUs/image/%3Ffile%3D180D723314CFB5F03B8C57B2E07D5D0C7A816772.jpg%26dh%3D500%26dw%3D800%26cropX%3D0%26cropY%3D274%26cropH%3D2002%26cropW%3D3200%26t%3D4"
  })
};
</script>