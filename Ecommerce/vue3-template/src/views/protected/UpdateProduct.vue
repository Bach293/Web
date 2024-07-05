<template>
  <protected-layout>
    <div class="col p-4 bg-f9f9f9">
      <div class="p-3 fs-5 fw-bolder bg-white">{{ data.title1 }}</div>
      <hr class="border border-success border-3 opacity-75 m-0" />
      <Form
        class="container-fluid bg-white pb-5 form"
        @submit="onSubmit"
        :validation-schema="schema"
        @invalid-submit="onInvalidSubmit"
      >
        <div class="row fs-4 p-3">{{ data.title2 }}</div>
        <div class="row p-3 align-items-center">
          <div class="col-lg-2 col-sm-4 col-12 margin_validate">
            {{ data.danh_muc_label }} <span class="font-color_red">(*)</span>
          </div>
          <div class="col-lg-9 col-sm-8 col-12">
            <FormSelect
              name="danh_muc"
              type="text"
              :value="'option1'"
              :success-message="data.successMessage"
            >
              <option value="option0" disabled>
                {{ data.danh_muc_placeholder }}
              </option>
              <option value="option1">{{ data.option1 }}</option>
              <option value="option2">{{ data.option2 }}</option>
              <option value="option3">{{ data.option3 }}</option>
            </FormSelect>
          </div>
        </div>
        <div class="row p-3 align-items-center">
          <div class="col-lg-2 col-sm-4 col-12 margin_validate">
            {{ data.sku_label }} <span class="font-color_red">(*)</span>
          </div>
          <div class="col-lg-9 col-sm-8 col-12">
            <TextInput
              name="sku"
              type="text"
              :placeholder="data.sku_placeholder"
              :value="data.sku_value"
              :success-message="data.successMessage"
            >
            </TextInput>
          </div>
        </div>
        <div class="row p-3 align-items-center">
          <div class="col-lg-2 col-sm-4 col-12 margin_validate">
            {{ data.name_product_label }}
            <span class="font-color_red">(*)</span>
          </div>
          <div class="col-lg-9 col-sm-8 col-12">
            <TextInput
              name="name_product"
              type="text"
              :placeholder="data.name_product_placeholder"
              :value="data.name_product_value"
              :success-message="data.successMessage"
            >
            </TextInput>
          </div>
        </div>
        <div class="row p-3 align-items-center">
          <div class="col-lg-2 col-sm-4 col-12 margin_validate">
            {{ data.slug_label }} <span class="font-color_red">(*)</span>
          </div>
          <div class="col-lg-9 col-sm-8 col-12">
            <TextInput
              name="slug"
              type="text"
              :placeholder="data.slug_placeholder"
              :value="data.slug_value"
              :success-message="data.successMessage"
            >
            </TextInput>
          </div>
        </div>
        <div class="row p-3 align-items-center">
          <div class="col-lg-2 col-sm-4 col-12 margin_validate">
            {{ data.price_single_label }}
            <span class="font-color_red">(*)</span>
          </div>
          <div
            class="col-lg-3 col-sm-8 col-12 d-inline-flex align-items-center"
          >
            <TextInput
              name="price_single"
              type="text"
              :placeholder="data.price_single_placeholder"
              :value="data.price_single_value"
              :success-message="data.successMessage"
            >
            </TextInput>
          </div>
          <div class="col-lg-2 col-sm-4 col-12 margin_validate text-center">
            {{ data.discount_label }}
          </div>
          <div class="col-lg-4 col-sm-8 col-12 margin_validate">
            <input
              type="text"
              class="form-control"
              id="exampleFormControlInput1"
              :placeholder="data.discount_label"
              :value="data.discount_value"
            />
          </div>
        </div>
        <div class="row px-3 pb-3">
          <div class="col-lg-7 col-sm-12 col-12"></div>
          <div class="col-lg-5 col-sm-12 col-12" style="color: #8a8a8a">
            <div class="form-check form-check-inline">
              <input
                class="form-check-input"
                type="radio"
                name="unit-type"
                id="inlineRadio1"
                value="option1"
                checked
              />
              <label class="form-check-label" for="inlineRadio1">{{
                data.unit_type_percent
              }}</label>
            </div>
            <div class="form-check form-check-inline">
              <input
                class="form-check-input"
                type="radio"
                name="unit-type"
                id="inlineRadio2"
                value="option2"
              />
              <label class="form-check-label" for="inlineRadio1">{{
                data.unit_type_dong
              }}</label>
            </div>
          </div>
        </div>
        <div class="row p-3">
          <div class="col-lg-2 col-sm-4 col-12">
            {{ data.product_status_label }}
          </div>
          <div class="col">
            <div class="form-check form-check-inline">
              <input
                class="form-check-input"
                type="radio"
                name="product-status"
                id="inlineRadio2"
                value="option1"
                checked
              />
              <label class="form-check-label" for="inlineRadio2">{{
                data.product_status_selling
              }}</label>
            </div>
            <div class="form-check form-check-inline">
              <input
                class="form-check-input"
                type="radio"
                name="product-status"
                id="inlineRadio2"
                value="option2"
              />
              <label class="form-check-label" for="inlineRadio2">{{
                data.product_status_stopped
              }}</label>
            </div>
          </div>
        </div>
        <div class="row fs-4 p-3">{{ data.image_label }}</div>
        <div class="row p-3">
          <div class="col">
            <div
              class="d-flex justify-content-center align-items-center border"
              style="height: 300px"
            >
              <label
                for="imageUpload"
                class="btn btn-outline-secondary fs-4 px-5"
              >
                {{ data.image_upload }}
                <input
                  type="file"
                  accept=".jpeg, .jpg, .png"
                  id="imageUpload"
                  name="imageUpload"
                  @change="handleImageUpload"
                  style="display: none"
                />
              </label>
            </div>
          </div>
        </div>
        <div class="row p-3">
          <div class="col-3 mb-3" v-for="(image, index) in images" :key="index">
            <img :src="image.url" class="img-fluid" :alt="image.name" />
          </div>
        </div>
        <div class="row fs-4 p-3">{{ data.info_description_label }}</div>
        <div class="row p-3">
          <div class="col">
            <ckeditor :editor="ClassicEditor" v-model="content"></ckeditor>
          </div>
        </div>
        <div class="row fs-4 p-3">{{ data.info_detail_label }}</div>
        <div class="row p-3 align-items-center">
          <div class="col-lg-2 col-sm-4 col-12">{{ data.brand_label }}</div>
          <div class="col-lg-9 col-sm-8 col-12">
            <input
              type="text"
              class="form-control"
              id="exampleFormControlInput1"
              :placeholder="data.brand_placeholder"
              :value="data.brand_value"
            />
          </div>
        </div>
        <div class="row p-3 align-items-center">
          <div class="col-lg-2 col-sm-4 col-12">{{ data.warranty_label }}</div>
          <div class="col-lg-9 col-sm-8 col-12">
            <input
              type="text"
              class="form-control"
              id="exampleFormControlInput1"
              :placeholder="data.warranty_placeholder"
              :value="data.warranty_value"
            />
          </div>
        </div>
        <div class="row p-3 align-items-center">
          <div class="col-lg-2 col-sm-4 col-12">{{ data.type_label }}</div>
          <div class="col-lg-9 col-sm-8 col-12">
            <input
              type="text"
              class="form-control"
              id="exampleFormControlInput1"
              :placeholder="data.type_placeholder"
              :value="data.type_value"
            />
          </div>
        </div>
        <div class="row p-3 align-items-center">
          <div class="col-lg-2 col-sm-4 col-12">{{ data.delivery_label }}</div>
          <div class="col-lg-9 col-sm-8 col-12">
            <select class="form-select">
              <option selected>{{ data.delivery_placeholder }}</option>
              <option value="1" selected>{{ data.delivery_op1 }}</option>
              <option value="2">{{ data.delivery_op2 }}</option>
              <option value="3">{{ data.delivery_op3 }}</option>
            </select>
          </div>
        </div>
        <div class="row p-3 align-items-center">
          <div class="col-lg-2 col-sm-4 col-12 fs-4">
            {{ data.variation_label }}
          </div>
          <div class="col">
            <div class="form-check form-switch">
              <input
                class="form-check-input"
                type="checkbox"
                role="switch"
                id="flexSwitchCheckDefault"
                checked
              />
            </div>
          </div>
        </div>
        <div class="row p-3 align-items-center">
          <div class="col-lg-2 col-sm-4 col-12 fs-5">
            {{ data.color_label }}
          </div>
          <div class="col">
            <button
              type="button"
              class="btn font-color_green"
              id="btnAddColor"
              @click="addInfoColor()"
            >
              {{ data.add_color_label }}
            </button>
          </div>
        </div>
        <div class="container-fluid" id="parentInfoColor">
          <div
            class="row p-3 align-items-center"
            v-for="(color, index) in dataColor"
            :key="index"
          >
            <div class="col-lg-2 col-sm-0 col-0"></div>
            <div class="col-lg-2 col-sm-5 col-5 text-end py-3">
              {{ data.color_name_label }}<span class="font-color_red">(*)</span>
            </div>
            <div class="col-lg-2 col-sm-6 col-6 py-3">
              <input
                type="text"
                class="form-control"
                id="exampleFormControlInput1"
                :placeholder="data.color_name_placeholder"
                :value="color.name"
                required
              />
            </div>
            <div class="col-lg-2 col-sm-5 col-5 text-end py-3">
              {{ data.price_single_label }}
            </div>
            <div class="col-lg-2 col-sm-6 col-6 py-3">
              <input
                type="text"
                class="form-control"
                id="exampleFormControlInput1"
                :placeholder="data.price_single_placeholder"
                :value="color.price"
              />
            </div>
            <div class="col-1">
              <i
                class="bi bi-trash3 fs-5"
                style="cursor: pointer"
                @click="deleteInfoColor(this)"
              ></i>
            </div>
          </div>
        </div>
        <div class="row p-3 align-items-center mt-5">
          <div class="col-lg-2 col-sm-0 col-0"></div>
          <div class="col-lg-3 col-sm-3 col-12 py-3">
            <router-link to="/products">
              <button type="button" class="btn btn-outline-secondary fs-5 px-5">
                {{ data.submit_btn_cancel }}
              </button>
            </router-link>
          </div>
          <div class="col-lg-3 col-sm-4 col-12 py-3">
            <button
              type="button"
              class="btn btn-secondary fs-5 px-5"
              data-bs-toggle="modal"
              data-bs-target="#exampleModalToggle"
            >
              {{ data.submit_btn_draft }}
            </button>
          </div>
          <div class="col-lg-3 col-sm-5 col-12 py-3">
            <button
              type="button"
              class="btn btn-success fs-5 px-5"
              data-bs-toggle="modal"
              data-bs-target="#exampleModalToggle"
            >
              {{ data.submit_btn_publish }}
            </button>
          </div>
          <div
            class="modal fade"
            id="exampleModalToggle"
            aria-hidden="true"
            aria-labelledby="exampleModalToggleLabel"
            tabindex="-1"
            data-bs-backdrop="static"
            data-bs-keyboard="false"
          >
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content py-5 px-3">
                <div class="modal-body">
                  <div class="container-fluid">
                    <div class="row text-center">
                      <div class="col">
                        {{ data.modal_confirm_text }}
                      </div>
                    </div>
                    <div class="row justify-content-between d-flex mt-5">
                      <div class="col justify-content-center d-flex">
                        <button
                          type="button"
                          class="btn btn-secondary"
                          data-bs-dismiss="modal"
                          style="width: 150px; height: 50px"
                        >
                          {{ data.modal_confirm_no }}
                        </button>
                      </div>
                      <div class="col justify-content-center d-flex">
                        <button
                          type="submit"
                          class="btn btn-danger submit-btn"
                          data-bs-dismiss="modal"
                          style="width: 150px; height: 50px"
                        >
                          {{ data.modal_confirm_yes }}
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </Form>
    </div>
  </protected-layout>
