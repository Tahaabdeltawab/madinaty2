<template>
  <ul class="navbar-nav ml-auto mr-3 mt-2 mt-lg-0">
    <li class="nav-item active">
      <a class="nav-link" href="#"
        >{{$t('Home ')}}<span class="sr-only">(current)</span></a
      >
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">{{$t('Features')}}</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">{{$t('Pricing')}}</a>
    </li>
  </ul>
</template>

<script>
import { mapGetters } from "vuex";
import { loadMessages } from "~/plugins/i18n";

export default {
  computed: mapGetters({
    locale: "lang/locale",
    locales: "lang/locales",
  }),

  methods: {},
};
</script>
<style scoped>
li,
a {
  text-align: right;
}
</style>