<template>
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <router-link class="navbar-brand d-flex align-items-center" :to="dashboardLink">
        <img class="d-block" :src="logoSrc" :alt="logoAlt" />
        <span>{{ brandText }}</span>
      </router-link>
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
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-flex align-items-center mx-3">
          <li class="nav-item navbar-store-header">
            <router-link class="nav-link" aria-current="page" :to="dashboardLink">
              <div class="rounded-circle text-center">{{ userInitial }}</div>
            </router-link>
          </li>
          <li class="nav-item">
            <router-link :to="dashboardLink" class="a-black">{{ storeName }}</router-link>
          </li>
          <li class="nav-item">
            <router-link :to="dashboardLink" class="a-black"><i class="bi bi-bell fs-5 px-3"></i></router-link>
          </li>
          <li class="nav-item">
            <div class="border rounded-pill p-2">{{ storeInfo }}</div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script setup>
import { ref } from 'vue';

const dashboardLink = ref('/dashboard');
const logoSrc = ref(require('@/assets/img/logo.png'));
const logoAlt = ref('Logo');
const brandText = ref('Kênh Người Bán');
const userInitial = ref('A');
const storeName = ref('Tên cửa hàng');
const storeInfo = ref('Cửa hàng A');
</script>

<style scoped>
img {
  width: 150px;
}
</style>
