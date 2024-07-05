<template>
  <div :class="['p-4', 'products', className]">
    <router-link class="nav-link" :to="{name: 'detail', params:{slug: product.slug}}">
      <img class="d-block w-100 h-auto" :src="product.src" alt="" />
    </router-link>
    <div class="row p-3 text-start">
      <router-link class="nav-link" :to="{name: 'detail', params:{slug: product.slug}}">{{ product.name }}</router-link>
    </div>
    <div class="row px-3">
      <div class="col-lg-6 col-md-12 text-start">
        <p class="text-decoration-line-through fw-light">
          {{ product.oldPrice }}
        </p>
        <p class="font-color_red">{{ product.discountPrice }}</p>
      </div>
      <div class="col-lg-6 col-md-12 justify-content-end d-flex">
        <div
          class="bg-success rounded-circle a-white align-items-center justify-content-center d-flex"
        >
          <router-link class="nav-link" :to="{name: 'detail', params:{slug: product.slug}}"
            ><i class="bi bi-cart2"></i
          ></router-link>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { defineProps } from 'vue'

defineProps({
  product: {
    type: Object,
    required: true
  },
  className: {
    type: String,
    required: true
  }
})
</script>

<style>
</style>