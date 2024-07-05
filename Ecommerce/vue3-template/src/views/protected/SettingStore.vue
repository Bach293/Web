<template>
  <protected-layout>
    <div class="col bg-f9f9f9">
      <div class="container-fluid p-5">
        <div class="row">
          <div class="col p-3 bg-white">
            <div class="container-fluid">
              <div class="row">
                <span class="fs-5 fw-bolder">{{ data.setupTitle }}</span>
              </div>
              <div class="row mt-5">
                <div class="col-lg-8 col-sm-12 col-12 text-end">
                  <Form
                    class="container-fluid form"
                    @submit="onSubmit"
                    :validation-schema="schema"
                    @invalid-submit="onInvalidSubmit"
                  >
                    <div
                      class="row mb-4 d-inline-flex w-100 align-items-center"
                    >
                      <div class="col-lg-3 col-sm-2 col-12 text-center">
                        {{ data.emailLabel }}
                      </div>
                      <div class="col-lg-9 col-sm-10 col-12">
                        <input
                          type="email"
                          class="form-control"
                          id="exampleFormControlInput1"
                          :value="data.emailValue"
                          disabled
                        />
                      </div>
                    </div>
                    <div class="row d-inline-flex w-100 align-items-center">
                      <div
                        class="col-lg-3 col-sm-2 col-12 text-center label_input"
                      >
                        {{ data.nameLabel }}
                      </div>
                      <div class="col-lg-9 col-sm-10 col-12">
                        <TextInput
                          name="name"
                          type="text"
                          :placeholder="data.namePlaceholder"
                          :success-message="data.successMessage"
                        >
                        </TextInput>
                      </div>
                    </div>
                    <div class="row d-inline-flex w-100 align-items-center">
                      <div
                        class="col-lg-3 col-sm-2 col-12 text-center label_input"
                      >
                        {{ data.phoneNumberLabel }}
                      </div>
                      <div class="col-lg-9 col-sm-10 col-12">
                        <TextInput
                          name="phone_number"
                          type="text"
                          :placeholder="data.phoneNumberPlaceholder"
                          :success-message="data.successMessage"
                        >
                        </TextInput>
                      </div>
                    </div>
                    <div class="row d-inline-flex w-100 align-items-center">
                      <div
                        class="col-lg-3 col-sm-4 col-12 text-center label_input"
                      >
                        {{ data.genderLabel }}
                      </div>
                      <div
                        class="col-lg-9 col-sm-10 col-12 d-flex"
                        style="color: #828282"
                      >
                        <RadioGroup
                          name="inlineRadioOptions"
                          v-model="selectedGender"
                          :success-message="data.successMessage"
                          :options="[
                            { value: 'option1', label: data.genderOp1 },
                            { value: 'option2', label: data.genderOp2 },
                            { value: 'option3', label: data.genderOp3 },
                          ]"
                        />
                      </div>
                    </div>
                    <div class="row d-inline-flex w-100 align-items-center">
                      <div
                        class="col-lg-3 col-sm-2 col-12 text-center label_input"
                      >
                        {{data.storeNameLabel}}
                      </div>
                      <div class="col-lg-9 col-sm-10 col-12">
                        <TextInput
                          name="store_name"
                          type="text"
                          :placeholder="data.storeNamePlaceholder"
                          :success-message="data.successMessage"
                        >
                        </TextInput>
                      </div>
                    </div>
                    <div class="row d-inline-flex w-100 align-items-center">
                      <div class="col-lg-3 col-sm-7 col-7 label_input">
                        {{ data.storeAddressLabel }}
                      </div>
                      <div class="col-lg-4 col-sm-12 col-12 d-inline-flex">
                        <FormSelect
                          name="city"
                          type="text"
                          :value="'option0'"
                          :success-message="data.successMessage"
                        >
                          <option value="option0" disabled>{{ data.cityLabel }}</option>
                          <option value="option1">{{ data.cityOp1 }}</option>
                          <option value="option2">{{ data.cityOp1 }}</option>
                          <option value="option3">{{ data.cityOp1 }}</option>
                        </FormSelect>
                      </div>
                      <div class="col-lg-5 col-sm-12 col-12 d-inline-flex">
                        <FormSelect
                          name="district"
                          type="text"
                          :value="'option0'"
                          :success-message="data.successMessage"
                        >
                          <option value="option0" disabled>{{ data.districtLabel }}</option>
                          <option value="option1">{{ data.districtOp1 }}</option>
                          <option value="option2">{{ data.districtOp2 }}</option>
                          <option value="option3">{{ data.districtOp3 }}</option>
                        </FormSelect>
                      </div>
                    </div>
                    <div class="row d-inline-flex w-100 align-items-center">
                      <div class="col-lg-3 col-sm-2 col-12 text-center"></div>
                      <div class="col-lg-9 col-sm-10 col-12">
                        <TextInput
                          name="store_address"
                          type="text"
                          :placeholder="data.storeAddressPlaceholder"
                          :success-message="data.successMessage"
                        >
                        </TextInput>
                      </div>
                    </div>
                    <div class="row mb-5 mt-3 d-inline-flex w-100">
                      <div class="col-lg-3 col-sm-2 col-12 text-center"></div>
                      <div class="col">
                        <button
                          type="submit"
                          class="btn btn-success d-flex align-items-center px-5 submit-btn"
                        >
                          {{ data.saveButtonLabel }}
                        </button>
                      </div>
                    </div>
                  </Form>
                </div>
                <div class="col-lg-4 col-sm-12 col-12 text-center">
                  <div class="d-flex justify-content-center align-items-center">
                    <img
                      :src="
                        imagePreview || require('@/assets/img/avatar_shop.png')
                      "
                      alt=""
                      id="img-product_1"
                      class="w-auto p-5"
                    />
                  </div>
                  <label for="imageUpload" class="btn btn-outline-secondary">
                    {{ data.imgSelect }}
                    <input
                      type="file"
                      accept=".jpeg, .jpg, .png"
                      id="imageUpload"
                      name="imageUpload"
                      @change="handleFileUpload"
                      style="display: none"
                    />
                  </label>
                  <div class="fw-light mt-3">
                    <span>{{ data.maxFileSizeText }}</span><br />
                    <span>{{ data.fileFormatsText }}</span>
                  </div>
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
import { Form } from "vee-validate";
import * as Yup from "yup";
import TextInput from "@/components/global/TextInput.vue";
import FormSelect from "@/components/global/FormSelect.vue";
import RadioGroup from "@/components/global/RadioGroup.vue";
import { useToast } from "vue-toastification";
import { ref } from "vue";

