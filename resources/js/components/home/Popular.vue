<template>
  <div>
    <section class="ex-collection section-padding">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="section-header-left">
            <h3 class="text-light-black header-title title">
              Popular in {{user.area_name}}
            </h3>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="row">
            <div v-for="popular in populars" :key="popular.id" class="col-lg-3 col-md-6 col-sm-6">
              <div class="product-box mb-xl-20">
                <div class="product-img">
                  <a href="#">
                    <img
                      :src="popular.image"
                      class="img-fluid full-width"
                      alt="product-img"
                    />
                  </a>
                  <div class="overlay">
                    <div class="product-tags padding-10">
                      <span class="circle-tag">
                        <img
                          :src="asset('q/assets/img/svg/013-heart-1.svg')"
                          alt="tag"
                        />
                      </span>
                    </div>
                  </div>
                </div>
                <div class="product-caption">
                  <div class="title-box">
                    <h6 class="product-title">
                      <a href="#" class="text-light-black">{{ popular.name_ar }}</a>
                    </h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  </div>
</template>

<script>
import { mapGetters } from "vuex";

  export default {
  computed: {
    ...mapGetters({
      populars: "home/populars",
      user: "auth/user",
    }),
    mounted(){
      console.log(this.user);
    }
  }
  }
</script>

<style scoped>

</style>