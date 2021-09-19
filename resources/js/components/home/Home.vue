<template>
  <div>
    <slider />
    <category-slider />
    <popular />
    <categories />
  </div>
</template>

<script>
import Slider from "~/components/home/Slider";
import CategorySlider from './CategorySlider.vue';
import Popular from "~/components/home/Popular";
import Categories from "~/components/home/Categories";
export default {
  name: "Home",
  components: {
    Slider,
    CategorySlider,
    Popular,
    Categories,
  },
};
</script>

<style>
.swiper-button-next::after, .swiper-button-prev::after {
    font-size: 15px!important;
}
.swiper-button-next, .swiper-button-prev {
    width: 30px!important;
    height: 30px!important;
}
</style>