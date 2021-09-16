<template>
  <div class="main-layout">
    <navbar />
    <navbarq />

    <!-- <div class="container-lg mt-4"> -->
    <div>
      <child />
    </div>

    <footerq />
  </div>
</template>

<script>
import Navbar from "~/components/Navbar";
import Navbarq from "~/components/Navbarq";
import Footerq from "~/components/Footerq";

export default {
  name: "MainLayout",

  components: {
    Navbar,
    Navbarq,
    Footerq
  },
};
</script>
