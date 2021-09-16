<template>
  <div class="container-fluid">
    <!-- @swiper="onSwiper" -->
    <!-- @slideChange="onSlideChange" -->
    <!-- slider -->
    <section class="about-us-slider swiper-container p-relative">
      <swiper
        :slides-per-view="1"
        :space-between="50"
        :options="swiperOptions"
        ref="mySwiper"
        :auto-update="true"
        :auto-destroy="true"
        :delete-instance-on-destroy="true"
        :cleanup-styles-on-destroy="true"
      >
        <swiper-slide class="swiper-slide slide-item">
          <img
            src="q/assets/img/about/blog/1920x700/banner-1.jpg"
            class="img-fluid full-width"
            alt="Banner"
          />
          <div class="transform-center">
            <div class="container">
              <div class="row justify-content-start">
                <div class="col-lg-7 align-self-center">
                  <div class="right-side-content">
                    <h1 class="text-custom-white fw-600">
                      Increase takeout sales by 50%
                    </h1>
                    <h3 class="text-custom-white fw-400">
                      with the largest delivery platform in the U.S. and Canada
                    </h3>
                    <a routerLink="/restaurant" class="btn-second btn-submit"
                      >Learn More.</a
                    >
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="overlay overlay-bg"></div>
        </swiper-slide>
        <swiper-slide class="swiper-slide slide-item">
          <img
            src="q/assets/img/about/blog/1920x700/banner-2.jpg"
            class="img-fluid full-width"
            alt="Banner"
          />
          <div class="transform-center">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-lg-8 align-self-center">
                  <div class="right-side-content text-center">
                    <h1 class="text-custom-white fw-600">
                      Increase takeout sales by 50%
                    </h1>
                    <h3 class="text-custom-white fw-400">
                      with the largest delivery platform in the U.S. and Canada
                    </h3>
                    <a routerLink="/restaurant" class="btn-second btn-submit"
                      >Learn More.</a
                    >
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="overlay overlay-bg"></div>
        </swiper-slide>
        <swiper-slide class="swiper-slide slide-item">
          <img
            src="q/assets/img/about/blog/1920x700/banner-3.jpg"
            class="img-fluid full-width"
            alt="Banner"
          />
          <div class="transform-center">
            <div class="container">
              <div class="row justify-content-end">
                <div class="col-lg-7 align-self-center">
                  <div class="right-side-content text-right">
                    <h1 class="text-custom-white fw-600">
                      Increase takeout sales by 50%
                    </h1>
                    <h3 class="text-custom-white fw-400">
                      with the largest delivery platform in the U.S. and Canada
                    </h3>
                    <a routerLink="/restaurant" class="btn-second btn-submit"
                      >Learn More.</a
                    >
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="overlay overlay-bg"></div>
        </swiper-slide>
        <div class="swiper-pagination" slot="pagination"></div>
        <div class="swiper-button-next" slot="button-next"></div>
        <div class="swiper-button-prev" slot="button-prev"></div>
        
      </swiper>
    </section>
    <!-- slider -->
  </div>
</template>

<script>
import { Swiper, SwiperSlide, directive } from "vue-awesome-swiper";
import "swiper/css/swiper.min.css";

export default {
  name: "Slider",
  data() {
    return {
      swiperOptions: {
        pagination: {
          el: ".swiper-pagination",
        },
        loop: true,
        //loopedSlides: 5, // looped slides should be the same
        // spaceBetween: 30,
        // centeredSlides: true,
        // slidesOffsetBefore: "100px",
        // slidesOffsetAfter: "100px",
        slidesPerView: "auto",
        // touchRatio: 0.2,
        // slideToClickedSlide: true,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        // Some Swiper option/callback...
      },
    };
  },
  computed: {
    swiper() {
      return this.$refs.mySwiper.$swiper;
    },
  },
  mounted() {
    //   this.swiper.slideTo(3, 1000, false)
  },
  components: {
    Swiper,
    SwiperSlide,
  },
};
</script>

<style scoped>
</style>