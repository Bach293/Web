<template>
  <auth-layout>
    <!-- Start Main -->
    <main>
      <div class="container-fluid text-center">
        <div class="row bg-fdfaf7 justify-content-center pb-5">
          <div class="col-sm-12 col-lg-6 text-start px-10 py-3 mt-5">
            <div class="fs-3">
              <p class="font-color_green">{{ data.mainTitle }}</p>
            </div>
            <div class="fw-bolder fs-3">
              <p class="font-color_green">
                {{ data.subtitle }}
              </p>
            </div>
            <div class="row fs-6 align-items-center">
              <div class="col-1">
                <i class="bi bi-shop fs-1 font-color_green"></i>
              </div>
              <div class="col-lg-9 col-sm-11 col-11 px-4">
                <span class="font-color_green">{{ data.feature1 }}</span>
              </div>
            </div>
            <div class="row fs-6 align-items-center">
              <div class="col-1">
                <i class="bi bi-gift fs-1 font-color_green"></i>
              </div>
              <div class="col-lg-9 col-sm-11 col-11 px-4">
                <span class="font-color_green">{{ data.feature2 }}</span>
              </div>
            </div>
            <div class="row fs-6 align-items-center">
              <div class="col-1">
                <i class="bi bi-hand-thumbs-up fs-1 font-color_green"></i>
              </div>
              <div class="col-lg-9 col-sm-11 col-11 px-4">
                <span class="font-color_green">{{ data.feature3 }}</span>
              </div>
            </div>
          </div>
          <div class="col-sm-12 col-lg-6 px-7 py-3 mt-5">
            <Form
              class="p-4 border rounded bg-white form"
              @submit="onSubmit"
              :validation-schema="schema"
              @invalid-submit="onInvalidSubmit"
            >
              <div class="text-start fs-4 fw-medium mb-3">
                {{ data.formTitle }}
              </div>
              <div class="mt-4">
                <TextInput
                  name="store_name"
                  type="text"
                  :placeholder="data.storeNamePlaceholder"
                  :success-message="data.successMessage"
                >
                </TextInput>
              </div>

              <div class="row">
                <div class="col">
                  <FormSelect
                    name="city"
                    type="text"
                    :value="'option0'"
                    :success-message="data.successMessage"
                    @change="updateSelectedCity"
                    >
                    <option value="option0" disabled>
                      {{ data.cityPlaceholder }}
                    </option>
                    <option
                      v-for="city in cities.data"
                      :key="city.id"
                      :value="city.id"
                    >
                      {{ city.city_name }}
                    </option>
                  </FormSelect>
                </div>
                <div class="col">
                  <FormSelect
                    name="district"
                    type="text"
                    :value="'option0'"
                    :success-message="data.successMessage"
                    @change="updateSelectedDistrict"
                  >
                    <option value="option0" disabled>
                      {{ data.districtPlaceholder }}
                    </option>
                    <option value="option1">a</option>
                    <option
                      v-for="district in districts.data"
                      :key="district.id"
                      :value="district.id"
                    >
                      {{ district.district_name }}
                    </option>
                  </FormSelect>
                </div>
              </div>
              <div class="mb-4">
                <TextInput
                  name="store_address"
                  type="text"
                  :placeholder="data.storeAddressPlaceholder"
                  :success-message="data.successMessage"
                >
                </TextInput>
              </div>
              <div class="mb-4">
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
              <div class="mb-4">
                <div class="input-container">
                  <TextInput
                    name="confirm_password"
                    :type="showConfirmPassword ? 'text' : 'password'"
                    :placeholder="data.confirmPasswordPlaceholder"
                    :success-message="data.successMessage"
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
              <div class="mb-4">
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    value=""
                    id="flexCheckDefault"
                    required
                  />
                  <label class="form-check-label" for="flexCheckDefault">
                    {{ data.agreementText }}
                    <a class="a-green" href="#">{{ data.termsOfService }}</a> &
                    <a class="a-green" href="#">{{ data.privacyPolicy }}</a>
                  </label>
                </div>
              </div>
              <div class="mb-4 d-grid gap-2">
                <button
                  type="submit"
                  class="btn bg-green font-color_white submit-btn"
                >
                  {{ data.registerButton }}
                </button>
              </div>
              <div>
                <span>
                  {{ data.alreadyHaveAccount }}
                  <router-link class="a-green" to="/login">{{
                    data.loginText
                  }}</router-link>
                </span>
              </div>
            </Form>
          </div>
        </div>
        <div class="container-fluid mt-4 bg-white">
          <div class="row text-center pt-4 fs-3">
            <div class="col">
              {{ data.whySellTitle }}
            </div>
          </div>
          <div
            class="row pt-4 fs-5 d-flex justify-content-between align-items-center"
          >
            <div class="col-lg-4 col-sm-6 col-6 px-5">
              <img :src="data.signup1Img" alt="" />
              <p class="fw-bolder">{{ data.signup1Title }}</p>
              <p>{{ data.signup1Description }}</p>
            </div>
            <div class="col-lg-4 col-sm-6 col-6 px-5">
              <img :src="data.signup2Img" alt="" height="80px" />
              <p class="fw-bolder">{{ data.signup2Title }}</p>
              <p>{{ data.signup2Description }}</p>
            </div>
            <div class="col-lg-4 col-sm-6 col-6 px-5">
              <img :src="data.signup3Img" alt="" height="80px" />
              <p class="fw-bolder">{{ data.signup3Title }}</p>
              <p>{{ data.signup3Description }}</p>
            </div>
            <div class="col-lg-4 col-sm-6 col-6 px-5">
              <img :src="data.signup4Img" alt="" />
              <p class="fw-bolder">{{ data.signup4Title }}</p>
              <p>{{ data.signup4Description }}</p>
            </div>
            <div class="col-lg-4 col-sm-6 col-6 px-5">
              <img :src="data.signup5Img" alt="" />
              <p class="fw-bolder">{{ data.signup5Title }}</p>
              <p>{{ data.signup5Description }}</p>
            </div>
            <div class="col-lg-4 col-sm-6 col-6 px-5">
              <img :src="data.signup6Img" alt="" height="85px" />
              <p class="fw-bolder">{{ data.signup6Title }}</p>
              <p>{{ data.signup6Description }}</p>
            </div>
          </div>
        </div>
      </div>
    </main>
    <!-- End Main -->

    <!-- Start Footer -->
    <FooterSection />
    <!-- End Footer -->
  </auth-layout>
