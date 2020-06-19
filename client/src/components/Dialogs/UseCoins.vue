<template>
    <v-card class="py-4">
        <v-card-title class="text-center" primary-title>
            Är du säker på att du vill använda 10 mynt?
        </v-card-title>
        <div class="py-2"></div>
        <v-card-actions class="px-4">
            <v-row no-gutters>
                <v-col cols="6" class="px-1">
                    <v-btn block class="px-4" color="error lighten-1" @click="closeDialog">
                        Nej
                    </v-btn>
                </v-col>
                <v-col cols="6" class="px-1">
                    <v-btn block class="px-4" color="success lighten-1" @click="consumeCoins">
                        Ja
                    </v-btn>
                </v-col>
            </v-row>
        </v-card-actions>
    </v-card>
</template>

<script>
  import StampService from "../../services/StampService";
  import { mapGetters } from "vuex";

  export default {
    name: "UseCoins",
    props: {
      dialog: Boolean,
    },
    methods: {
      ...mapGetters("Vouchers", ["getStampId"]),

      closeDialog() {
        this.$emit("closeDialog", false);
      },

      consumeCoins() {
        StampService.consume(10, this.getStampId())
          .then(() => {
            this.$emit("consumed", false);
            this.closeDialog();
          });
      }
    },
  };
</script>

<style></style>
