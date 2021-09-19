<template>
  <!-- Browse by category -->
  <section class="browse-cat u-line section-padding">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="section-header-left">
            <h3 class="text-light-black header-title title">
              Browse by Categories
              <span class="fs-14"
                ><a href="#">{{$t('See all')}}</a></span
              >
            </h3>
          </div>
        </div>
        <swiper :options="swiperOptions"
        >
          <swiper-slide v-for="category in categories" :key="category.id" class="swiper-slide slide-item tab">
            <a href="#" class="tablinks spann slide active">
              <span class=" ">
                <img :src="category.sub_image" class="img-responsive" alt="image">
                {{category.name_ar}}
              </span>
            </a>
           <!--  <a href="#" class="categories">
              <div class="icon text-custom-white bg-light-green">
                <img
                  :src="category.sub_image"
                  class="rounded-circle"
                  alt="categories"
                />
              </div>
              <span class="text-light-black cat-name">{{category.name_ar}}</span>
            </a> -->
          </swiper-slide>
          <div class="swiper-button-next" slot="button-next"></div>
          <div class="swiper-button-prev" slot="button-prev"></div>
        </swiper>
      </div>
    </div>
  </section>
  <!-- Browse by category -->
</template>

<script>
import { mapGetters } from "vuex";
import { Swiper, SwiperSlide } from "vue-awesome-swiper";
import "swiper/css/swiper.min.css";

export default {
  name: "Slider",
  data() {
    return {
      swiperOptions: {
        loop: true,
        // speed: 800,
        initialSlide: 0,
        autoplay: {
          delay: 5000,
          stopOnLastSlide: false,
          disableOnInteraction: true,
        },
        slidesPerView: 8,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      },
    };
  },
  computed: {
    ...mapGetters({
      categories: "home/categories",
    }),
    swiper() {
      return this.$refs.CategorySwiper.$swiper;
    },
  },
  components: {
    Swiper,
    SwiperSlide,
  },
};
</script>

<style scoped>
.container-fluid {
  padding: 0 !important;
}
.swiper-button-next,
.swiper-button-prev {
  width: 30px !important;
  height: 30px !important;
}
.swiper-button-next::after,
.swiper-button-prev::after {
  font-size: 15px !important;
}
.browse-cat .categories .cat-name {
  display: inline-block!important;
}

.tab {
  width: auto!important;
}
.tab a.active {

}
.tab a:hover {
    background-color: #367bd6;
    color: #fff;
}
.tab a {
   background-color: #ccc;
    color: #000;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 13px 24px;
    transition: 0.3s;
    font-size: 15px;
    font-weight: 600;
    margin: 5px;
}
.tab a img {
  width: 24px!important;
}
.spann {
    /* width: 169px; */
    text-align: center;
    font-size: 15px;
    color: #141515;
    padding: 12px 4px;
    border-radius: 40px;
    cursor: pointer;
    min-width: 75px;
    background: white;
    direction: rtl;
}
</style>