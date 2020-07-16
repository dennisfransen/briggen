<template>
  <v-sheet class="px-4" color="grey" tile>
    <v-sheet height="48"> 
    </v-sheet>
    <v-row align="center">
      <v-col cols="6">
        <h2 class="title white--text">Restauranger</h2>
      </v-col>
      <v-col cols="6" class="text-end">
        <v-btn color="rgba(0, 0, 0, 0.2)" dark depressed small>
          Karta
          <v-icon right>mdi-map</v-icon>
        </v-btn>
      </v-col>
    </v-row>
    <v-row>
      <v-col cols="12" class="py-0">
        <v-text-field 
          append-icon="mdi-filter-variant"
          prepend-inner-icon="mdi-magnify"
          solo
        >
        </v-text-field>
      </v-col>
    </v-row>
  </v-sheet>
</template>

<script>
export default {
  name: "TopSection"
};
</script>
