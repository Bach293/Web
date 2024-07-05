<template>
  <auth-layout>
    <div class="container-fluid text-center">
      <div class="row py-5 justify-content-center bg-fdfaf7">
        <div class="col-12 px-7">
          <Form
            class="p-4 border rounded bg-white form"
            @submit="onSubmit"
            :validation-schema="schema"
            @invalid-submit="onInvalidSubmit"
          >
            <div class="fs-4 fw-medium mb-5">
              <div class="text-start" style="position: absolute">
                <router-link :to="data.links.login" class="a-black">
                  <i class="bi bi-arrow-left"></i>
                </router-link>
              </div>
              {{ data.texts.resetPasswordTitle }}
            </div>
            <div class="mb-4">
              <TextInput
                name="email"
                type="text"
                :placeholder="data.texts.emailPlaceholder"
                :success-message="data.texts.successMessage"
              >
              </TextInput>
            </div>
            <div class="mb-5 d-flex align-items-center gap-2">
              <button
                type="submit"
                class="btn bg-green font-color_white submit-btn"
              >
                {{ data.texts.nextButton }}
              </button>
            </div>
          </Form>
        </div>
      </div>
    </div>
  </auth-layout>
</template>

<script setup>
import AuthLayout from "@/layouts/AuthLayout.vue";
import { Form } from "vee-validate";
import * as Yup from "yup";
import TextInput from "@/components/global/TextInput.vue";
import { useToast } from "vue-toastification";
import { useRouter } from "vue-router";
import { ref } from 'vue';
import auth from '@/services/auth'; // Thêm dòng này

const data = ref({
  links: {
    login: '/login',
  },
  texts: {
    resetPasswordTitle: 'Đặt lại mật khẩu',
    emailPlaceholder: 'Email',
    successMessage: 'Tuyệt',
    nextButton: 'TIẾP THEO'
  },
});

const toast = useToast();
const router = useRouter();

const onSubmit = async (values) => {
  try {
    await auth.forgotPassword(values.email); 
    toast.success("Reset link sent successfully", {
      timeout: 2000,
    });
    router.push({ name: "login" });
  } catch (error) {
    toast.error("Failed to send reset link: " + error.response.data.message, {
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
});
</script>

<style scoped>
.btn {
  padding: 13px;
  width: 100%;
}
form {
  width: 500px;
  position: absolute;
  left: 50%;
  transform: translateX(-50%);
}
.bg-fdfaf7 {
  height: 585px;
}
</style>
