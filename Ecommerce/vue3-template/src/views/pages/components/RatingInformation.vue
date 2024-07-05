<template>
  <div class="container-fluid text-start bg-white">
    <div class="row p-3">
      <div class="col-12 fs-4">{{ data.title }}</div>
      <div class="col-12 p-3 mb-3">
        <div class="container-fluid py-3 bg-f2f8f2">
          <div class="row h-100 d-flex align-items-center">
            <div
              class="col-xl-2 col-lg-3 col-sm-4 col-6 text-center font-color_green"
            >
              <span class="fs-1">{{ data.rating }}</span>
              <span class="fs-4 px-2">{{ data.evaluate }}</span>
              <br />
              <img
                height="25px"
                :src="data.imgStar"
                v-for="index in 5"
                :key="index"
              />
            </div>
            <div class="col">
              <input
                type="radio"
                class="btn-check"
                name="options-outlined"
                id="op-rating-1"
                autocomplete="off"
                checked
              />
              <label class="btn btn-outline-success m-2" for="op-rating-1">
                {{ data.select1 }}
              </label>
              <input
                type="radio"
                class="btn-check"
                name="options-outlined"
                id="op-rating-2"
                autocomplete="off"
              />
              <label class="btn btn-outline-success m-2" for="op-rating-2">
                {{ data.select2 }}
              </label>
              <input
                type="radio"
                class="btn-check"
                name="options-outlined"
                id="op-rating-3"
                autocomplete="off"
              />
              <label class="btn btn-outline-success m-2" for="op-rating-3">
                {{ data.select3 }}
              </label>
              <input
                type="radio"
                class="btn-check"
                name="options-outlined"
                id="op-rating-4"
                autocomplete="off"
              />
              <label class="btn btn-outline-success m-2" for="op-rating-4">
                {{ data.select4 }}
              </label>
              <input
                type="radio"
                class="btn-check"
                name="options-outlined"
                id="op-rating-5"
                autocomplete="off"
              />
              <label class="btn btn-outline-success m-2" for="op-rating-5">
                {{ data.select5 }}
              </label>
              <input
                type="radio"
                class="btn-check"
                name="options-outlined"
                id="op-rating-6"
                autocomplete="off"
              />
              <label class="btn btn-outline-success m-2" for="op-rating-6">
                {{ data.select6 }}
              </label>
              <input
                type="radio"
                class="btn-check"
                name="options-outlined"
                id="op-rating-7"
                autocomplete="off"
              />
              <label class="btn btn-outline-success m-2" for="op-rating-7">
                {{ data.select7 }}
              </label>
              <input
                type="radio"
                class="btn-check"
                name="options-outlined"
                id="op-rating-8"
                autocomplete="off"
              />
              <label class="btn btn-outline-success m-2" for="op-rating-8">
                {{ data.select8 }}
              </label>
            </div>
          </div>
        </div>
      </div>
      <div class="row" v-for="index in 4" :key="index">
        <div class="col-1 text-center avatar-user">
          <div class="rounded-circle">{{ data.avatar }}</div>
        </div>
        <div class="col-11">
          {{ data.name }}
          <br />
          <img
            height="15px"
            :src="data.imgStar"
            v-for="index in 5"
            :key="index"
          />
          <br />
          <p class="fw-light">{{ data.time }} | {{ data.classify }}</p>
          <p>
            {{ data.comment }}
          </p>
          <img
            class="py-2 mx-2"
            width="90px"
            :src="data.imgPreview"
            v-for="index in 4"
            :key="index"
          />
        </div>
        <div class="mt-4 px-3 opacity-50">
          <hr />
        </div>
      </div>
      <div class="col-12 mt-5">
        <nav aria-label="Page navigation example">
          <ul class="pagination justify-content-end">
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">1</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">2</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">3</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from "vue";

const data = ref({
  title: "ĐÁNH GIÁ SẢN PHẨM",
  rating: "5.0",
  evaluate: "trên 5",
  select1: "Tất cả",
  select2: "5 sao (2,1k)",
  select3: "4 sao (31)",
  select4: "3 sao (31)",
  select5: "2 sao (31)",
  select6: "1 sao (31)",
  select7: "Có bình luận (31)",
  select8: "Có Hình Ảnh / Video (739)",
  avatar: "A",
  name: "dangquochan",
  imgStar: require("@/assets/img/star.png"),
  time: "2022-03-31 20:45",
  classify: "Phân loại hàng: Space Gray",
  comment:
    "Máy mỏng nhẹ, lướt nhanh. Shop đóng gói kỹ, đặt 12h thứ 6 mà 9h sáng thứ 7 đã nhận được, xuất sắc shop ơi.",
  imgPreview: require("@/assets/img/preview.png"),
});
</script>

<style>
</style>