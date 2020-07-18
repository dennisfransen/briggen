<template>
  <div>
    <div class="hidden-md-and-up">
      <v-img src="@/assets/wineanddine.jpg" height="200"></v-img>
      <v-container>
        <h3 class="subtitle-1 font-weight-bold">
          Restaurang Briggen
        </h3>
        <div class="py-1"></div>
        <p class="caption mb-0">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero tempora
          tempore maiores eligendi autem cupiditate!
        </p>
      </v-container>
      <div class="py-2"></div>
      <v-list dense color="grey lighten-5">
        <v-subheader class="overline">GENERELLT</v-subheader>
        <v-list-item-group v-model="item" color="primary">
          <v-list-item v-for="(item, i) in generals" :key="i" :to="item.link">
            <v-list-item-title v-text="item.title"></v-list-item-title>
            <v-list-item-icon>
              <v-icon small v-text="item.icon"></v-icon>
            </v-list-item-icon>
          </v-list-item>
        </v-list-item-group>
        <v-subheader class="overline">Inställningar</v-subheader>
        <v-list-item-group v-model="item" color="primary">
          <v-list-item v-for="(item, i) in settings" :key="i" :to="item.link">
            <v-list-item-title v-text="item.title"></v-list-item-title>
            <v-list-item-icon>
              <v-icon small v-text="item.icon"></v-icon>
            </v-list-item-icon>
          </v-list-item>
        </v-list-item-group>
      </v-list>
    </div>
    <v-container fluid class="hidden-sm-and-down">
      <v-row>
        <v-col cols="12" md="3">
          <v-list color="grey lighten-5">
            <v-subheader class="overline">GENERELLT</v-subheader>
            <v-list-item-group v-model="item" color="primary">
              <v-list-item
                v-for="(item, i) in generals"
                :key="i"
                :to="item.link"
              >
                <v-list-item-title v-text="item.title"></v-list-item-title>
                <v-list-item-icon>
                  <v-icon v-text="item.icon"></v-icon>
                </v-list-item-icon>
              </v-list-item>
            </v-list-item-group>
            <v-subheader class="overline">Inställningar</v-subheader>
            <v-list-item-group v-model="item" color="primary">
              <v-list-item
                v-for="(item, i) in settings"
                :key="i"
                :to="item.link"
              >
                <v-list-item-title v-text="item.title"></v-list-item-title>
                <v-list-item-icon>
                  <v-icon v-text="item.icon"></v-icon>
                </v-list-item-icon>
              </v-list-item>
            </v-list-item-group>
          </v-list>
        </v-col>
        <v-col cols="12" md="9">
          <v-row>
            <v-col cols="6" class="pt-0">
              <h3 class="subtitle-1 font-weight-bold">
                Restaurang Briggen
              </h3>
              <div class="py-1"></div>
              <p class="body-2 mb-0">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero
                tempora tempore maiores eligendi autem cupiditate!
              </p>
            </v-col>
            <v-col cols="6">
              <v-img src="@/assets/wineanddine.jpg"></v-img>
            </v-col>
          </v-row>
        </v-col>
      </v-row>
    </v-container>
  </div>
</template>

<script>
export default {
  name: "AddProduct",
  data: () => ({
    item: null,
    generals: [
      { icon: "mdi-food-fork-drink", title: "Produkter", link: "/products" },
      { icon: "mdi-cash-usd", title: "Betalmetoder", link: "/products" },
      { icon: "mdi-tag", title: "Prenumeration", link: "/products" },
    ],
    settings: [
      { icon: "mdi-phone", title: "Kontaktuppgifter", link: "/products" },
      { icon: "mdi-lock", title: "Lösenord", link: "/products" },
    ],
  }),
};
</script>
