<template>
  <v-container fill-height>
    <v-card class="mx-auto py-6" flat width="800">
      <v-card-text>
        <h1 class="text-center font-weight-light">Välkommen</h1>
      </v-card-text>
      <v-card-text>
        <v-text-field solo type="email" label="E-post" v-model="email" clearable></v-text-field>
        <v-text-field solo type="password" label="Lösenord" v-model="password" clearable></v-text-field>
        <v-text-field solo type="password" label="Upprepa lösenord" v-model="passwordVerify" clearable></v-text-field>
      </v-card-text>
      <v-card-actions class="px-4">
        <v-btn block height="48" x-large color="accent" :loading="getLoading" @click="onRegisterPressed">Registera</v-btn>
      </v-card-actions>
      <v-card-actions class="px-4">
        <v-btn block height="48" x-large text @click="goBackToLogin">Gå tillbaka</v-btn>
      </v-card-actions>
      <v-alert class="text-center" dismissible v-if="getError" type="error">
      {{ getError }}
      </v-alert>
    </v-card>
  </v-container>
</template>

<script>
import { mapActions, mapGetters } from "vuex";

export default {
  name: "Register",
  data: () => ({
    email: "",
    password: "",
    passwordVerify: "",
  }),
  computed: {
      ...mapGetters(["getLoading", "getError"]),
  },
  methods: {
    ...mapActions(["register"]),
    onRegisterPressed() {
      this.register({
        email: this.email,
        password: this.password,
        passwordVerify: this.passwordVerify,
      });
    },
    goBackToLogin() {
      this.$router.replace("/login");
    },
  },
};
</script>
