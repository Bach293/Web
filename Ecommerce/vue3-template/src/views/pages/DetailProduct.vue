  <template>
  <page-layout>
    <div class="container-fluid text-center">
      <div class="row bg-e0e0e0">
        <div class="col-12 px-7 pt-3 text-start d-flex align-items-center">
          <p>
            <span class="font-color_green">{{ data.shop }}</span> /
            <span class="font-color_green">{{ data.category1 }}</span> /
            <span class="font-color_green">{{ data.category2 }}</span> /
            <span> {{ data.name }}</span>
          </p>
        </div>
        <div class="col-12 px-7">
          <product-information-1></product-information-1>
        </div>
        <div class="col-12 px-7 mt-4">
          <store-information></store-information>
        </div>
        <div class="col-12 px-7 mt-4">
          <product-information-2></product-information-2>
        </div>
        <div class="col-12 px-7 mt-4">
          <rating-information></rating-information>
        </div>
        <div class="col-12 px-7 mt-4">
          <div class="container-fluid text-start bg-white">
            <div class="row pt-3 fs-4 px-4">{{ data.title1 }}</div>
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
                      <Product :product="selectedProduct" />
                    </div>
                  </Slide>

                  <template #addons>
                    <Navigation class="custom-navigation"/>
                  </template>
                </Carousel>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row pt-4 bg-e0e0e0">
        <div class="col-12 text-start px-7 pb-4 bg-white">
          <div class="fw-bolder fs-5 my-4">{{ data.title2 }}</div>
          <div class="fs-5">
            {{ data.reseach }}
          </div>
        </div>
      </div>
    </div>
  </page-layout>
</template>

<script setup>
import { ref } from "vue";
import PageLayout from "@/layouts/PageLayout.vue";
import Product from "@/components/global/ProductItem.vue";
import ProductInformation1 from "@/views/pages/components/ProductInformation1.vue";
import StoreInformation from "@/views/pages/components/StoreInformation.vue";
import ProductInformation2 from "@/views/pages/components/ProductInformation2.vue";
import RatingInformation from "@/views/pages/components/RatingInformation.vue";
import "vue3-carousel/dist/carousel.css";
import { Carousel, Slide, Navigation } from "vue3-carousel";

const data = ref({
  shop: "Shop",
  category1: "Máy tính & Laptop",
  category2: "Laptop",
  name: "Máy tính xách tay Apple MacBook Air (2020) M1 Chip, 13.3-inch, 8GB, 256GB SSD",
  title1: "CÁC SẢN PHẨM KHÁC CỦA SHOOP",
  title2: "Có Thể Bạn Đang Tìm Kiếm",
  reseach:
    "bàn phím cơ ajazz ac067 | màn hình máy tính dell ultrasharp u2422h | ổ cứng hdd 500gb | bàn phím tiếng trung | ổ cứng samsung pm9a1 | micro cài áo không dây | thanh lăn mắt | máy tính bảng realme | bảng vẽ điện tử wacom cintiq 16 | máy đo thân nhiệt | razer | laptop gaming | lenovo legion 5 | chuột | usb",
});

const selectedProduct = ref({
  src: require("@/assets/img/avatar_product.png"),
  name: "Áo Sw  eater The Bad God Signature Monogram",
  oldPrice: "₫500.000",
  discountPrice: "₫339.000",
  slug: "ao-sweater-the-bad-god-signature-monogram",
});

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
</script>

<style>
.category_carusel {
  padding: 0;
}
</style>