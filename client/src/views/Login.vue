<template>
  <v-container fill-height fluid>
    <v-card class="mx-auto py-6" flat width="600">
      <v-card-text>
        <h1 class="text-center login-presentation">
          <span class="secondary--text font-weight-bold">DIS</span>
          <span class="secondary--text font-weight-light">EVENT</span>
        </h1>
      </v-card-text>
      <v-card-text>
        <v-text-field solo type="email" label="E-post" v-model="form.email" clearable></v-text-field>
        <v-text-field solo type="password" label="Lösenord" v-model="form.password" clearable></v-text-field>
        <router-link class="forgot-password" to="/forgot-password">
          <p class="body-2 text-end">Glömt lösenordet?</p>
        </router-link>
      </v-card-text>
      <v-card-actions class="px-4">
        <v-btn block dark height="48" x-large color="orange" :loading="getLoading" @click="onLoginPressed">Logga in</v-btn>
      </v-card-actions>
      <v-card-actions class="px-4">
         <v-btn block height="48" x-large color="primary" href="https://api.disevent.se/login/0">
          <v-icon left>mdi-facebook</v-icon>
          Logga in med Facebook
        </v-btn>
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
    form: {
      email: null,
      password: null
    }
  }),
  computed: {
    ...mapGetters(["getLoading", "getError"]),
  },
  methods: {
    ...mapActions(["login"]),
    onLoginPressed() {
      this.login(this.form);
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

.my-bg {
  background-image: url("../assets/food.jpeg");
  background-position: center;
  background-size: cover;
}
</style>
