<template>
  <auth-layout>
    <div class="container-fluid text-center">
      <div class="row py-5 justify-content-center bg-fdfaf7">
        <div class="col-12 px-7">
          <Form
            v-if="tokenValid"
            class="p-4 border rounded bg-white form"
            @submit="onSubmit"
            :validation-schema="schema"
            @invalid-submit="onInvalidSubmit"
          >
            <div class="fs-4 fw-medium mb-5">
              <div class="text-start" style="position: absolute">
                <router-link to="/forgot-password" class="a-black">
                  <i class="bi bi-arrow-left"></i>
                </router-link>
              </div>
              {{ data.texts.resetPasswordTitle }}
            </div>
            <div class="mb-4">
              <div class="input-container">
                <TextInput
                  name="password"
                  :type="showPassword ? 'text' : 'password'"
                  :placeholder="data.texts.passwordPlaceholder"
                  :success-message="data.texts.successMessage"
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
            <div class="mb-4">
              <div class="input-container">
                <TextInput
                  name="confirm_password"
                  :type="showConfirmPassword ? 'text' : 'password'"
                  :placeholder="data.texts.confirmPasswordPlaceholder"
                  :success-message="data.texts.successMessage"
                >
                  <i
                    :class="[
                      'bi fs-4 toggle-password mx-3',
                      showConfirmPassword ? 'bi-eye' : 'bi-eye-slash',
                    ]"
                    @click="toggleConfirmPassword"
                  ></i>
                </TextInput>
              </div>
            </div>
            <div class="mb-5 d-grid gap-2" style="height: 50px">
              <button
                type="submit"
                class="btn bg-green font-color_white submit-btn"
              >
                TIẾP THEO
              </button>
            </div>
          </Form>
          <div v-else class="p-4 border rounded bg-white form">
            <div class="fs-4 fw-medium mb-5">
              {{ data.texts.invalidTokenMessage }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </auth-layout>
</template>

<script setup>
import AuthLayout from "@/layouts/AuthLayout.vue";
import { ref, onMounted } from "vue";
import { Form } from "vee-validate";
import * as Yup from "yup";
import TextInput from "@/components/global/TextInput.vue";
import { useToast } from "vue-toastification";
import { useRouter, useRoute } from "vue-router";
import auth from '@/services/auth'; 

const data = ref({
  texts: {
    resetPasswordTitle: 'Đặt lại mật khẩu',
    passwordPlaceholder: 'Mật khẩu',
    confirmPasswordPlaceholder: 'Nhập lại mật khẩu',
    successMessage: 'Tuyệt',
    nextButton: 'TIẾP THEO',
    invalidTokenMessage: 'Liên kết đặt lại mật khẩu không hợp lệ hoặc đã hết hạn.'
  },
});

const showPassword = ref(false);
const showConfirmPassword = ref(false);
const tokenValid = ref(false);

function togglePassword() {
  showPassword.value = !showPassword.value;
}
function toggleConfirmPassword() {
  showConfirmPassword.value = !showConfirmPassword.value;
}

const toast = useToast();
const router = useRouter();
const route = useRoute();

onMounted(async () => {
  const token = route.query.token;
  if (token) {
    try {
      await auth.checkResetToken(token);
      tokenValid.value = true;
    } catch (error) {
      tokenValid.value = false;
      toast.error("Invalid or expired token", {
        timeout: 2000,
      });
    }
  } else {
    tokenValid.value = false;
    toast.error("No token provided", {
      timeout: 2000,
    });
  }
});

const onSubmit = async (values) => {
  try {
    const token = route.query.token; 
    await auth.resetPassword({ token, password: values.password, password_confirmation: values.confirm_password }); 
    toast.success("Password reset successfully", {
      timeout: 2000,
    });
    router.push({ name: "login" });
  } catch (error) {
    toast.error("Failed to reset password: " + error.response.data.message, {
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
  password: Yup.string()
    .required("Vui lòng nhập mật khẩu")
    .min(8, "Mật khẩu phải có ít nhất 8 ký tự")
    .matches(/[a-z]/, "Mật khẩu phải chứa ít nhất một chữ cái thường")
    .matches(/[A-Z]/, "Mật khẩu phải chứa ít nhất một chữ cái hoa")
    .matches(/\d/, "Mật khẩu phải chứa ít nhất một số")
    .matches(/[!@#$%^&*(),.?":{}|<>]/, "Mật khẩu phải chứa ít nhất một ký tự đặc biệt"),
  confirm_password: Yup.string()
    .required("Vui lòng nhập lại mật khẩu")
    .oneOf([Yup.ref("password"), null], "Mật khẩu không khớp"),
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
