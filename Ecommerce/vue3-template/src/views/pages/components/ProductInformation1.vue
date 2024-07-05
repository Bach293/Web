<template>
  <div class="bg-white">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-5 col-sm-12 col-12 p-4">
          <img class="d-block w-100" :src="data.images.main" alt="" />
          <div id="carouselExample" class="carousel slide carousel-fade">
            <div class="carousel-inner carousel-inner-img">
              <div
                v-for="(item, index) in data.images.carousel"
                :key="index"
                :class="['carousel-item', { active: index === 0 }]"
              >
                <img
                  v-for="(img, imgIndex) in item"
                  :key="imgIndex"
                  :src="img"
                  alt="..."
                />
              </div>
            </div>
            <button
              class="carousel-control-prev"
              type="button"
              data-bs-target="#carouselExample"
              data-bs-slide="prev"
            >
              <span
                class="carousel-control-prev-icon bg-dark rounded-circle"
                aria-hidden="true"
              ></span>
              <span class="visually-hidden">{{ previousText }}</span>
            </button>
            <button
              class="carousel-control-next"
              type="button"
              data-bs-target="#carouselExample"
              data-bs-slide="next"
            >
              <span
                class="carousel-control-next-icon bg-dark rounded-circle"
                aria-hidden="true"
              ></span>
              <span class="visually-hidden">{{ nextText }}</span>
            </button>
          </div>
        </div>
        <div class="col-lg-7 col-sm-12 col-12 p-4 text-start">
          <div class="fs-4">
            {{ data.title }}
          </div>
          <div class="pt-3 d-flex align-items-center img-start_op1">
            <span class="fw-light">{{ data.rating }}</span>
            <img src="@/assets/img/star.png" alt="" v-for="i in 5" :key="i" />
            <span style="padding-left: 7%">{{ data.reviews }}k</span>
            <span class="fw-light mx-1">{{ reviewText }}</span>
            <span style="padding-left: 7%">{{ data.sold }}k</span>
            <span class="fw-light mx-1">{{ soldText }}</span>
            <span class="fw-light ms-auto">{{ reportText }}</span>
          </div>
          <div
            class="my-4 d-flex align-items-center justify-content-between div-sale"
          >
            <span></span>
            <span class="text-decoration-line-through opacity-50 fs-5">
              {{ data.originalPrice }}
            </span>
            <span class="fs-2">{{ data.discountPrice }}</span>
            <span class="fs-5">{{ data.discountPercent }}</span>
            <span></span>
          </div>
          <div class="container-fluid text-start">
            <div class="row">
              <div class="col-lg-3 col-12">{{ shippingText }}</div>
              <div class="col-lg-9 col-12">
                <p>{{ data.shipping.handling }}</p>
                <p>{{ data.shipping.freeShipping }}</p>
                <div class="d-inline-flex align-items-center">
                  <span class="fw-light" style="width: 200px">
                    {{ shippingToText }}
                  </span>
                  <select class="form-select border-0">
                    <option
                      v-for="(location, index) in data.shipping
                        .locations"
                      :key="index"
                      :value="index + 1"
                    >
                      {{ location }}
                    </option>
                  </select>
                </div>
                <br />
                <div class="d-inline-flex align-items-center">
                  <span class="fw-light" style="width: 225px">
                    {{ shippingFeeText }}
                  </span>
                  <select class="form-select border-0">
                    <option
                      v-for="(fee, index) in data.shipping.fees"
                      :key="index"
                      :value="index + 1"
                    >
                      {{ fee }}
                    </option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row my-2 align-items-center">
              <div class="col-lg-3 col-12">{{ colorText }}</div>
              <div class="col-lg-9 col-12">
                <span v-for="(color, index) in data.colors" :key="index">
                  <input
                    type="radio"
                    class="btn-check"
                    :name="'color-options'"
                    :id="'color-' + index"
                    autocomplete="off"
                    :checked="index === 0"
                  />
                  <label
                    class="btn btn-outline-success"
                    :for="'color-' + index"
                  >
                    <img width="30px" :src="color.image" alt="" />
                    {{ color.label }}
                  </label>
                </span>
              </div>
            </div>
            <div class="row my-4 align-items-center">
              <div class="col-lg-3 col-12">{{ quantityText }}</div>
              <div class="col-lg-9 col-12 d-inline-flex align-items-center">
                <button
                  class="btn btn-outline-secondary opacity-50"
                  @click="decreaseValue"
                >
                  -
                </button>
                <input
                  type="text"
                  class="form-control text-center"
                  id="numberInput"
                  :value="value"
                  style="width: 70px"
                  readonly
                />
                <button
                  class="btn btn-outline-secondary opacity-50"
                  @click="increaseValue"
                >
                  +
                </button>
                <span class="fw-light mx-4">
                  {{ data.stock }} {{ availableText }}
                </span>
              </div>
            </div>
            <div class="row d-inline-flex">
              <div class="col">
                <button class="btn btn-outline-success px-3 btn-1">
                  {{ addToCartText }}
                </button>
                <button class="btn btn-success mx-3 btn-1">
                  {{ buyNowText }}
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
  
  <script setup>
