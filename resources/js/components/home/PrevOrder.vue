<template>
  <div>
    <!-- your previous order -->
    <section class="recent-order section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-header-left">
                        <h3 class="text-light-black header-title title">Your previous orders <span class="fs-14"><a routerLink="/orderdetails">See all past orders</a></span></h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="product-box mb-md-20">
                        <div class="product-img">
                            <a routerLink="/restaurant">
                                <img src="q/assets/img/restaurants/255x104/order-1.jpg" class="img-fluid full-width" alt="product-img">
                            </a>
                        </div>
                        <div class="product-caption">
                            <h6 class="product-title"><a routerLink="/restaurant" class="text-light-black "> Chilli Chicken Pizza</a></h6>
                            <p class="text-light-white">Big Bites, Brooklyn</p>
                            <div class="product-btn">
                                <a routerLink="/orderdetails" class="btn-first white-btn full-width text-light-green fw-600">Track Order</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="product-box mb-md-20">
                        <div class="product-img">
                            <a routerLink="/restaurant">
                                <img src="q/assets/img/restaurants/255x104/order-2.jpg" class="img-fluid full-width" alt="product-img">
                            </a>
                        </div>
                        <div class="product-caption">
                            <h6 class="product-title"><a routerLink="/restaurant" class="text-light-black "> Hakka Noodles</a></h6>
                            <p class="text-light-white">Flavor Town, Brooklyn</p>
                            <div class="product-btn">
                                <a routerLink="/orderdetails" class="btn-first white-btn full-width text-light-green fw-600">Track Order</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="product-box mb-md-20">
                        <div class="product-img">
                            <a routerLink="/restaurant">
                                <img src="q/assets/img/restaurants/255x104/order-3.jpg" class="img-fluid full-width" alt="product-img">
                            </a>
                        </div>
                        <div class="product-caption">
                            <h6 class="product-title"><a routerLink="/restaurant" class="text-light-black "> Vegan Burger </a></h6>
                            <p class="text-light-white">Great Burger, Brooklyn</p>
                            <div class="product-btn">
                                <a routerLink="/orderdetails" class="btn-first white-btn full-width text-light-green fw-600">Track Order</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="product-box mb-md-20">
                        <div class="product-img">
                            <a routerLink="/restaurant">
                                <img src="q/assets/img/restaurants/255x104/order-4.jpg" class="img-fluid full-width" alt="product-img">
                            </a>
                        </div>
                        <div class="product-caption">
                            <h6 class="product-title"><a routerLink="/restaurant" class="text-light-black "> Sticky Date Cake</a></h6>
                            <p class="text-light-white">Smile N’ Delight, Brooklyn</p>
                            <div class="product-btn">
                                <a routerLink="/orderdetails" class="btn-first white-btn full-width text-light-green fw-600">Track Order</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- your previous order -->
  </div>
</template>

<script>
  export default {
    name: "PrevOrder"
  }
</script>

<style scoped>

</style>