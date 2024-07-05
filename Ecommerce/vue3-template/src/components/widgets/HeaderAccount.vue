<template>
  <div class="container-fluid text-center">
    <div class="row d-flex justify-content-between align-items-center px-7">
      <div class="col-lg-2 col-sm-4 col-4 text-start px-0">
        <router-link to="/">
          <img
            :src="logoSrc"
            class="d-block w-75 py-2"
            :alt="logoAlt"
          />
        </router-link>
      </div>
      <div class="col text-end px-0">
        <router-link class="a-black" :to="helpLink">{{ helpText }}</router-link>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';

const logoSrc = ref(require('@/assets/img/logo.png'));
const logoAlt = ref('Logo');
const helpLink = ref('/1');
const helpText = ref('Bạn cần giúp đỡ?');
</script>

<style>
</style>
