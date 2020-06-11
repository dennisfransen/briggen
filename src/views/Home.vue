<template>
  <v-container>
    <v-card class="mx-auto text-center" max-width="500" flat v-if="numberLessThanTen">
      <!-- <v-img src="https://i.imgur.com/qj1Ml5K.png" @click="increment"></v-img> -->
      <v-card-text>
        <h1 class="title">Välkommen till Briggen</h1>
      </v-card-text>
      <v-card-text>
        <v-text-field solo label="Kod" v-model="submitCode" @keyup.enter="increment"
        ></v-text-field>
        <v-btn block x-large color="primary" @click="increment">Stämpla</v-btn>
      </v-card-text>
      <v-card-text>
        <v-sheet class="mx-auto rounded-sheet" :color="sheetColor">
          <p class="body-1" style="line-height: 64px; color: white;">
            {{ number }}/{{ maxNumber }}
          </p>
        </v-sheet>
      </v-card-text>
      <v-card-text>
        <p class="body-1">
          Med hjälp av denna app kan du få en gratis lunch. Skriv in koden som
          står på disken och klicka på stämpla. Samla på dig 9 luncher så blir
          din 10:e lunch gratis
        </p>
      </v-card-text>
      <v-alert dismissible v-if="error" type="error">
        {{ error }}
      </v-alert>
    </v-card>

    <v-card v-else flat>
      <v-card-text>
        <h1>Gratis lunch!</h1>
      </v-card-text>
      <v-card-actions>
        <v-btn block color="success" @click="reset">Reset</v-btn>
      </v-card-actions>
    </v-card>
  </v-container>
</template>

<script>
export default {
  name: "Home",
  data: () => ({
    number: 0,
    maxNumber: 10,
    submitCode: "",
    code: "abc",
    user: {
      displayName: "Ulf",
      codes: [],
    },
    error: null,
  }),
  computed: {
    sheetColor() {
      if (this.number <= 3) return "error";
      if (this.number <= 7) return "warning";
      if (this.number <= 9) return "success";
      return "";
    },
    numberLessThanTen() {
      return this.number < 10;
    },
  },
  methods: {
    increment() {
      this.error = null;
      if (this.code === this.submitCode) {
        if (!this.user.codes.includes(this.submitCode)) {
          this.number++;
          this.user.codes.push(this.submitCode);
        } else {
          this.error = "Du har redan använt denna koden. Du får tillgång till en ny imorgon, välkommen åter.";
        }
      } else if (this.submitCode === "") {
        this.error = "Kodfältet är tomt";
      } else {
        this.error = "Fel kod";
      }
      this.submitCode = "";
    },
    reset() {
      this.number = 0;
    },
  },
};
</script>

<style scoped>
.rounded-sheet {
  height: 64px;
  width: 64px;
  border-radius: 32px;
}
</style>