</template>
  
  <script setup>
import ProtectedLayout from "@/layouts/ProtectedLayout.vue";
import { Form } from "vee-validate";
import * as Yup from "yup";
import TextInput from "@/components/global/TextInput.vue";
import FormSelect from "@/components/global/FormSelect.vue";
import { useToast } from "vue-toastification";
import { ref } from "vue";
import { useRouter } from "vue-router";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";

const data = ref({
  title1: "Chỉnh Sửa Sản Phẩm",
  title2: "Thông Tin Cơ Bản",
  successMessage: "Tuyệt",
  danh_muc_label: "Danh mục sản phẩm",
  danh_muc_placeholder: "Chọn danh mục",
  option1: "Laptop",
  option2: "Điều hòa",
  option3: "Honey",
  sku_label: "SKU",
  sku_placeholder: "SKU",
  sku_value: "FLMA20BN",
  name_product_label: "Tên sản phẩm",
  name_product_placeholder: "Tên sản phẩm",
  name_product_value:
    "Máy tính xách tay Apple MacBook Air (2020) M1 Chip, 13.3-inch, 8GB, 256GB SSD",
  slug_label: "Slug",
  slug_placeholder: "SLUG",
  slug_value:
    "may-tinh-xach-tay-apple-macbook-air-(2020)-m1-chip-13.3-inch-8GB-256GB-SSD",
  price_single_label: "Đơn giá",
  price_single_placeholder: "Đơn giá",
  price_single_value: "28.990.000",
  discount_label: "Giảm giá",
  discount_value: "33",
  unit_type_percent: "%",
  unit_type_dong: "đồng",
  product_status_label: "Tình trạng",
  product_status_selling: "Đang bán",
  product_status_stopped: "Dừng bán",
  info_basic_label: "Thông Tin Cơ Bản",
  image_label: "Hình Ảnh",
  image_upload: "Tải ảnh lên",
  info_description_label: "Thông Tin Mô Tả",
  info_detail_label: "Thông Tin Chi Tiết",
  brand_label: "Thương hiệu",
  brand_placeholder: "Thương hiệu",
  brand_value: "Apple",
  warranty_label: "Hạn bảo hành",
  warranty_placeholder: "Hạn bảo hành",
  warranty_value: "24 tháng",
  type_label: "Loại",
  type_placeholder: "Loại",
  type_value: "Loại",
  delivery_label: "Gửi hàng từ",
  delivery_placeholder: "Chọn tỉnh",
  delivery_op1: "Hà Nội",
  delivery_op2: "Đà Nẵng",
  delivery_op3: "Hồ Chí Minh",
  variation_label: "Biến Thể",
  color_label: "Màu sắc",
  add_color_label: "+ thêm thông tin",
  color_name_label: "Tên màu",
  color_name_placeholder: "Tên màu",
  delete_color_icon: "bi bi-trash3 fs-5",
  submit_btn_cancel: "Hủy Bỏ",
  submit_btn_draft: "Lưu Nháp",
  submit_btn_publish: "Lưu & Công Bố",
  modal_confirm_text: "Bạn có chắc chắn muốn lưu thông tin này không?",
  modal_confirm_no: "Không",
  modal_confirm_yes: "Có",
});

