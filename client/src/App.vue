<template>
  <v-app>
    <Headery />
    <v-content>
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
.secondary-bg {
  background-color: #272727;
}
</style>