<template>
  <header>
    <div class="container-fluid text-center">
      <div class="row">
        <nav class="navbar navbar-expand-lg px-7 a-white menu-navbar">
          <div class="container-fluid">
            <button
              class="navbar-toggler"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <router-link class="nav-link" :to="data.links.sellerChannelLink">
                    {{ data.texts.sellerChannelText }}
                  </router-link>
                </li>
                <li class="nav-item">
                  <router-link class="nav-link" :to="data.links.becomeSellerLink">
                    {{ data.texts.becomeSellerText }}
                  </router-link>
                </li>
              </ul>
              <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <router-link class="nav-link" :to="data.links.notificationLink">
                    {{ data.texts.notificationText }}
                  </router-link>
                </li>
                <li class="nav-item">
                  <router-link class="nav-link" :to="data.links.supportLink">
                    {{ data.texts.supportText }}
                  </router-link>
                </li>
                <li class="nav-item">
                  <router-link class="nav-link" :to="data.links.registerLink">
                    {{ data.texts.registerText }}
                  </router-link>
                </li>
                <li class="nav-item">
                  <router-link class="nav-link" :to="data.links.loginLink">
                    {{ data.texts.loginText }}
                  </router-link>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <div class="row align-items-center px-7 py-3 h-100">
          <div class="col-3 text-start">
            <router-link :to="data.links.homeLink">
              <img :src="data.assets.logoSrc" :alt="data.assets.logoAlt" class="d-block w-75" />
            </router-link>
          </div>
          <div
            class="col-7 text-center input-container"
            style="transform: translateY(80%); margin-bottom: 50px"
          >
            <input type="text" class="form-control" :placeholder="data.texts.searchPlaceholder" />
            <button type="button" class="btn btn-success">
              <i class="bi bi-search"></i>
            </button>
          </div>
          <div class="col-2">
            <a :href="data.links.cartLink" class="a-black">
              <i class="bi bi-cart4 fs-1"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </header>
</template>

<script setup>
import { ref } from 'vue';

const data = ref({
  links: {
    sellerChannelLink: '/login',
    becomeSellerLink: '/register',
    notificationLink: '/notification',
    supportLink: '/support',
    registerLink: '/register',
    loginLink: '/login',
    homeLink: '/',
    cartLink: '#'
  },
  texts: {
    sellerChannelText: 'Kênh người bán',
    becomeSellerText: 'Trở thành người bán hàng',
    notificationText: 'Thông báo',
    supportText: 'Hỗ trợ',
    registerText: 'Đăng ký',
    loginText: 'Đăng nhập',
    searchPlaceholder: 'Tìm kiếm sản phẩm...'
  },
  assets: {
    logoSrc: require('@/assets/img/logo.png'),
    logoAlt: 'Logo'
  }
});
</script>

<style scoped>
img {
  width: 150px;
}
</style>
