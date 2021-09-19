<template>
  <!-- footer -->
  <div>
    <footer class="section-padding bg-light-theme pt-0 u-line bg-black">
      <div class="container-fluid">
        <div class="row">
          <div class="col-xl col-lg-4 col-md-4 col-sm-6">
            <div class="footer-contact">
              <h6 class="text-custom-white">{{$t('Need Help')}}</h6>
              <ul>
                <li class="fw-600">
                  <span class="text-light-white">{{$t('Call Us')}}</span>
                  <a href="tel:" class="text-custom-white"
                    >+(347) 123 456 789</a
                  >
                </li>
                <li class="fw-600">
                  <span class="text-light-white">{{$t('Email Us')}}</span>
                  <a href="mailto:" class="text-custom-white"
                    >{{$t('demo@domain.com')}}</a
                  >
                </li>
                <li class="fw-600">
                  <span class="text-light-white">{{$t('Join our twitter')}}</span>
                  <a href="#" class="text-custom-white">@quickmunch</a>
                </li>
                <li class="fw-600">
                  <span class="text-light-white">{{$t('Join our instagram')}}</span>
                  <a href="#" class="text-custom-white">@quickmunch</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-xl col-lg-4 col-md-4 col-sm-6">
            <div class="footer-links">
              <h6 class="text-custom-white">{{$t('Get to Know Us')}}</h6>
              <ul>
                <li>
                  <a href="#" class="text-light-white fw-600">{{$t('About Us')}}</a>
                </li>
                <li><a href="#" class="text-light-white fw-600">{{$t('Blog')}}</a></li>
                <li>
                  <a href="#" class="text-light-white fw-600">{{$t('Socialize')}}</a>
                </li>
                <li>
                  <a href="#" class="text-light-white fw-600">{{$t('Quickmunch')}}</a>
                </li>
                <li><a href="#" class="text-light-white fw-600">{{$t('Perks')}}</a></li>
              </ul>
            </div>
          </div>
          <div class="col-xl col-lg-4 col-md-4 col-sm-6">
            <div class="footer-links">
              <h6 class="text-custom-white">{{$t('Let Us Help You')}}</h6>
              <ul>
                <li>
                  <a href="#" class="text-light-white fw-600"
                    >{{$t('Account Details')}}</a
                  >
                </li>
                <li>
                  <a href="#" class="text-light-white fw-600">{{$t('Order History')}}</a>
                </li>
                <li>
                  <a href="#" class="text-light-white fw-600"
                    >{{$t('Find restaurant')}}</a
                  >
                </li>
                <li><a href="#" class="text-light-white fw-600">{{$t('Login')}}</a></li>
                <li>
                  <a href="#" class="text-light-white fw-600">{{$t('Track order')}}</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-xl col-lg-4 col-md-4 col-sm-6">
            <div class="footer-links">
              <h6 class="text-custom-white">{{$t('Doing Business')}}</h6>
              <ul>
                <li>
                  <a href="#" class="text-light-white fw-600"
                    >{{$t('Suggest an Idea')}}</a
                  >
                </li>
                <li>
                  <a href="#" class="text-light-white fw-600"
                    >{{$t('Be a Partner restaurant')}}</a
                  >
                </li>
                <li>
                  <a href="#" class="text-light-white fw-600"
                    >{{$t('Create an Account')}}</a
                  >
                </li>
                <li><a href="#" class="text-light-white fw-600">{{$t('Help')}}</a></li>
              </ul>
            </div>
          </div>
          <div class="col-xl col-lg-4 col-md-4 col-sm-6">
            <div class="footer-links">
              <h6 class="text-custom-white">{{$t('Download Apps')}}</h6>
              <div class="appimg">
                <a href="#">
                  <img
                    :src="asset('q/assets/img/playstore.jpg')"
                    class="img-fluid"
                    alt="app logo"
                  />
                </a>
              </div>
              <div class="appimg">
                <a href="#">
                  <img
                    :src="asset('q/assets/img/appstore.jpg')"
                    class="img-fluid"
                    alt="app logo"
                  />
                </a>
              </div>
            </div>
          </div>
          <div class="col-xl col-lg-4 col-md-4 col-sm-6">
            <div class="footer-contact">
              <h6 class="text-custom-white">{{$t('Newsletter')}}</h6>
              <form class="subscribe_form">
                <div class="input-group">
                  <input
                    type="text"
                    class="form-control form-control-submit"
                    name="email"
                    placeholder="Enter your email"
                  />
                  <span class="input-group-btn">
                    <button class="btn btn-second btn-submit" type="button">
                      <i class="fas fa-paper-plane"></i>
                    </button>
                  </span>
                </div>
              </form>
            </div>
          </div>
          <div class="col-md-12">
            <div class="ft-social-media">
              <h6 class="text-center text-light-black">{{$t('Follow us')}}</h6>
              <ul>
                <li>
                  <a href="#"><i class="fab fa-facebook-f"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fab fa-twitter"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fab fa-instagram"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fab fa-pinterest-p"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fab fa-youtube"></i></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <div class="copyright bg-black">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-4">
            <div class="payment-logo mb-md-20">
              <span class="text-light-white fs-14 mr-3">{{$t('We are accept')}}</span>
              <div class="payemt-icon">
                <img :src="asset('q/assets/img/card-front.jpg')" alt="#" />
                <img :src="asset('q/assets/img/visa.jpg')" alt="#" />
                <img :src="asset('q/assets/img/amex-card-front.png')" alt="#" />
                <img :src="asset('q/assets/img/mastercard.png')" alt="#" />
              </div>
            </div>
          </div>
          <div class="col-lg-4 text-center medewithlove align-self-center">
            <a href="https://metropolitanhost.com/" class="text-custom-white"
              >{{$t('Made with Real ')}}<i class="fas fa-heart"></i> Metropolitanthemes</a
            >
          </div>
          <div class="col-lg-4">
            <div class="copyright-text">
              <span class="text-light-white"
                >©
                <a href="https://metropolitanhost.com/" class="text-light-white"
                  >{{$t('Metropolitanthemes')}}</a
                >
                - 2020 | All Right Reserved</span
              >
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- footer -->
</template>

<script>
export default {
  name:"Footer",
  data: () => ({
    appName: window.config.appName,
  }),
};
</script>

<style scoped>
</style>
