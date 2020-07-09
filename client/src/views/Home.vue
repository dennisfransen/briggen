<template>
  <div>
    <TopSection />
    <v-container class="py-0 pr-0">
      <FeaturedSection />
      <div class="py-2"></div>
      <CategorySection />
      <div class="py-2"></div>
    </v-container>
    <v-container class="pb-0">
      <NewsSection />
    </v-container>
  </div>
</template>

<script>
import TopSection from "@/components/home/TopSection";
import FeaturedSection from "@/components/home/FeaturedSection";
import CategorySection from "@/components/home/CategorySection";
import NewsSection from "@/components/home/NewsSection";

export default {
  name: "Home",
  components: {
    TopSection,
    FeaturedSection,
    CategorySection,
    NewsSection
  }
};
</script>
