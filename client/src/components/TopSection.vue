<template>
   <v-row class="px-1">
      <v-col cols="6">
        <v-avatar size="36">
          <v-img src="../assets/avatar.png"></v-img>
        </v-avatar>
      </v-col>
      <v-col cols="6" class="text-end">
        <v-btn icon class="grey lighten-5">
          <v-icon>mdi-bell</v-icon>
        </v-btn>
        <v-btn icon class="ml-4 grey lighten-5">
          <v-icon>mdi-dots-vertical</v-icon>
        </v-btn>
      </v-col>
    </v-row>
</template>

<script>
export default {
    name: "TopSection"
}
</script>
