<template>
  <v-container fill-height>
    <v-card class="mx-auto py-6" flat width="800">
      <v-card-text>
        <h1 class="text-center font-weight-light login-presentation">
          Missa inte gratis lunch!
        </h1>
      </v-card-text>
      <v-card-text>
        <v-text-field solo type="email" label="E-post" v-model="email" clearable></v-text-field>
        <v-text-field solo type="password" label="Lösenord" v-model="password" clearable></v-text-field>
        <router-link class="forgot-password" to="/forgot-password">
          <p class="body-2 text-end">Glömt lösenordet?</p>
        </router-link>
      </v-card-text>
      <v-card-actions class="px-4">
        <v-btn block height="48" x-large color="accent" :loading="getLoading" @click="onLoginPressed" >Logga in</v-btn>
      </v-card-actions>
      <v-card-text>
        <div class="py-6"></div>
        <router-link class="no-account" to="/register">
          <p class="body-1 text-center">Har du inget konto ännu?</p>
        </router-link>
      </v-card-text>
      <v-alert class="text-center" dismissible v-if="getError" type="error">
        {{ getError }}
      </v-alert>
    </v-card>
  </v-container>
</template>

<script>
import { mapActions, mapGetters } from "vuex";

export default {
  name: "Login",
  data: () => ({
    email: "",
    password: "",
  }),
  computed: {
    ...mapGetters(["getLoading", "getError"]),
  },
  methods: {
    ...mapActions(["login"]),
    onLoginPressed() {
      this.login({
        email: this.email,
        password: this.password,
      });
    },
  },
};
</script>

<style scoped>
.login-presentation {
  line-height: 2.4rem;
}

.forgot-password {
  text-decoration: none;
}

.no-account {
  text-decoration: none;
}
</style>
