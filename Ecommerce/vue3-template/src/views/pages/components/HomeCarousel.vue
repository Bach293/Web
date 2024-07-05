<template>
  <div class="container-fluid" style="background-color: white">
    <div class="row">
      <div class="col-12 p-0">
        <Carousel :autoplay="2000" :wrap-around="true" class="custom-carousel">
          <Slide v-for="slide in 5" :key="slide">
            <div class="carousel__item">
              <img
                src="@/assets/img/slider1.png"
                class="d-block w-100 h-auto"
                alt="..."
              />
            </div>
          </Slide>

          <template #addons>
            <Pagination class="carousel__pagination" />
          </template>
        </Carousel>
      </div>
    </div>
    <div class="row align-items-center">
      <div class="col-lg-1 col-sm-2 col-3">
        <img
          class="d-block w-100 h-auto"
          src="@/assets/img/slider2.png"
          alt=""
        />
      </div>
      <div class="col-lg-3 col-sm-4 col-9 text-start">
        <span>{{ data.title1 }}</span>
        <br />
        <span class="fw-light font_small">{{ data.des1 }}</span>
      </div>
      <div class="col-lg-1 col-sm-2 col-3">
        <img
          class="d-block w-100 h-auto"
          src="@/assets/img/slider3.png"
          alt=""
        />
      </div>
      <div class="col-lg-3 col-sm-4 col-9 text-start">
        <span>{{ data.title2 }}</span>
        <br />
        <span class="fw-light font_small"
          >{{ data.des2 }}</span
        >
      </div>
      <div class="col-lg-1 col-sm-2 col-3">
        <img
          class="d-block w-100 h-auto"
          src="@/assets/img/slider4.png"
          alt=""
        />
      </div>
      <div class="col-lg-3 col-sm-4 col-9 text-start">
        <span>{{ data.title3 }}</span>
        <br />
        <span class="fw-light font_small">{{ data.des3 }}</span>
      </div>
    </div>
  </div>
</template>

<script setup>
import { Carousel, Slide, Pagination } from "vue3-carousel";
import { ref } from "vue";

const data = ref({
  title1: "7 ngày miễn phí trả hàng",
  des1: "Trả hàng miễn phí trong 7 ngày",
  title2: "Hàng chính hãng 100%",
  des2: "Đảm bảo hàng chính hãng hoặc hoàn tiền gấp đôi",
  title3: "Miễn phí vận chuyển",
  des3: "Giao miễn phí toàn quốc",
});
</script>

<style scoped>
.custom-carousel {
  position: relative;
}
.carousel__pagination {
  position: absolute;
  bottom: 20px;
  left: 50%;
  transform: translateX(-50%);
}
</style>