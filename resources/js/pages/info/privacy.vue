<template>
<div>
   <section class="active show tab-pane fade section-padding restaurent-meals bg-light-theme">
      <div class="container">
        <div class="row">
          <div class="col-xl-12 col-lg-12">
            <div class="row">
              <div class="col-lg-12 restaurent-meal-head mb-md-40">
                <div class="card">
                  <div class="card-header">
                    <div class="section-header-left">
                      <h3 class="text-light-black header-title">
                        {{ $t('Privacy Policy') }}
                      </h3>
                    </div>
                  </div>
                  <div class="card-body no-padding">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="restaurent-product-list">
                          <div class="restaurent-product-detail">
                            <div class="restaurent-product-left">
                              <div class="restaurent-product-title-box">
                                <div class="restaurent-product-box">
                                  <div class="restaurent-product-title">
                                    <h6 v-for="privacy in info.privacy" :key="privacy.id">
                                      <p href="javascript:void(0)" class="text-light-black fw-600"> 
                                        {{ privacy.description_ar }}
                                      </p>
                                    </h6>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
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
  </div>
</template>

<script>
import { mapGetters } from "vuex";

  export default {
    name: 'privacy',
    waitForMe: true,
    middleware: 'auth',
  methods: {
    async fetchPrivacy() {
      if (this.info.privacy.length) {
        this.$store.dispatch("general/changeWait", { wait: false });
        await this.$store.dispatch("home/fetchPrivacy");
      } else {
        await this.$store.dispatch("home/fetchPrivacy");
        this.$store.dispatch("general/changeWait", { wait: false });
      }
    },
  },
  async created() {
    await this.fetchPrivacy();
  },
  metaInfo() {
    return { title: this.$t("Privacy Policy") };
  },

  data: () => ({
    title: window.config.appName,
  }),

  computed: mapGetters({
    info: "home/info",
  }),
  }
</script>

<style scoped>

</style>