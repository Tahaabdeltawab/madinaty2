<template>
    <!-- Authenticated -->
    <li v-if="user" class="nav-item dropdown">
      <a
        class="nav-link dropdown-toggle text-dark"
        href="#"
        role="button"
        data-bs-toggle="dropdown"
        aria-haspopup="true"
        aria-expanded="false"
      >
        <img :src="user.photo_url" class="rounded-circle profile-photo me-1" />
        {{ user.username }}
      </a>
      <div class="dropdown-menu">
        <router-link
          :to="{ name: 'settings.profile' }"
          class="dropdown-item ps-3"
        >
          <fa icon="cog" fixed-width />
          {{ $t("settings") }}
        </router-link>

        <div class="dropdown-divider" />
        <a href="#" class="dropdown-item ps-3" @click.prevent="logout">
          <fa icon="sign-out-alt" fixed-width />
          {{ $t("logout") }}
        </a>
      </div>
    </li>
   
</template>

<script>
import { mapGetters } from "vuex";
import { loadMessages } from "~/plugins/i18n";

export default {
  computed: mapGetters({
    user: "auth/user",
  }),
  mounted(){
    // console.log(this.user);
  },
  methods: {
    async logout() {
      // Log out the user.
      await this.$store.dispatch("auth/logout");

      // Redirect to login.
      this.$router.push({ name: "login" });
    },
  },
};
</script>

<style scoped>
.profile-photo {
  width: 2rem;
  height: 2rem;
  margin: -0.375rem 0;
}
li,a{
  text-align: right;
}
</style>