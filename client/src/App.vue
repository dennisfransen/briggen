<template>
  <v-app>
    <Headery />
    <v-content class="my-bg">
      <router-view/>
    </v-content>
  </v-app>
</template>

<script>
import Headery from '@/components/templates/Header'

export default {
  name: 'App',
  components: {
    Headery,
  },
};
</script>

<style scoped>
.my-bg {
  background-image: url("./assets/grass.jpg");
  background-position: center;
  background-size: cover;
}

.secondary-bg {
  background-color: #272727;
}
</style>