const toast = useToast();
const router = useRouter();

const content = ref(
  "Máy tính xách tay mỏng và nhẹ nhất của Apple, nay siêu mạnh mẽ với chip Apple M1. Xử lý công việc giúp bạn với CPU 8 lõi nhanh như chớp. Đưa các ứng dụng và game có đồ họa khủng lên một tầm cao mới với GPU 7 lõi. Đồng thời, tăng tốc các tác vụ máy học với Neural Engine 16 lõi. Tất cả gói gọn trong một thiết kế không quạt, giảm thiểu tiếng ồn, thời lượng pin dài nhất từ trước đến nay lên đến 18 giờ (1) MacBook Air. Vẫn cực kỳ cơ động. Mà mạnh mẽ hơn nhiều.<br><br><br><br><br><br><br>"
);

const onSubmit = () => {
  toast.success("Create Success", {
    timeout: 2000,
  });
  router.push({ name: "products" });
};

const onInvalidSubmit = () => {
  const submitBtn = document.querySelector(".submit-btn");
  submitBtn.classList.add("invalid");
  setTimeout(() => {
    submitBtn.classList.remove("invalid");
  }, 1000);
  toast.error("Error", {
    timeout: 2000,
  });
};

const schema = Yup.object().shape({
  price_single: Yup.string().required("Vui lòng nhập đơn giá"),
  slug: Yup.string().required("Vui lòng nhập SLUG"),
  name_product: Yup.string().required("Vui lòng nhập tên sản phẩm"),
  sku: Yup.string().required("Vui lòng nhập sku"),
  danh_muc: Yup.string()
    .oneOf(["option1", "option2", "option3"], "Vui lòng chọn sản phẩm")
    .required("Vui lòng chọn sản phẩm"),
});

