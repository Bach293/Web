<template>
  <div class="container-fluid">
    <div class="row text-start fw-bolder py-3 px-3">{{ data.title1 }}</div>
    <div class="row">
      <div class="col-12">
        <Carousel
          v-bind="settings_category"
          :breakpoints="breakpoints_category"
          :wrap-around="true"
          class="category_carusel"
        >
          <Slide v-for="item in items" :key="item.text">
            <div class="carousel__item mx-3">
              <img
                class="d-block w-100 h-auto"
                :src="item.image"
                :alt="item.text"
              />
              {{ item.text }}
            </div>
          </Slide>
          <template #addons>
            <Navigation class="custom-navigation" />
          </template>
        </Carousel>
      </div>
    </div>
    <div class="row">
      <img class="d-block w-100 mt-3" src="@/assets/img/index_1.png" alt="" />
    </div>
    <div class="row fw-bolder py-3 fs-4 px-3">{{ data.title2 }}</div>
    <div class="row">
      <div class="col-12">
        <Carousel
          v-bind="settings_product"
          :breakpoints="breakpoints_product"
          :wrap-around="true"
          class="category_carusel"
        >
          <Slide v-for="index in 4" :key="index">
            <div class="carousel__item">
              <div v-if="isLoading">Đang tải dữ liệu sản phẩm...</div>
              <div v-else>
                <Product :product="selectedProduct" />
              </div>
            </div>
          </Slide>

          <template #addons>
            <Navigation class="custom-navigation" />
          </template>
        </Carousel>
      </div>
    </div>
    <hr />
    <div class="row">
      <img class="d-block w-100 h-auto" src="@/assets/img/index_2.png" alt="" />
    </div>
    <div class="row fw-bolder py-3 fs-4 px-3">{{ data.title3 }}</div>
    <div class="row">
      <div class="col-12">
        <Carousel
          v-bind="settings_product"
          :breakpoints="breakpoints_product"
          :wrap-around="true"
          class="category_carusel"
        >
          <Slide v-for="index in 4" :key="index">
            <div class="carousel__item">
              <div v-if="isLoading">Đang tải dữ liệu sản phẩm...</div>
              <div v-else>
                <Product :product="selectedProduct" />
              </div>
            </div>
          </Slide>

          <template #addons>
            <Navigation class="custom-navigation" />
          </template>
        </Carousel>
      </div>
    </div>
    <div class="row">
      <img class="d-block w-100 h-auto" src="@/assets/img/index_3.png" alt="" />
    </div>
    <div class="row fw-bolder py-3 fs-4 px-3">{{ data.title4 }}</div>
    <hr class="border border-success border-3 opacity-75 my-0" />
    <div class="row">
      <!-- <Product
        v-for="index in 4"
        :key="index"
        :product="selectedProduct"
        :className="'col-lg-3 col-sm-6 col-6'"
      /> -->
      <div v-if="isLoading">Đang tải dữ liệu sản phẩm...</div>
      <div
        v-else
        v-for="index in 4"
        :key="index"
        class="col-lg-3 col-sm-6 col-6"
      >
        <Product :product="selectedProduct" />
      </div>
    </div>
    <div class="row">
      <div v-if="isLoading">Đang tải dữ liệu sản phẩm...</div>
      <div
        v-else
        v-for="index in 4"
        :key="index"
        class="col-lg-3 col-sm-6 col-6"
      >
        <Product :product="selectedProduct" />
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import Product from "@/components/global/ProductItem.vue";
import "vue3-carousel/dist/carousel.css";
import { Carousel, Slide, Navigation } from "vue3-carousel";
import productsService from "@/services/products";
import { useToast } from "vue-toastification";

const data = ref({
  title1: "DANH MỤC",
  title2: "THƯƠNG HIỆU NỔI BẬT",
  title3: "ƯU ĐÃI SHOOP",
  title4: "GỢI Ý HÔM NAY",
});

const toast = useToast();
const isLoading = ref(true);

const selectedProduct = ref({
  src: require("@/assets/img/avatar_product.png"),
  name: "Loading product...",
  oldPrice: "₫0",
  discountPrice: "₫0",
  slug: "",
});

const fetchProduct = async () => {
  try {
    const productResponse = await productsService.getPageProductById(1);
    const productData = productResponse.data.data;
    selectedProduct.value = {
      src: require("@/assets/img/avatar_product.png"),
      name: productData.name,
      oldPrice: productData.price,
      discountPrice: productData.price * (1 - productData.discount_amount),
      slug: productData.slug,
    };
    isLoading.value = false;
  } catch (error) {
    toast.error("Failed to load product", {
      timeout: 2000,
    });
    isLoading.value = false;
  }
};
onMounted(fetchProduct);

const settings_category = {
  itemsToShow: 1,
  snapAlign: "center",
};
const breakpoints_category = {
  300: {
    itemsToShow: 3,
    snapAlign: "center",
  },
  700: {
    itemsToShow: 5,
    snapAlign: "center",
  },
  1024: {
    itemsToShow: 10,
    snapAlign: "start",
  },
};
const settings_product = {
  itemsToShow: 1,
  snapAlign: "center",
};
const breakpoints_product = {
  300: {
    itemsToShow: 1,
    snapAlign: "center",
  },
  700: {
    itemsToShow: 2,
    snapAlign: "start",
  },
  1024: {
    itemsToShow: 4,
    snapAlign: "start",
  },
};
const items = [
  {
    image: require("@/assets/img/index_category1.png"),
    text: "Thể thao & du lịch",
  },
  {
    image: require("@/assets/img/index_category2.png"),
    text: "Thời trang nam",
  },
  {
    image: require("@/assets/img/index_category3.png"),
    text: "Điện thoại & phụ kiện",
  },
  {
    image: require("@/assets/img/index_category4.png"),
    text: "Thiết bị điện tử",
  },
  {
    image: require("@/assets/img/index_category5.png"),
    text: "Máy tính & laptop",
  },
  {
    image: require("@/assets/img/index_category6.png"),
    text: "Đồng hồ",
  },
  {
    image: require("@/assets/img/index_category7.png"),
    text: "Thời trang nữ",
  },
  {
    image: require("@/assets/img/index_category8.png"),
    text: "Sức khỏe",
  },
  {
    image: require("@/assets/img/index_category9.png"),
    text: "Thiết bị đồ gia dụng",
  },
  {
    image: require("@/assets/img/index_category10.png"),
    text: "Đồ chơi",
  },
];
</script>

<style>
.custom-navigation {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 1px;
  margin: 0;
  background-color: #f0f0f0;
  border-radius: 50%;
}
</style>