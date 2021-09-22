<template>
  <div>
    <!-- restaurent top -->
    <section class="section-padding restaurent-about smoothscroll" id="about">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <img
              :src="place.details.image"
              class="img-fluid full-height full-width"
              alt="#"
            />
          </div>
          <div class="col-md-8">
            <h3 class="text-light-black fw-700 title">
              {{ place.details.name_ar }}
            </h3>
            <p class="text-light-white no-margin">
              {{ place.details.description_ar }}
            </p>
            <div class="pl-social-media">
              <ul>
                <li>
                  <i
                    @click="$bvToast.show('phone-toast')"
                    class="fas fa-phone-alt circle-tag text-custom-white bg-dark"
                  ></i>
                  <b-toast id="phone-toast" :title="$t('Phone')" static no-auto-hide><a :href="`tel:${place.details.phone}`" class="text-light-white">{{ place.details.phone }}</a></b-toast>
                </li>
                <li v-if="place.details.Facebook">
                  <a
                    class="brand-facebook circle-tag"
                    target="_blank"
                    :href="place.details.Facebook"
                    ><i class="fab fa-facebook-f"></i
                  ></a>
                </li>
                <li v-if="place.details.Twitter">
                  <a
                    class="brand-twitter circle-tag"
                    target="_blank"
                    :href="place.details.Twitter"
                    ><i class="fab fa-twitter"></i
                  ></a>
                </li>
                <li v-if="place.details.Latitude && place.details.Longitude">
                  <a
                    class="brand-google circle-tag"
                    target="_blank"
                    :href="`https://maps.google.com/?q=${place.details.Latitude},${place.details.Longitude}`"
                    ><i class="fas fa-map-marker-alt"></i
                  ></a>
                </li>
                <li>
                  <a href="javascript:void(0)" @click="toggleFav"
                    ><img
                      :src="
                        asset(
                          `q/assets/img/svg/${
                            place.details.isFavorite
                              ? '010-heart.svg'
                              : '013-heart-1.svg'
                          }`
                        )
                      "
                      alt="tag"
                  /></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- restaurent top -->

    <!-- restaurent tab -->
    <div class="restaurent-tabs u-line">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="restaurent-menu scrollnav">
              <ul class="nav nav-pills">
                <li class="nav-item" v-for="tab in tabs" :key="tab.name">
                  <a
                    class="nav-link text-light-white fw-700"
                    data-toggle="pill"
                    @click.prevent="setActive(tab.name)"
                    :class="{ active: isActive(tab.name) }"
                    :href="`#${tab.name}`"
                    >{{ tab.title }}</a
                  >
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- restaurent tab -->

    <!-- restaurent tab content -->
    <div class="tab-content py-3">
      <!-- services -->
      <section
        :class="{ 'active show': isActive(tabs[0].name) }"
        :id="tabs[0].name"
        class="tab-pane fade section-padding restaurent-meals bg-light-theme"
      >
        <div class="container">
          <div class="row">
            <div class="col-xl-12 col-lg-12 mb-0">
              <div class="row">
                <div class="col-lg-12 restaurent-meal-head mb-md-40">
                  <div class="card">
                    <div class="card-header">
                      <div class="section-header-left">
                        <h3 class="text-light-black header-title">
                          {{ tabs[0].title }}
                        </h3>
                      </div>
                    </div>
                    <div class="card-body no-padding">
                      <div class="row">
                        <div
                          v-for="(service, index) in place.services"
                          :key="service.id"
                          class="col-lg-12"
                        >
                          <div class="restaurent-product-list">
                            <div class="restaurent-product-detail">
                              <div class="restaurent-product-left p-3">
                                <div class="restaurent-product-title-box">
                                  <div class="restaurent-product-box">
                                    <div class="restaurent-product-title">
                                      <h6
                                        class="mb-0"
                                        data-toggle="modal"
                                        data-target="#restaurent-popup"
                                      >
                                        <a
                                          href="javascript:void(0)"
                                          class="text-light-black fw-600"
                                          >{{ index + 1 }}-
                                          {{ service.details_ar }}</a
                                        >
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
      <!-- services -->

      <!-- products -->
      <section
        :class="{ 'active show': isActive(tabs[1].name) }"
        :id="tabs[1].name"
        class="tab-pane fade section-padding restaurent-meals bg-light-theme"
      >
        <div class="container">
          <div class="row">
            <div class="col-xl-12 col-lg-12">
              <div class="row">
                <div class="col-lg-12 restaurent-meal-head mb-md-40">
                  <div class="card">
                    <div class="card-header">
                      <div class="section-header-left">
                        <h3 class="text-light-black header-title">
                          {{ tabs[1].title }}
                        </h3>
                      </div>
                    </div>
                    <div class="card-body no-padding">
                      <div class="row">
                        <div
                          v-for="product in place.products"
                          :key="product.id"
                          class="col-lg-12"
                        >
                          <div class="restaurent-product-list">
                            <div class="restaurent-product-detail">
                              <div class="restaurent-product-img">
                                <img
                                  :src="product.image"
                                  class="img-fluid"
                                  :alt="product.name_ar"
                                />
                              </div>
                              <div class="restaurent-product-left">
                                <div class="restaurent-product-title-box">
                                  <div class="restaurent-product-box">
                                    <div class="restaurent-product-title">
                                      <h6
                                        class="mb-2"
                                        data-toggle="modal"
                                        data-target="#restaurent-popup"
                                      >
                                        <a
                                          href="javascript:void(0)"
                                          class="text-light-black fw-600"
                                          >{{ product.name_ar }}</a
                                        >
                                      </h6>
                                    </div>
                                  </div>
                                </div>
                                <div class="restaurent-product-caption-box">
                                  <span class="text-light-white">{{
                                    product.description_ar
                                  }}</span>
                                </div>
                                <div class="restaurent-tags-price">
                                  <div class="restaurent-product-price">
                                    <h6 class="text-success fw-600 no-margin">
                                      {{ product.price }}
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
      </section>
      <!-- products -->

      <!-- offers -->
      <section
        :class="{ 'active show': isActive(tabs[2].name) }"
        :id="tabs[2].name"
        class="tab-pane fade section-padding restaurent-meals bg-light-theme"
      >
        <div class="container">
          <div class="row">
            <div class="col-xl-12 col-lg-12">
              <div class="row">
                <div class="col-lg-12 restaurent-meal-head mb-md-40">
                  <div class="card">
                    <div class="card-header">
                      <div class="section-header-left">
                        <h3 class="text-light-black header-title">
                          {{ tabs[2].title }}
                        </h3>
                      </div>
                    </div>
                    <div class="card-body no-padding">
                      <div class="row">
                        <div
                          v-for="offer in place.offers"
                          :key="offer.id"
                          class="col-lg-12"
                        >
                          <div class="restaurent-product-list">
                            <div class="restaurent-product-detail">
                              <div class="restaurent-product-left">
                                <div class="restaurent-product-title-box">
                                  <div class="restaurent-product-box">
                                    <div class="restaurent-product-title">
                                      <h6
                                        class="mb-2"
                                        data-toggle="modal"
                                        data-target="#restaurent-popup"
                                      >
                                        <a
                                          href="javascript:void(0)"
                                          class="text-light-black fw-600"
                                          >{{ offer.title_ar }}</a
                                        >
                                      </h6>
                                    </div>
                                  </div>
                                </div>
                                <div class="restaurent-offer-caption-box">
                                  <h6 class="text-light-white offer-code">
                                    {{ offer.code }}
                                  </h6>
                                  <h6 class="fw-600 no-margin offer-price">
                                    {{ offer.present }}% {{$t('discount')}}
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
      </section>
      <!-- offers -->

      <!-- about us -->
      <section
        :class="{ 'active show': isActive(tabs[3].name) }"
        :id="tabs[3].name"
        class="tab-pane fade section-padding restaurent-meals bg-light-theme"
      >
         <div class="container">
          <div class="row">
            <div class="col-xl-12 col-lg-12">
              <div class="row">
                <div class="col-lg-12 restaurent-meal-head mb-md-40">
                  <div class="card">
                    <div class="card-header">
                      <div class="section-header-left">
                        <h3 class="text-light-black header-title">
                          {{ tabs[3].title }}
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
                                      <h6
                                        v-for="aboutus in place.aboutus"
                                        :key="aboutus.id"
                                        class="mb-2"
                                        data-toggle="modal"
                                        data-target="#restaurent-popup">
                                        <a
                                          href="javascript:void(0)"
                                          class="text-light-black fw-600">
                                          {{ aboutus.details_ar }}
                                        </a>
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
      <!-- about us -->
    </div>
    <!-- restaurent tab content -->
  </div>
