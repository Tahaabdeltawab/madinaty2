<template>
  <div>
    <!-- places -->
    <section class="section-padding restaurent-meals bg-light-theme">
      <div class="container">
        <div class="row">
          <div class="col-xl-12 col-lg-12">
            <div class="row">
              <div class="col-lg-12 restaurent-meal-head mb-md-40">
                <div class="card">
                  <div class="card-body no-padding">
                    <div class="row">
                      <div v-for="place in favorites" :key="place.id" class="col-lg-12">
                        <div class="restaurent-product-list">
                          <div class="restaurent-product-detail">
                            <router-link :to="{ name: 'place', params: { id: place.id } }">
                              <div class="restaurent-product-img">
                                <img :src="place.image" class="img-fluid" :alt="place.name_ar" />
                              </div>
                            </router-link>
                            <div class="restaurent-product-left">
                              <router-link :to="{ name: 'place', params: { id: place.id } }">
                                <div class="restaurent-product-title-box">
                                  <div class="restaurent-product-box">
                                    <div class="restaurent-product-title">
                                      <h6 class="mb-2 text-light-black fw-600">{{ place.name_ar }}</h6>
                                    </div>
                                  </div>
                                </div>
                                <div class="restaurent-product-caption-box">
                                  <span class="text-light-white">{{place.description_ar}}</span>
                                </div>
                                </router-link>
                                <div class="restaurent-tags-price">
                                  <div class="restaurent-product-price">
                                    <div class="pl-social-media">
                                      <ul>
                                        <li v-if="place.phone">
                                          <a @click="$bvToast.show(`phone-toast-${place.id}`)" class="rect-tag phone" href="javascript:void(0)">
                                            <img :src="asset('q/assets/img/svg/phone.svg')">
                                            <span>{{$t('Call us')}}</span>
                                          </a>
                                          <b-toast class="phone-toast" :id="'phone-toast-' + place.id" :title="$t('Phone')" static no-auto-hide>
                                            <a :href="`tel:${place.phone}`" class="text-light-white">{{ place.phone }}
                                            </a>
                                          </b-toast>
                                        </li>
                                        <li>
                                          <a class="rect-tag fav" href="javascript:void(0)" @click="toggleFavFavoritePlace(place.id)">
                                            <img :src="asset(`q/assets/img/svg/${place.isFavorite ? 'favorite_fill.svg' : 'favorite.svg'}`)" alt="tag" />
                                            </a>
                                        </li>
                                        <li v-if="place.Latitude && place.Longitude">
                                          <a class="rect-tag map" target="_blank" :href="`https://maps.google.com/?q=${place.Latitude},${place.Longitude}`">
                                            <img :src="asset('q/assets/img/svg/google-maps.svg')">
                                          </a>
                                        </li>
                                        <li v-if="place.Facebook">
                                          <a class="rect-tag facebook" target="_blank" :href="place.Facebook">
                                            <img :src="asset('q/assets/img/svg/facebook.svg')">
                                          </a>
                                        </li>
                                        <li v-if="place.Twitter">
                                          <a class="rect-tag twitter" target="_blank" :href="place.Twitter">
                                            <img :src="asset('q/assets/img/svg/twitter.svg')">
                                          </a>
                                        </li>
                                      </ul>
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
    <!-- places -->
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
    async fetchFavorites(id) {
      await this.$store.dispatch("place/fetchFavorites");
      this.$store.dispatch("general/changeWait", { wait: false });
    },
    async toggleFavFavoritePlace(id) {
      await this.$store.dispatch("place/toggleFavFavoritePlace", {id: id});
    },
  },
  async created() {
    await this.fetchFavorites();
  },
  metaInfo() {
    return { title: this.$t("Favorites") };
  },
  data() {
    return {
      title: window.config.appName,
    };
  },
  computed: mapGetters({
    favorites: "place/favorites",
    place_details_keys: [
      "id",
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
.phone-toast .toast {
  opacity: 1;
  display: inline-block;
  position: absolute;
  left: 0;
  z-index: 10;
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
.pl-social-media ul li>a i {
  font-size: 18px;
}
.pl-social-media ul li img {
  height: 20px;
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
.rect-tag {
  height: 36px;
  width: 36px;
  border-radius: 10%;
  font-size: 16px;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  box-shadow: 0 0 0 1px rgb(67 41 163 / 10%), 0 1px 5px 0 rgb(67 41 163 / 10%);
}
.rect-tag.phone {
  color: white;
  background: black;
  width: auto;
  padding: 10px;
  border-radius: 5%;
}
.rect-tag.phone img {
  height: 17px;
  margin: 3px;
}
.rect-tag.phone span {
  margin: 3px;
}
.rect-tag.twitter img {
  height: 17px;
}
</style>