const dataColor = [
  { name: "Gold", price: "28.990.000" },
  { name: "Slive", price: "28.990.000" },
  { name: "Space Gray", price: "28.990.000" },
];

const addInfoColor = () => {
  // Tạo phần tử HTML mới
  const newRow = document.createElement("div");
  newRow.className = "row p-3 align-items-center";

  const col1 = document.createElement("div");
  col1.className = "col-lg-2 col-sm-0 col-0";
  newRow.appendChild(col1);

  const col2 = document.createElement("div");
  col2.className = "col-lg-2 col-sm-5 col-5 text-end py-3";
  col2.innerHTML = 'Tên màu<span class="font-color_red">(*)</span>';
  newRow.appendChild(col2);

  const col3 = document.createElement("div");
  col3.className = "col-lg-2 col-sm-6 col-6 py-3";
  const input1 = document.createElement("input");
  input1.type = "text";
  input1.className = "form-control";
  input1.placeholder = "Tên màu";
  input1.required = true;
  col3.appendChild(input1);
  newRow.appendChild(col3);

  const col4 = document.createElement("div");
  col4.className = "col-lg-2 col-sm-5 col-5 text-end py-3";
  col4.innerHTML = "Đơn giá";
  newRow.appendChild(col4);

  const col5 = document.createElement("div");
  col5.className = "col-lg-2 col-sm-6 col-6 py-3";
  const input2 = document.createElement("input");
  input2.type = "text";
  input2.className = "form-control";
  input2.placeholder = "Tên màu";
  col5.appendChild(input2);
  newRow.appendChild(col5);

  const col6 = document.createElement("div");
  col6.className = "col-1";
  const icon = document.createElement("i");
  icon.className = "bi bi-trash3 fs-5";
  icon.style = "cursor: pointer;";
  icon.addEventListener("click", function () {
    deleteInfoColor(this);
  });
  col6.appendChild(icon);
  newRow.appendChild(col6);

  // Lấy phần tử cha để thêm phần tử mới vào
  const parentElement = document.getElementById("parentInfoColor");
  parentElement.appendChild(newRow);
};

