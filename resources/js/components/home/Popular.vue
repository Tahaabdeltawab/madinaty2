<template>
  <div>
    <section class="ex-collection section-padding">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="section-header-left">
              <h3 class="text-light-black header-title title">
                {{
                  user.area_name ? "Popular in " + user.area_name : "Popular"
                }}
              </h3>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="row">
              <div
                v-for="popular in populars"
                :key="popular.id"
                class="col-lg-3 col-md-6 col-sm-6"
              >
                <router-link
                  :to="{ name: 'place', params: { id: popular.id } }"
                >
                  <div class="product-box mb-xl-20">
                    <div class="product-img">
                      <img
                        :src="popular.image"
                        class="img-fluid full-width"
                        alt="product-img"
                      />
                      <!-- <div class="overlay">
                        <div class="product-tags padding-10">
                          <span @click.prevent.stop="favourite" class="circle-tag">
                            <img
                              :src="asset('q/assets/img/svg/013-heart-1.svg')"
                              alt="tag"
                            />
                          </span>
                        </div>
                      </div> -->
                    </div>
                    <div class="product-caption bg-gradient-green">
                      <div class="title-box">
                        <h6 class="product-title">
                          <span class="text-custom-white">{{
                            popular.name_ar
                          }}</span>
                        </h6>
                      </div>
                    </div>
                  </div>
                </router-link>
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
  },
  mounted() {
  },
  methods: {
    favourite(){
      console.log('favourite clicked');
    }
  },
};
</script>

<style scoped>
.product-img img {
  border-radius: 3px 3px 0 0;
}
.product-caption {
  border-radius: 0 0 3px 3px;
}
</style>