</template>

<script>
import axios from "axios";
import { mapGetters } from "vuex";
export default {
  waitForMe: true,
  middleware: "auth",
  props: ["id"],
  // this.$route.params.id
  methods: {
    async fetchPlace(id) {
      await this.$store.dispatch("place/fetchPlace", {
        id: id,
      });
      this.$store.dispatch("general/changeWait", { wait: false });
    },
    isActive(menuItem) {
      return this.activeItem === menuItem;
    },
    setActive(menuItem) {
      this.activeItem = menuItem;
    },
    async toggleFav() {
      await this.$store.dispatch("place/toggleFav", {
        id: this.place.details.id,
      });
    },
  },
  async created() {
    await this.fetchPlace(this.id);
  },
  metaInfo() {
    return { title: this.$t("Place") };
  },
  data() {
    let tabs = [
      {
        name: "services",
        title: this.$t("Services"),
      },
      {
        name: "products",
        title: this.$t("Products"),
      },
      {
        name: "offers",
        title: this.$t("Offers"),
      },
      {
        name: "aboutus",
        title: this.$t("About us"),
      },
    ];

    return {
      title: window.config.appName,
      tabs: tabs,
      activeItem: tabs[0].name,
    };
  },
  computed: mapGetters({
    place: "place/place",
    place_details_keys: [
      "my_place",
      "Twitter",
      "Facebook",
      "isFavorite",
      "Latitude",
      "Longitude",
      "phone",
      "image",
      "name_ar",
      "name_en",
      "description_ar",
      "description_en",
    ],
  }),
};
</script>