</template>

<script setup>
import FooterSection from "../../components/widgets/FooterMain.vue";
import { ref, onMounted } from "vue";
import { Form } from "vee-validate";
import * as Yup from "yup";
import TextInput from "@/components/global/TextInput.vue";
import FormSelect from "@/components/global/FormSelect.vue";
import { useToast } from "vue-toastification";
import { useRouter } from "vue-router";
import locationService from "@/services/location";
import authService from "@/services/auth";

const data = ref({
  mainTitle: "Shoop Việt Nam",
  subtitle: "Trở thành Người Bán \nngay hôm nay",
  feature1: "Nền tảng thương mại điện tử hàng đầu Đông Nam Á",
  feature2: "Phát triển trở thành thương hiệu toàn cầu",
  feature3: "Dẫn đầu lượng người dùng trên ứng dụng mua sắm tại Việt Nam",
  formTitle: "Đăng ký",
  storeNamePlaceholder: "Tên cửa hàng",
  successMessage: "Tuyệt",
  cityPlaceholder: "Thành phố",
  districtPlaceholder: "Quận Huyện",
  storeAddressPlaceholder: "Địa chỉ",
  emailPlaceholder: "Email",
  passwordPlaceholder: "Mật khẩu",
  confirmPasswordPlaceholder: "Nhập lại mật khẩu",
  agreementText: "Đồng ý với Shoop về",
  termsOfService: "Điều khoản dịch vụ",
  privacyPolicy: "Chính sách bảo mật",
  registerButton: "ĐĂNG KÝ",
  alreadyHaveAccount: "Bạn đã có tài khoản?",
  loginText: "Đăng nhập",
  whySellTitle: "TẠI SAO NÊN BÁN HÀNG TRÊN SHOOP",
  signup1Img: require("@/assets/img/signup_1.png"),
  signup1Title: "Miễn phí đăng ký",
  signup1Description: "Mở Shop và bán hàng thuận tiện, dễ dàng hơn cùng Shoop",
  signup2Img: require("@/assets/img/signup_2.png"),
  signup2Title: "Công cụ marketing đa dạng",
  signup2Description:
    "Thu hút người mua và tăng trưởng đơn hàng với Flash Sale",
  signup3Img: require("@/assets/img/signup_3.png"),
  signup3Title: "Vận chuyển dễ dàng",
  signup3Description:
    "Linh hoạt lựa chọn đơn vị vận chuyển và theo dõi chi tiết hành trình đơn hàng",
  signup4Img: require("@/assets/img/signup_4.png"),
  signup4Title: "Siêu sale cùng Shoop",
  signup4Description:
    "Bứt phá doanh số với các chiến dịch lớn: Ngày Siêu Mua Sắm, Siêu Sale,...",
  signup5Img: require("@/assets/img/signup_5.png"),
  signup5Title: "Hỗ trợ bán hàng hiệu quả",
  signup5Description:
    "Đa dạng tính năng giúp quản lý tương tác với khách hàng và theo dõi hiệu quả Shop",
  signup6Img: require("@/assets/img/signup_6.png"),
  signup6Title: "Kết nối cộng đồng người bán",
  signup6Description:
    "Chia sẻ kinh nghiệm bán hàng thực tế thông qua các hội thảo, khóa học trực tuyến",
});

