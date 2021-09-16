<template>
  <div>
    <slider />
    <category />
    <prevOrder />
    <exCollection />
  </div>
</template>

<script>
import Slider from "~/components/home/Slider";
import Category from "~/components/home/Category";
import PrevOrder from "~/components/home/PrevOrder";
import ExCollection from "~/components/home/ExCollection";
export default {
  name: "Home",
  components: {
    Slider,
    Category,
    PrevOrder,
    ExCollection,
  },
};
</script>

<style>

</style>