<style>
#phone-toast {
  opacity: 1;
  display: inline-block;
  position: absolute;
  left: 0;
}
.restaurent-offer-caption-box {
  display: flex;
  justify-content: space-between;
  width: 100%;
  flex-wrap: wrap;
  align-self: flex-start;
  background: #eee;
  padding: 15px;
  border-radius: 10px;
}
.restaurent-offer-caption-box .offer-code,
.restaurent-offer-caption-box .offer-code {
  margin: 0;
}
.restaurent-product-caption-box,
.restaurent-tags-price {
  margin-right: 15px;
}
.pl-social-media {
  display: block;
  align-items: center;
  /* height: 100%; */
  padding-top: 20px;
}

.pl-social-media ul {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
}

.pl-social-media ul li {
  margin-left: 15px;
  transition: 0.3s;
}

.pl-social-media ul li>a {
  width: 36px;
  height: 36px;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: 0.3s;
  text-decoration: none;
}

.pl-social-media ul li>a i {
  font-size: 18px;
}

.pl-social-media ul li:first-child {
  margin-right: 0;
}
.pl-social-media ul li:hover {
  transition: 0.3s;
}

.pl-social-media ul li:hover a {
  transition: 0.3s;
}
.brand-facebook {
  color: #fff;
  background: #3b5998;
}
.brand-twitter {
  color: #fff;
  background: #1da1f2;
}
.brand-google {
  color: #fff;
  background: #d80a0a;
}
.circle-tag {
  height: 36px;
  width: 36px;
  border-radius: 50%;
  font-size: 16px;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
}
</style>
