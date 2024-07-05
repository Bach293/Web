<script setup>
import { ref } from "vue";
import { defineProps } from "vue";

const show = ref(false);

defineProps({
    menuItem: {
    type: Object,
    required: true,
  },
});
</script>

<template>
  <div @click="show = !show" class="NavMenuItem">
    <a
      class="d-flex justify-content-between align-items-center"
      data-bs-toggle="collapse"
      role="button"
    >
      <img class="px-2" height="25px" :src="menuItem.src" alt="" />
      {{ menuItem.name }}
      <i
        :class="['bi', show ? 'bi-chevron-up' : 'bi-chevron-down', 'ms-auto']"
      ></i>
    </a>
  </div>
  <TransitionGroup>
    <div
      class="nav-menu-item-link"
      v-for="subItem in menuItem.sub"
      :key="subItem.name"
    >
      <router-link v-if="show" :to="subItem.to">{{ subItem.name }}</router-link>
    </div>
  </TransitionGroup>
</template>

<style scoped>
.v-enter-active,
.v-leave-active {
  transition: opacity 0.5s ease;
}

.v-enter-from,
.v-leave-to {
  opacity: 0;
}
.nav-menu-item-link {
  margin: 10px 0px 10px 41px;
}
.NavMenuItem {
  margin: 15px 0px;
}
a {
  text-decoration: none;
  color: #000000;
}
a:hover,
a:active {
  color: #007006;
}
</style>