const deleteInfoColor = (icon) => {
  try {
    // Lấy phần tử cha (row) của biểu tượng xóa
    const row = icon.parentNode.parentNode;

    // Lấy phần tử cha của row và gọi phương thức removeChild để xóa row
    const parentElement = row.parentNode;
    parentElement.removeChild(row);
  } catch (error) {
    toast.error("Error: Delete firts color", {
      timeout: 2000,
    });
  }
};

const images = ref([
  { url: require("@/assets/img/product_3.png"), name: "Image 1" },
  { url: require("@/assets/img/product_4.png"), name: "Image 2" },
  { url: require("@/assets/img/product_5.png"), name: "Image 3" },
]);

function handleImageUpload(event) {
  const files = event.target.files;

  for (let i = 0; i < files.length; i++) {
    const file = files[i];
    const fileName = `${file.name.split(".")[0]}-${generateRandomString(8)}.${
      file.name.split(".")[i]
    }`;
    images.value.push({
      url: URL.createObjectURL(file),
      name: fileName,
    });
  }
}

function generateRandomString(length) {
  let result = "";
  const characters =
    "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
  for (let i = 0; i < length; i++) {
    result += characters.charAt(Math.floor(Math.random() * characters.length));
  }
  return result;
}
</script>
  
  <style scoped>
.margin_validate {
  margin-bottom: 32px;
}
.img-fluid {
  width: 200px;
  height: 200px;
  border: 1px solid #dee2e6;
  padding: 30px;
}
</style>