const cities = ref([]);
const districts = ref([]);
const selectedCity = ref(null);
const selectedDistrict = ref(null);
const showPassword = ref(false);
const showConfirmPassword = ref(false);

function togglePassword() {
  showPassword.value = !showPassword.value;
}
function toggleConfirmPassword() {
  showConfirmPassword.value = !showConfirmPassword.value;
}

const toast = useToast();
const router = useRouter();

const fetchCitiesAndDistricts = async () => {
  try {
    const [citiesResponse, districtsResponse] = await Promise.all([
      locationService.getCities(),
      locationService.getDistricts(),
    ]);
    cities.value = citiesResponse.data;
    districts.value = districtsResponse.data;
  } catch (error) {
    toast.error("Failed to load cities and districts", {
      timeout: 2000,
    });
  }
};

onMounted(fetchCitiesAndDistricts);

const updateSelectedCity = (event) => {
  selectedCity.value = parseInt(event.target.value, 10);
};

const updateSelectedDistrict = (event) => {
  selectedDistrict.value = parseInt(event.target.value, 10);
};

const onSubmit = async (values) => {
  try {
    const payload = {
      name: values.store_name,
      email: values.email,
      password: values.password,
      password_confirmation: values.confirm_password,
      address: values.store_address,
      phone_number: values.phone_number || "1234567890", 
      registration_date: new Date().toISOString().split('T')[0], 
      gender: values.gender || 1, 
      city_id: selectedCity.value,
      district_id: selectedDistrict.value,
    };

    await authService.register(payload);
    toast.success("Đăng ký thành công", {
      timeout: 2000,
    });
    router.push({ name: "login" });
  } catch (error) {
    const errorMessage = error.response?.data?.message || "Đăng ký thất bại";
    toast.error("Error: " + errorMessage, {
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
console.log("test" + cities.value);
console.log(cities.value);
const schema = Yup.object().shape({
  store_name: Yup.string()
    .required("Vui lòng nhập tên cửa hàng")
    .max(20, "Tên cửa hàng không được vượt quá 20 ký tự"),
  store_address: Yup.string()
    .required("Vui lòng nhập địa chỉ cửa hàng")
    .max(100, "Địa chỉ cửa hàng không được vượt quá 100 ký tự"),
  email: Yup.string()
    .email("Email không hợp lệ")
    .required("Vui lòng nhập email")
    .max(50, "Email không được vượt quá 50 ký tự"),
  city: Yup.string()
    .test(
      "is-valid-city",
      "Vui lòng chọn thành phố hợp lệ",
      (value) => value !== "option0"
    )
    .required("Vui lòng chọn thành phố"),
  district: Yup.string()
    .test(
      "is-valid-district",
      "Vui lòng chọn quận huyện hợp lệ",
      (value) => value !== "option0"
    )
    .required("Vui lòng chọn quận huyện"),
  password: Yup.string()
    .required("Vui lòng nhập mật khẩu")
    .min(8, "Mật khẩu phải có ít nhất 8 ký tự")
    .matches(/[a-z]/, "Mật khẩu phải chứa ít nhất một chữ cái thường")
    .matches(/[A-Z]/, "Mật khẩu phải chứa ít nhất một chữ cái hoa")
    .matches(/\d/, "Mật khẩu phải chứa ít nhất một số")
    .matches(
      /[!@#$%^&*(),.?":{}|<>]/,
      "Mật khẩu phải chứa ít nhất một ký tự đặc biệt"
    ),
  confirm_password: Yup.string()
    .required("Vui lòng nhập lại mật khẩu")
    .oneOf([Yup.ref("password"), null], "Mật khẩu không khớp"),
});
</script>

<style>
/* Add any custom styles here */
</style>
