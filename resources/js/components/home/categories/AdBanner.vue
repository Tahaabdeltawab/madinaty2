<template>
  <div>
    <!-- advertisement banner-->
    <div class="row">
      <div class="col-12">
        <div class="banner-adv2 mb-xl-20">
          <img
            :src="`q/assets/img/restaurants/1110x100/${image}.jpg`"
            class="img-fluid full-width"
            alt="banner"
          />
          <span class="text"
            >{{$t('Unlimited Free Delivery with.')}}
            <img :src="asset('q/assets/img/tag.jpg')" alt="logo" />
            <a href="#" class="btn-second btn-submit"
              >{{$t('Try 30 Days FREE')}}</a
            ></span
          >
          <span class="close-banner"></span>
          <div class="overlay overlay-bg"></div>
        </div>
      </div>
    </div>
    <!-- advertisement banner-->
  </div>
</template>

<script>
export default {
  name: "AdBanner",
   props: ['image'],
  data() {
    return {
    }
  },
};
</script>

<style scoped>
</style>