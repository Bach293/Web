<template>
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarTogglerDemo01"
        aria-controls="navbarTogglerDemo01"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
        <span class="mx-2">{{ $t("catalogue") }}</span>
      </button>
      <div
        class="collapse navbar-collapse flex-column align-items-start"
        id="navbarTogglerDemo01"
      >
        <ul class="navbar-nav flex-column w-100">
          <li
            class="nav-item"
            v-for="(item, index) in menuItemData"
            :key="index"
          >
            <NavMenuItem :menuItem="item" />
          </li>
          <li>
            <button class="btn btn-danger" @click="logout">Đăng xuất</button>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script setup>
import NavMenuItem from "@/components/global/NavMenuItem.vue";
import { ref } from "vue";
import { useAuthStore } from "@/router/authStore";
import { useToast } from "vue-toastification";

const toast = useToast();
const authStore = useAuthStore();

const logout = async () => {
  try {
    await authStore.logout();
    toast.success("Logout Success", {
      timeout: 2000,
    });
  } catch (error) {
    toast.error("Logout Failed: " + error, {
      timeout: 2000,
    });
  }
};

const menuItemData = ref({
  vanChuyen: {
    name: "Vận chuyển",
    src: require("@/assets/img/navbar-1.png"),
    sub: [
      {
        name: "Vận Chuyển 1",
        to: "/1",
      },
      {
        name: "Vận Chuyển 2",
        to: "/2",
      },
      {
        name: "Vận Chuyển 3",
        to: "/3",
      },
    ],
  },
  quanLyDonHang: {
    name: "Quản Lý Đơn Hàng",
    src: require("@/assets/img/navbar-2.png"),
    sub: [
      {
        name: "Tất Cả",
        to: "/1",
      },
      {
        name: "Đơn Hủy",
        to: "/2",
      },
      {
        name: "Trả Hàng/Hoàn Tiền",
        to: "/3",
      },
    ],
  },
  quanLySanPham: {
    name: "Quản Lý Sản Phẩm",
    src: require("@/assets/img/navbar-3.png"),
    sub: [
      {
        name: "Tất Cả Sản Phẩm",
        to: "/products",
      },
      {
        name: "Thêm Sản Phẩm",
        to: "/products/create",
      },
      {
        name: "Sản Phẩm Vi Phạm",
        to: "/3",
      },
      {
        name: "Cài Đặt Sản Phẩm",
        to: "/products/update",
      },
    ],
  },
  marketing: {
    name: "Kênh Marketing",
    src: require("@/assets/img/navbar-4.png"),
    sub: [
      {
        name: "Marketing 1",
        to: "/1",
      },
      {
        name: "Marketing 2",
        to: "/2",
      },
      {
        name: "Marketing 3",
        to: "/3",
      },
    ],
  },
  taiChinh: {
    name: "Tài Chinh",
    src: require("@/assets/img/navbar-5.png"),
    sub: [
      {
        name: "Tài Chinh 1",
        to: "/1",
      },
      {
        name: "Tài Chinh 2",
        to: "/2",
      },
      {
        name: "Tài Chinh 3",
        to: "/3",
      },
    ],
  },
  duLieu: {
    name: "Dữ Liệu",
    src: require("@/assets/img/navbar-6.png"),
    sub: [
      {
        name: "Dữ Liệu 1",
        to: "/1",
      },
      {
        name: "Dữ Liệu 2",
        to: "/2",
      },
      {
        name: "Dữ Liệu 3",
        to: "/3",
      },
    ],
  },
  phatTrien: {
    name: "Phát Triển",
    src: require("@/assets/img/navbar-7.png"),
    sub: [
      {
        name: "Phát Triển 1",
        to: "/1",
      },
      {
        name: "Phát Triển 2",
        to: "/2",
      },
      {
        name: "Phát Triển 3",
        to: "/3",
      },
    ],
  },
  chamSocKhach: {
    name: "Chăm Sóc Khách",
    src: require("@/assets/img/navbar-8.png"),
    sub: [
      {
        name: "Chăm Sóc Khách 1",
        to: "/1",
      },
      {
        name: "Chăm Sóc Khách 2",
        to: "/2",
      },
      {
        name: "Chăm Sóc Khách 3",
        to: "/3",
      },
    ],
  },
  quanLyShop: {
    name: "Quản Lý Shop",
    src: require("@/assets/img/navbar-6.png"),
    sub: [
      {
        name: "Cài Đặt Shop",
        to: "/store/setting",
      },
      {
        name: "Cài Đặt Vận Chuyển",
        to: "/2",
      },
    ],
  },
});
</script>

<style>
</style>