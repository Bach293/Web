<template>
  <!-- Start Header -->
  <HeaderSection />
  <!-- End Header -->
  <main>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-2 col-sm-4 col-12">
          <NavMenu />
        </div>
        <slot></slot>
      </div>
    </div>
  </main>
  <!-- Start Footer -->
  <FooterSection />
  <!-- End Footer -->
</template>

<script setup>
import HeaderSection from "@/components/widgets/HeaderDashboard.vue";
import FooterSection from "@/components/widgets/FooterAccount.vue";
import NavMenu from "@/components/global/NavMenu.vue";
</script>

<style>
</style>