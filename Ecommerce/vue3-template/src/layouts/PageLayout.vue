<template>
  <!-- Start Header -->
  <HeaderSection />
  <!-- End Header -->
  <main>
    <slot></slot>
  </main>

  <!-- Start Footer -->
  <FooterSection />
  <!-- End Footer -->
</template>

<script setup>
import HeaderSection from "@/components/widgets/HeaderMain.vue";
import FooterSection from "@/components/widgets/FooterMain.vue";
</script>

<style>
</style>