<template>
  <b-modal id="locationModal">
    <!-- header -->
    <template #modal-header>
      <h5>{{ $t("Location") }}</h5>
    </template>
    <!-- header -->

    <!-- body -->
    <template #default>
      <div class="form-group">
        <label for="recipient-name" class="col-form-label">{{
          $t("Governorate:")
        }}</label>
        <select
          v-model="city_id"
          @change="fetchCityAreas"
          name="city_id"
          class="form-control"
        >
          <option value="0" disabled selected>{{ $t("Governerate") }}</option>
          <option v-for="city in cities" :key="city.id" :value="city.id">
            {{ city.name_ar }}
          </option>
        </select>
      </div>
      <div class="form-group">
        <label for="message-text" class="col-form-label">{{
          $t("City:")
        }}</label>
        <select v-model="area_id" @change="updateUserLocation" name="area_id" class="form-control">
          <option value="0" disabled selected>{{ $t("City") }}</option>
          <option v-for="area in areas" :key="area.id" :value="area.id">
            {{ area.name_ar }}
          </option>
        </select>
      </div>
    </template>
    <!-- body -->

    <!-- footer -->
    <template #modal-footer="{ ok, cancel }">
      <b-button size="sm" variant="success" @click="ok()"> Save </b-button>
      <b-button size="sm" variant="danger" @click="cancel()">{{
        $t("Cancel")
      }}</b-button>
    </template>
    <!-- footer -->
  </b-modal>
</template>

<script>
import { mapGetters } from "vuex";
import { loadMessages } from "~/plugins/i18n";

export default {
  data: () => ({
    city_id: 0,
    area_id: 0,
  }),
  computed: mapGetters({
    cities: "location/cities",
    areas: "location/areas",
  }),
  created() {
    this.fetchCities();
  },
  methods: {
    async fetchCities() {
      await this.$store.dispatch("location/fetchCities");
    },
    async fetchCityAreas() {
      await this.$store.dispatch("location/fetchCityAreas", {
        city_id: this.city_id,
      });
    },
    async updateUserLocation() {
      await this.$store.dispatch("auth/updateUserLocation", {
        city_id: this.city_id,
        area_id: this.area_id,
      });
    },
  },
};
</script>
<style>
.modal-backdrop {
  opacity: 0.5 !important;
}
.modal-footer {
  justify-content: flex-start !important;
}
.modal-footer > :not(:last-child) {
  margin-left: 0.25rem !important;
}
</style>