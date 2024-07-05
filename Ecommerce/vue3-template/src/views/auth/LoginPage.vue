<template>
  <auth-layout>
    <div class="container-fluid text-center">
      <div class="row py-5 justify-content-center bg-fdfaf7">
        <div class="row">
          <div class="col-sm-12 col-md-6 text-start px-10">
            <div class="py-2 fw-bolder fs-3 mt-5">
              <p class="font-color_green">{{ data.title }}</p>
            </div>
            <div class="py-2 fs-5">
              <p>
                {{ data.description1 }} <br />
                {{ data.description2 }}
              </p>
            </div>
            <div class="py-2">
              <img :src="data.imageSrc" alt="" class="d-block w-100" />
            </div>
          </div>
          <div class="col-sm-12 col-md-6 px-7">
            <Form
              class="p-4 border rounded bg-white form"
              @submit="onSubmit"
              :validation-schema="schema"
              @invalid-submit="onInvalidSubmit"
            >
              <div class="text-start fs-4 fw-medium mb-5">
                {{ data.loginTitle }}
              </div>
              <div class="mt-4">
                <TextInput
                  name="email"
                  type="text"
                  :placeholder="data.emailPlaceholder"
                  :success-message="data.successMessage"
                >
                </TextInput>
              </div>
              <div class="mb-4">
                <div class="input-container">
                  <TextInput
                    name="password"
                    :type="showPassword ? 'text' : 'password'"
                    :placeholder="data.passwordPlaceholder"
                    :success-message="data.successMessage"
                  >
                    <i
                      :class="[
                        'bi fs-4 toggle-password mx-3',
                        showPassword ? 'bi-eye' : 'bi-eye-slash',
                      ]"
                      @click="togglePassword"
                    ></i>
                  </TextInput>
                </div>
              </div>
              <div class="text-end mb-5">
                <router-link class="a-green" :to="data.forgotPasswordLink">{{
                  data.forgotPasswordText
                }}</router-link>
              </div>
              <div class="mb-5 d-grid gap-2">
                <button
                  type="submit"
                  class="btn bg-green font-color_white submit-btn"
                >
                  {{ data.loginButton }}
                </button>
              </div>
              <div class="mb-5 pt-4">
                <span>
                  {{ data.newToShoop }}
                  <router-link class="a-green" :to="data.registerLink">{{
                    data.registerText
                  }}</router-link>
                </span>
              </div>
            </Form>
          </div>
        </div>
      </div>
    </div>
  </auth-layout>
</template>

<script setup>
import AuthLayout from "@/layouts/AuthLayout.vue";
import { ref } from "vue";
import { Form } from "vee-validate";
import * as Yup from "yup";
import TextInput from "@/components/global/TextInput.vue";
import { useToast } from "vue-toastification";
import { useRouter } from "vue-router";
import { useAuthStore } from "@/router/authStore";

const data = ref({
  title: "Bán hàng chuyên nghiệp",
  description1: "Quản lý shop của bạn hiệu quả",
  description2: "hơn trên Shoop với Shoop - Kênh Người bán",
  imageSrc: require("@/assets/img/picture1.png"),
  loginTitle: "Đăng nhập",
  emailPlaceholder: "Email",
  passwordPlaceholder: "Mật khẩu",
  successMessage: "Tuyệt",
  forgotPasswordText: "Quên mật khẩu",
  forgotPasswordLink: "/forgot-password",
  loginButton: "ĐĂNG NHẬP",
  newToShoop: "Bạn mới biết đến Shoop?",
  registerText: "Đăng ký",
  registerLink: "/register",
});

const showPassword = ref(false);

const toast = useToast();
const router = useRouter();
const authStore = useAuthStore();

function togglePassword() {
  showPassword.value = !showPassword.value;
}

const onSubmit = async (values) => {
  try {
    const isLoginSuccessful = await authStore.login({
      email: values.email,
      password: values.password,
    });

    if (isLoginSuccessful) {
      toast.success("Login Success", {
        timeout: 2000,
      });
      router.push({ name: "dashboard" });
    } else {
      throw new Error("Invalid response from server");
    }
  } catch (error) {
    console.error("Error during login:", error);
    toast.error("Login failed: " + error, {
      timeout: 2000,
    });
  }
};

const onInvalidSubmit = () => {
  const submitBtn = document.querySelector(".submit-btn");
  submitBtn.classList.add("invalid");
  setTimeout(() => {
    submitBtn.classList.remove("invalid");
  }, 1000);
  toast.error("Vui lòng kiểm tra lại thông tin", {
    timeout: 2000,
  });
};

const schema = Yup.object().shape({
  email: Yup.string()
    .email("Email không hợp lệ")
    .required("Vui lòng nhập email")
    .max(50, "Email không được vượt quá 50 ký tự"),
  password: Yup.string().required("Vui lòng nhập mật khẩu"),
});
</script>

<style>
/* Add any custom styles here */
</style>
