<template>
  <div>
    <v-icon :size="iconSize" color="yellow">mdi-star</v-icon>
    <v-icon :size="iconSize" color="yellow">mdi-star</v-icon>
    <v-icon :size="iconSize" color="yellow">mdi-star</v-icon>
    <v-icon :size="iconSize" color="yellow">mdi-star</v-icon>
    <v-icon :size="iconSize" color="grey">mdi-star</v-icon>
    <span :class="fontSize" class="font-weight-bold ml-1">{{ value }}</span>
  </div>
</template>

<script>
export default {
    name: "StarRating",
    props: {
        value: String,
        iconSize: String,
        fontSize: String,
    },
};
</script>