const data = ref({
  setupTitle: "Cài đặt thông tin Shop",
  successMessage: "Tuyệt",
  emailLabel: "Email",
  emailValue: "sakura@gmail.com",
  nameLabel: "Tên",
  namePlaceholder: "Tên",
  phoneNumberLabel: "Số điện thoại",
  phoneNumberPlaceholder: "Số điện thoại",
  genderLabel: "Giới tính",
  genderOp1: "Nam",
  genderOp2: "Nữ",
  genderOp3: "Khác",
  storeNameLabel: "Tên shop",
  storeNamePlaceholder: "Tên cửa hàng",
  storeAddressLabel: "Địa chỉ lấy hàng",
  storeAddressPlaceholder: "Địa chỉ",
  cityLabel: "Thành phố",
  cityOp1: "Hà Nội",
  cityOp2: "Đà Nẵng",
  cityOp3: "Hồ Chí Minh",
  districtLabel: "Quận/Huyện",
  districtOp1: "Quận Bắc Từ Liêm",
  districtOp2: "Quận 1",
  districtOp3: "Quận Đống Đa",
  saveButtonLabel: "Lưu thông tin",
  imgSelect: "Chọn ảnh",
  maxFileSizeText: "Dung lượng file tối đa 1 MB",
  fileFormatsText: "Định dạng: JPEG, JPG, PNG",
});

const toast = useToast();

const onSubmit = () => {
  toast.success("Send Success", {
    timeout: 2000,
  });
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
  name: Yup.string()
    .required("Vui lòng nhập tên")
    .max(20, "Tên không được vượt quá 20 ký tự"),
  phone_number: Yup.string()
    .required("Vui lòng nhập số điện thoại")
    .matches(/^[0-9]+$/, "Số điện thoại chỉ được chứa số")
    .max(20, "Số điện thoại không được vượt quá 20 ký tự"),
  store_name: Yup.string()
    .required("Vui lòng nhập tên cửa hàng")
    .max(20, "Tên cửa hàng không được vượt quá 20 ký tự"),
  store_address: Yup.string()
    .required("Vui lòng nhập địa chỉ")
    .max(100, "Địa chỉ cửa hàng không được vượt quá 100 ký tự"),
  email: Yup.string()
    .email("Email không hợp lệ")
    .required("Vui lòng nhập email")
    .max(20, "Email không được vượt quá 20 ký tự"),
  city: Yup.string()
    .oneOf(["option1", "option2", "option3"], "Vui lòng chọn thành phố")
    .required("Vui lòng chọn thành phố"),
  district: Yup.string()
    .oneOf(["option1", "option2", "option3"], "Vui lòng chọn quận huyện")
    .required("Vui lòng chọn quận huyện"),
  inlineRadioOptions: Yup.string()
    .oneOf(["option1", "option2", "option3"], "Vui lòng chọn giới tính")
    .required("Vui lòng chọn giới tính"),
});

const imagePreview = ref(null);

const handleFileUpload = (event) => {
  const file = event.target.files[0];
  if (file) {
    imagePreview.value = URL.createObjectURL(file);
    // Bạn có thể upload file lên server tại đây
    // ví dụ:
    // uploadFile(file);
  }
};
</script>

<style scoped>
.label_input {
  margin-bottom: 32px;
}
</style>