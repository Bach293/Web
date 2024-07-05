<template>
  <div class="container-fluid bg-white">
    <div class="row h-100 align-items-center" id="info-shop">
      <div
        class="col-lg-2 col-sm-4 col-12 py-3 px-0 d-flex align-items-center justify-content-center"
      >
        <div class="rounded-circle" id="avatar-shop">
          {{ data.avatarInitial }}
        </div>
      </div>
      <div class="col-lg-2 col-sm-6 col-12 py-3 text-start">
        {{ data.name }} <br />
        <p class="fw-light">{{ data.lastOnline }}</p>
        <button class="btn btn-outline-success">
          {{ data.chatButtonText }}
        </button>
        <button class="btn btn-outline-secondary">
          {{ data.viewShopButtonText }}
        </button>
      </div>
      <div class="col-lg-1 col-sm-3 col-5 py-3 text-start">
        {{ data.ratingText }}
        <br /><br />
        {{ data.productsText }}
      </div>
      <div class="col-lg-1 col-sm-3 col-5 py-3 text-end info-shop_text1">
        {{ data.ratingCount }}
        <br /><br />
        {{ data.productCount }}
      </div>
      <div class="col-lg-2 col-sm-3 col-5 py-3 text-start">
        {{ data.responseRateText }}
        <br /><br />
        {{ data.responseTimeText }}
      </div>
      <div class="col-lg-1 col-sm-3 col-5 py-3 text-end info-shop_text1">
        {{ data.responseRate }}
        <br /><br />
        {{ data.responseTime }}
      </div>
      <div class="col-lg-1 col-sm-3 col-5 py-3 text-start">
        {{ data.joinedText }}
        <br /><br />
        {{ data.followersText }}
      </div>
      <div class="col-lg-1 col-sm-3 col-5 py-3 text-end info-shop_text1">
        {{ data.joined }}
        <br /><br />
        {{ data.followerCount }}
      </div>
    </div>
  </div>
</template>
  
  <script setup>
import { ref } from "vue";

const data = ref({
  avatarInitial: "A",
  name: "Apple Flagship Store",
  lastOnline: "Online 15 Giờ Trước",
  chatButtonText: "Chat Ngay",
  viewShopButtonText: "Xem Shop",
  ratingText: "Đánh giá",
  productsText: "Sản phẩm",
  ratingCount: "67,6k",
  productCount: "300",
  responseRateText: "Tỷ lệ phản hồi",
  responseTimeText: "Thời gian phản hồi",
  responseRate: "100%",
  responseTime: "trong vài giờ",
  joinedText: "Tham gia",
  followersText: "Người theo dõi",
  joined: "5 năm trước",
  followerCount: "588k",
});
</script>
  
<style>
</style>
  