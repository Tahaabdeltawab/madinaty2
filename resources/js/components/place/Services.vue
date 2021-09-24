<template>
  <!-- services -->
  <div class="container">
    <div class="row">
      <div class="col-xl-12 col-lg-12 mb-0">
        <div class="row">
          <div class="col-lg-12 restaurent-meal-head mb-md-40">
            <div class="card">
              <div class="card-header">
                <div class="section-header-left">
                  <h3 class="text-light-black header-title">
                    {{ title }}
                  </h3>
                </div>
              </div>
              <div class="card-body no-padding">
                <div class="row">
                  <div v-for="(service, index) in infos" :key="service.id" class="col-lg-12">
                    <div class="restaurent-product-list">
                      <div class="restaurent-product-detail">
                        <div class="restaurent-product-left p-3">
                          <div class="restaurent-product-title-box">
                            <div class="restaurent-product-box">
                              <div class="restaurent-product-title">
                                <h6 class="mb-0" data-toggle="modal" data-target="#restaurent-popup">
                                  <p class="text-light-black fw-600">{{ index + 1 }}- {{ service.details_ar }}</p>
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
  <!-- services -->
</template>

<script>
  export default {
    props: ['infos', 'title'],
  }
</script>

<style scoped>

</style>