<template>
  <!-- Explore collection -->
  <section class="ex-collection section-padding">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="section-header-left">
            <h3 class="text-light-black header-title title">
              Explore our Categories
            </h3>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="row">
            <div v-for="subcategory in subcategories" :key="subcategory.id" class="col-lg-3 col-md-6 col-sm-6">
              <div class="product-box mb-xl-20">
                <div class="product-img">
                  <a href="#">
                    <img
                      :src="subcategory.image"
                      class="img-fluid full-width"
                      alt="product-img"
                    />
                  </a>
                  <div class="overlay">
                    <div class="product-tags padding-10">
                     
                      <span
                        class="type-tag bg-gradient-green text-custom-white"
                      >
                        {{subcategory.name_ar}}
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Explore collection -->
</template>

<script>
import AdBanner from "./categories/AdBanner.vue";
import { mapGetters } from "vuex";

export default {
  components: { AdBanner },
  computed: {
    ...mapGetters({
      subcategories: "home/subcategories",
    }),
    swiper() {
      return this.$refs.CategorySwiper.$swiper;
    },
  },};
</script>

<style scoped>
</style>