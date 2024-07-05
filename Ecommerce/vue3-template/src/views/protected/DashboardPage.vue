<template>
  <protected-layout>
    <div class="col bg-f9f9f9">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-7 col-sm-12 p-5">
            <div class="p-3 bg-white">
              <div class="container-fluid">
                <div class="row">
                  <span class="fs-5 fw-bolder">{{ data.taskListTitle }}</span>
                  <p>{{ data.taskListDescription }}</p>
                </div>
                <div class="row text-center">
                  <div
                    class="col-lg-3 col-sm-6 col-6"
                    v-for="(item, index) in data.tasks"
                    :key="index"
                  >
                    <span class="fs-5 fw-bolder font-color_green">{{
                      item.count
                    }}</span>
                    <p>{{ item.label }}</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="p-3 mt-4 bg-white">
              <div class="container-fluid">
                <div class="row">
                  <span class="fs-5 fw-bolder">{{
                    data.salesAnalysisTitle
                  }}</span>
                  <span class="fw-light">{{ data.salesAnalysisTime }}</span>
                  <p>{{ data.salesAnalysisDescription }}</p>
                </div>
                <div class="row mt-5">
                  <div class="col-lg-6 col-sm-12 col-12 py-3">
                    <span
                      >{{ data.sales }}
                      <i class="bi bi-question-circle opacity-50 fs-6"></i
                    ></span>
                    <p class="fw-bolder">{{ data.sales_value }}</p>
                  </div>
                  <div class="col-lg-3 col-sm-6 col-6 py-3">
                    <span
                      >{{ data.salesAnalysis1.title }}
                      <i class="bi bi-question-circle opacity-50 fs-6"></i
                    ></span>
                    <p class="fw-bolder">{{ data.salesAnalysis1.value }}</p>
                    <p class="opacity-50 fs-6">{{ data.salesAnalysis1.des }}</p>
                    <hr />
                    <span
                      >{{ data.salesAnalysis2.title }}
                      <i class="bi bi-question-circle opacity-50 fs-6"></i
                    ></span>
                    <p class="fw-bolder">{{ data.salesAnalysis2.value }}</p>
                    <p class="opacity-50 fs-6">{{ data.salesAnalysis2.des }}</p>
                  </div>
                  <div class="col-lg-3 col-sm-6 col-6 py-3">
                    <span
                      >{{ data.salesAnalysis3.title }}
                      <i class="bi bi-question-circle opacity-50 fs-6"></i
                    ></span>
                    <p class="fw-bolder">{{ data.salesAnalysis3.value }}</p>
                    <p class="opacity-50 fs-6">{{ data.salesAnalysis3.des }}</p>
                    <hr />
                    <span
                      >{{ data.salesAnalysis4.title }}
                      <i class="bi bi-question-circle opacity-50 fs-6"></i
                    ></span>
                    <p class="fw-bolder">{{ data.salesAnalysis4.value }}</p>
                    <p class="opacity-50 fs-6">{{ data.salesAnalysis4.des }}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-5 col-sm-12 p-5">
            <div class="p-3 bg-white">
              <div class="d-flex align-items-center">
                <span class="fs-5 fw-bolder">{{ data.nofication }}</span>
                <router-link to="/1" class="a-green ms-auto">{{
                  data.see_more
                }}</router-link>
              </div>
              <div class="mt-4" v-for="index in 4" :key="index">
                <div class="fw-bolder">
                  {{ data.title }}
                </div>
                <div class="mt-2">
                  {{ data.content }}
                </div>
                <div class="mt-2 fs-6">
                  <router-link to="/1" class="a-green">{{
                    data.status
                  }}</router-link>
                  <span class="opacity-50 mx-3">{{ data.time }}</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </protected-layout>
</template>
  
  <script setup>
import ProtectedLayout from "@/layouts/ProtectedLayout.vue";
import { ref } from "vue";
const data = ref({
  taskListTitle: "Danh sách cần làm",
  taskListDescription: "Những việc bạn sẽ phải làm",
  tasks: [
    {
      label: "Chờ Xác Nhận",
      count: 0,
    },
    {
      label: "Chờ Lấy Hàng",
      count: 0,
    },
    {
      label: "Đã Xử Lý",
      count: 0,
    },
    {
      label: "Trả Hàng/Hoàn Tiền Chờ Xử Lý",
      count: 0,
    },
    {
      label: "Sản Phẩm Bị Tạm Khóa",
      count: 0,
    },
    {
      label: "Sản Phẩm hết Hàng",
      count: 0,
    },
  ],
  salesAnalysisTitle: "Phân tích bán hàng",
  salesAnalysisTime: "( Hôm nay 00:00 GTM+7 19:00 )",
  salesAnalysisDescription:
    "Tổng quan dữ liệu của shop đối với đơn hàng đã xác nhận",
  sales: "Doanh số",
  sales_value: 0,
  salesAnalysis1: {
    title: "Lượt truy cập",
    value: 0,
    des: "Vs hôm qua 0,00 % --",
  },
  salesAnalysis2: {
    title: "Đơn hàng",
    value: 0,
    des: "Vs hôm qua 0,00 % --",
  },
  salesAnalysis3: {
    title: "Lượt xem",
    value: 0,
    des: "Vs hôm qua 0,00 % --",
  },
  salesAnalysis4: {
    title: "Tỷ lệ chuyển đổi",
    value: "0,00%",
    des: "Vs hôm qua 0,00 % --",
  },
  nofication: "Thông Báo",
  see_more: "Xem thêm",
  title: "Các Kênh Thông Tin Chính Thống Từ Shoop",
  content:
    "Lừa đảo bằng việc mạo danh Shopee cung cấp các dịch vụ có thu phí nhằm mục đích trục lợi cá nhân đang dần trở nên phổ biến.",
  status: "Mới",
  time: "Hôm Nay 00:00",
});
</script>
  
  <style scoped>
</style>