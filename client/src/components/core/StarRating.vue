<template>
  <v-sheet class="pl-2" color="transparent">
    <v-row :justify="justify" align="center">
      <span>
        <v-rating
          v-model="value"
          color="yellow"
          background-color="grey"
          readonly
          dense
          :small="small"
          :size="iconSize"
        ></v-rating>
      </span>
      <span :class="[fontSize, fontColor, fontWeight ? fontWeight : 'font-weight-bold']" class="mt-1 ml-1">{{ value.toFixed(1) }}</span>
    </v-row>
  </v-sheet>
</template>

<script>
export default {
  name: "StarRating",
  props: {
    value: Number,
    small: String,
    fontSize: String,
    fontColor: String,
    iconSize: String,
    fontWeight: String,
    justify: {
      type: String,
      default: "start"
    }
  },
};
</script>
