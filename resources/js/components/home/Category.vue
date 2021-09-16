<template>
  <div>
    <!-- Browse by category -->
    <section class="browse-cat u-line section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-header-left">
                        <h3 class="text-light-black header-title title">Browse by cuisine <span class="fs-14"><a routerLink="/restaurant">See all restaurant</a></span></h3>
                    </div>
                </div>
                <div class="col-12">
                    <div class="category-slider swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <a routerLink="/restaurant" class="categories">
                                    <div class="icon icon-parent text-custom-white bg-light-green"> <i class="fas fa-map-marker-alt"></i>
                                    </div> <span class="text-light-black cat-name">Brooklyn</span>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a routerLink="/restaurant" class="categories">
                                    <div class="icon text-custom-white bg-light-green ">
                                        <img src="q/assets/img/restaurants/125x125/cuisine-1.jpg" class="rounded-circle" alt="categories">
                                    </div> <span class="text-light-black cat-name">Italian </span>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a routerLink="/restaurant" class="categories">
                                    <div class="icon text-custom-white bg-light-green ">
                                        <img src="q/assets/img/restaurants/125x125/cuisine-2.jpg" class="rounded-circle" alt="categories">
                                    </div> <span class="text-light-black cat-name">Thai </span>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a routerLink="/restaurant" class="categories">
                                    <div class="icon text-custom-white bg-light-green ">
                                        <img src="q/assets/img/restaurants/125x125/cuisine-3.jpg" class="rounded-circle" alt="categories">
                                    </div> <span class="text-light-black cat-name">Chinese </span>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a routerLink="/restaurant" class="categories">
                                    <div class="icon text-custom-white bg-light-green ">
                                        <img src="q/assets/img/restaurants/125x125/cuisine-4.jpg" class="rounded-circle" alt="categories">
                                    </div> <span class="text-light-black cat-name">Mexican </span>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a routerLink="/restaurant" class="categories">
                                    <div class="icon text-custom-white bg-light-green ">
                                        <img src="q/assets/img/restaurants/125x125/cuisine-5.jpg" class="rounded-circle" alt="categories">
                                    </div> <span class="text-light-black cat-name">Indian </span>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a routerLink="/restaurant" class="categories">
                                    <div class="icon text-custom-white bg-light-green ">
                                        <img src="q/assets/img/restaurants/125x125/cuisine-6.jpg" class="rounded-circle" alt="categories">
                                    </div> <span class="text-light-black cat-name">Lebanese </span>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a routerLink="/restaurant" class="categories">
                                    <div class="icon text-custom-white bg-light-green ">
                                        <img src="q/assets/img/restaurants/125x125/cuisine-7.jpg" class="rounded-circle" alt="categories">
                                    </div> <span class="text-light-black cat-name">Japanese </span>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a routerLink="/restaurant" class="categories">
                                    <div class="icon text-custom-white bg-light-green ">
                                        <img src="q/assets/img/restaurants/125x125/cuisine-8.jpg" class="rounded-circle" alt="categories">
                                    </div> <span class="text-light-black cat-name">American </span>
                                </a>
                            </div>
                        </div>
                        <!-- Add Arrows -->
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Browse by category -->
  </div>
</template>

<script>
  export default {
    name: "Category"
  }
</script>

<style scoped>

</style>