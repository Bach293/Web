<template>
  <div class="container-fluid text-center fw-light">
    <div class="row align-items-center pt-4">
      <div class="col-12 ">
        {{ data }}
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from "vue";
const data = ref("Ⓒ 2024 Shoop. Tất cả các quyền được bảo lưu")
</script>

<style scoped>
</style>