import { ref } from "vue";

const data = {
  images: {
    main: require("@/assets/img/product_1.png"),
    carousel: [
      [
        require("@/assets/img/product_2.png"),
        require("@/assets/img/product_3.png"),
        require("@/assets/img/product_2.png"),
        require("@/assets/img/product_2.png"),
        require("@/assets/img/product_2.png"),
      ],
      [
        require("@/assets/img/product_2.png"),
        require("@/assets/img/product_2.png"),
        require("@/assets/img/product_3.png"),
        require("@/assets/img/product_2.png"),
        require("@/assets/img/product_2.png"),
      ],
      [
        require("@/assets/img/product_2.png"),
        require("@/assets/img/product_2.png"),
        require("@/assets/img/product_2.png"),
        require("@/assets/img/product_3.png"),
        require("@/assets/img/product_2.png"),
      ],
    ],
  },
  title:
    "Máy tính xách tay Apple MacBook Air (2020) M1 Chip, 13.3-inch, 8GB, 256GB SSD",
  rating: 5.0,
  reviews: 2200,
  sold: 7900,
  originalPrice: "₫28.990.000",
  discountPrice: "₫19.290.000",
  discountPercent: "33% GIẢM",
  shipping: {
    handling: "Xử lý đơn hàng bởi Shoop",
    freeShipping: "Miễn phí vận chuyển",
    locations: ["Huyện Ba Vì", "Quận Đống Đa", "Quận Bắc Từ Liêm"],
    fees: ["0đ", "15.000đ", "50.000đ"],
  },
  colors: [
    { label: "Gold", image: require("@/assets/img/laptop.png") },
    { label: "Silver", image: require("@/assets/img/laptop.png") },
    { label: "Space Gray", image: require("@/assets/img/laptop.png") },
  ],
  stock: 100,
};

const previousText = ref("Previous");
const nextText = ref("Next");
const reviewText = ref("Đánh giá");
const soldText = ref("Đã bán");
const reportText = ref("Tố cáo");
const shippingText = ref("Vận chuyển");
const shippingToText = ref("Vận Chuyển Tới");
const shippingFeeText = ref("Phí Vận Chuyển");
const colorText = ref("Màu sắc");
const quantityText = ref("Số lượng");
const availableText = ref("sản phẩm có sẵn");
const addToCartText = ref("Thêm vào giỏ hàng");
const buyNowText = ref("Mua ngay");

const value = ref(1);

function decreaseValue() {
  if (value.value > 0) {
    value.value--;
  }
}

function increaseValue() {
  if (value.value < 100) {
    value.value++;
  }
}
</script>
  
<style>
</style>
  