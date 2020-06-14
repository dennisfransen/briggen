<template>
  <div class="mx-auto" style="width: 100%">
    <v-sheet
      class="mx-auto my-4 rounded-sheet elevation-6"
      color="yellow darken-1"
    >
      <div class="coin">
        <p class="display-1 font-weight-black text-center centered">
          {{ number }}
        </p>
        <div class="dollar-sign elevation-4">
          <v-icon small dark>mdi-currency-usd</v-icon>
        </div>
      </div>
    </v-sheet>
  </div>
</template>
<script>


export default {
  name: "Coin",
  props: {
    number: {
      type: Number,
      required: true,
    },
  }

};
</script>

<style>
.rounded-sheet {
  height: 100px;
  width: 100px;
  border-radius: 50px;
}

.centered {
  line-height: 100px !important;
  color: white;
}

.coin {
  max-width: 100px;
  position: relative;
}

.dollar-sign {
  position: absolute;
  top: 0;
  right: 0;
  height: 30px;
  width: 30px;
  line-height: 30px;
  text-align: center;
  /* background-color: #82B1FF; */
  background-color: #4CAF50;
  color: white;
  border-radius: 15px;
}
</style>
