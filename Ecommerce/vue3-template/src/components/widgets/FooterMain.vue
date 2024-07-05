<template>
  <footer>
    <div class="container-fluid text-center">
      <div class="row align-items-center px-7" style="background-color: #fdfaf7">
        <div class="container-fluid mt-5">
          <div class="row">
            <div class="col-lg-3 col-sm-6 col-12 py-3 text-start">
              <p class="fw-bolder">{{ customerCare.title }}</p>
              <p class="fw-light a-light">
                <a v-for="(link, index) in customerCare.links" :key="index" :href="link.href">{{ link.text }}</a><br />
              </p>
            </div>
            <div class="col-lg-3 col-sm-6 col-12 py-3 text-start">
              <p class="fw-bolder">{{ aboutShoop.title }}</p>
              <p class="fw-light a-light">
                <a v-for="(link, index) in aboutShoop.links" :key="index" :href="link.href">{{ link.text }}</a><br />
              </p>
            </div>
            <div class="col-lg-3 col-sm-6 col-12 py-3 text-start div-pay">
              <p class="fw-bolder">{{ payment.title }}</p>
              <img v-for="(src, index) in payment.images" :key="index" :src="src" alt="" />
            </div>
            <div class="col-lg-3 col-sm-6 col-12 py-3 text-start">
              <p class="fw-bolder">{{ followUs.title }}</p>
              <p class="fw-light a-light">
                <a v-for="(link, index) in followUs.links" :key="index" :href="link.href">{{ link.text }}</a><br />
              </p>
            </div>
          </div>
          <hr />
          <div class="row py-4">
            <div class="col-4 text-start fw-light">
              {{ footerInfo.copyRight }}
            </div>
            <div class="col-8 text-end fw-light">
              {{ footerInfo.regions }}
            </div>
          </div>
          <hr />
          <div class="row py-4 fw-light">
            <div class="col">
              {{ footerInfo.address }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
</template>

<script setup>
import { ref } from 'vue';

const customerCare = ref({
  title: 'CHĂM SÓC KHÁCH HÀNG',
  links: [
    { text: 'Trung Tâm Trợ Giúp', href: '#' },
    { text: 'Shoop Blog', href: '#' },
    { text: 'Hướng Dẫn Mua Hàng', href: '#' },
    { text: 'Hướng Dẫn Bán Hàng', href: '#' },
    { text: 'Thanh Toán', href: '#' },
    { text: 'Trả Hàng & Hoàn Tiền', href: '#' },
    { text: 'Chăm Sóc Khách Hàng', href: '#' },
    { text: 'Chính Sách Bảo Hành', href: '#' }
  ]
});

const aboutShoop = ref({
  title: 'VỀ SHOOP',
  links: [
    { text: 'Giới Thiệu Về Shoop Việt Nam', href: '#' },
    { text: 'Tuyển Dụng', href: '#' },
    { text: 'Điều Khoản Shoop', href: '#' },
    { text: 'Chính Sách Bảo Mật', href: '#' },
    { text: 'Kênh Người Bán', href: '#' },
    { text: 'Liên Hệ Với Truyền Thông', href: '#' }
  ]
});

const payment = ref({
  title: 'THANH TOÁN',
  images: [
    require('@/assets/img/pay_1.png'),
    require('@/assets/img/pay_2.png'),
    require('@/assets/img/pay_3.png'),
    require('@/assets/img/pay_4.png'),
    require('@/assets/img/pay_5.png'),
    require('@/assets/img/pay_6.png'),
    require('@/assets/img/pay_8.png')
  ]
});

const followUs = ref({
  title: 'THEO DÕI CHÚNG TÔI TRÊN',
  links: [
    { text: 'Facebook', href: '#' },
    { text: 'Instagram', href: '#' },
    { text: 'LinkedIn', href: '#' }
  ]
});

const footerInfo = ref({
  copyRight: 'Ⓒ 2024 Shoop. Tất cả các quyền được bảo lưu',
  regions: 'Quốc gia & Khu vực: Sigapore | Indonesia | Thái Lan | Malaysia | Việt Nam | Philippines',
  address: 'Địa chỉ: Tòa nhà Capital Place, số 29 đường Liễu Giai, Phường Ngọc Khánh, Quận Ba Đình, Thành phố Hà Nội, Việt Nam. Tổng đài hỗ trợ: 19001221 - Email: cskh@hotro.shoop.vn Ⓒ 2015 - Bản quyền thuộc về Công ty TNHH Shoop'
});
</script>

<style>

</style>
