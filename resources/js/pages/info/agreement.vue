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
                        {{ $t('Usage Agreement') }}
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
                                    <h6 v-for="agreement in info.agreement" :key="agreement.id">
                                      <p href="javascript:void(0)" class="text-light-black fw-600"> 
                                        {{ agreement.description_ar }}
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
    name: 'agreement',
    waitForMe: true,
    middleware: 'auth',
  methods: {
    async fetchAgreement() {
      if (this.info.agreement.length) {
        this.$store.dispatch("general/changeWait", { wait: false });
        await this.$store.dispatch("home/fetchAgreement");
      } else {
        await this.$store.dispatch("home/fetchAgreement");
        this.$store.dispatch("general/changeWait", { wait: false });
      }
    },
  },
  async created() {
    await this.fetchAgreement();
  },
  metaInfo() {
    return { title: this.$t("Usage Agreement") };
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