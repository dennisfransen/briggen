<template xmlns:>
  <v-container>
    <v-row>
      <v-col cols="12" md="5">
        <v-treeview
                dense
                :active.sync="active"
                :items="categories"
                activatable
                open-on-click
                transition
        >
        </v-treeview>
        <v-divider class="hidden-md-and-up mt-6"></v-divider>
      </v-col>

      <v-divider class="hidden-md-and-down" vertical></v-divider>

      <v-col class="d-flex text-center">
        <v-scroll-y-transition mode="out-in">
          <v-container fill-height v-if="!selected">
            <v-sheet class="title grey--text text--lighten-1 font-weight-light" min-height="500">
              Välj produkt ...
            </v-sheet>
          </v-container>
          <v-card v-else :key="selected.id" class="pt-6 mx-auto" flat max-width="600">

            <v-card-text>
              <v-avatar v-if="selected.imageUrl" size="200">
                <v-img src="@/assets/plate2.jpg" class="mb-6"></v-img>
              </v-avatar>
              <h3 class="headline mb-2">
                {{ selected.name }}
              </h3>
              <p>{{ selected.description }}</p>
            </v-card-text>
            <v-divider></v-divider>
            <v-row class="text-left" align="center" tag="v-card-text">
              <v-col class="mb-2" tag="strong" cols="5">Pris:</v-col>
              <v-col class="text-end pr-0 green--text" cols="7">{{selected.price}}.00 SEK</v-col>
              <v-col class="mb-2" tag="strong" cols="5">Rating:</v-col>
              <v-col class="text-end" cols="7">
                <StarRating font-weight="font-weight-regular" justify="end" v-model="selected.rating" icon-size="18" font-size="body-2"/>
              </v-col>
            </v-row>
            <div class="py-2"></div>
            <v-btn v-if="selected.active" class="error">Ta bort från menyn</v-btn>
            <v-btn v-else class="success">Lägg till på menyn</v-btn>
            <v-btn absolute top right icon @click="onEditProductPressed">
              <v-icon color="warning">mdi-pencil</v-icon>
            </v-btn>
          </v-card>
        </v-scroll-y-transition>
      </v-col>
    </v-row>
  </v-container>
</template>


<script>
    import {mapActions, mapGetters} from "vuex";
    import StarRating from "@/components/core/StarRating";

    export default {
        components: {
            StarRating
        },
        mounted() {
            this.categories = this.fetchCategories();
        },
        data: () => ({
            active: [],
            categories: [],
        }),
        computed: {
            ...mapGetters("MyRestaurant", ["getCategoriesWithProducts"]),
            selected() {
                if (!this.active.length) return undefined
                const id = this.active[0]
                let items = [];

                this.categories.forEach(category => {
                    items = items.concat(category.children.filter(child => {
                        return (child.id === id);
                    }));
                });

                return items[0];
            },
        },
        methods: {
            ...mapActions("MyRestaurant", ["fetchCategoriesWithProducts"]),
            fetchCategories() {
                this.fetchCategoriesWithProducts();
                return this.getCategoriesWithProducts
            },
            onEditProductPressed() {
                alert("Edit product")
            }
        },
    }
</script>