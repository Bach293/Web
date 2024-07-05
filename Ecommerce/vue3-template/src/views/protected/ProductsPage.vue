<template>
  <!-- Modal Delete-->
  <div v-if="showModal" class="modal" tabindex="-1" style="display: block">
    <!-- Modal content -->
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">{{ data.modal_confirm_text }}</h5>
          <button
            type="button"
            class="btn-close"
            @click="showModal = false"
          ></button>
        </div>
        <div class="modal-footer">
          <button
            type="button"
            class="btn btn-secondary"
            @click="showModal = false"
          >
            {{ data.modal_confirm_no }}
          </button>
          <button type="button" class="btn btn-danger" @click="confirmDelete">
            {{ data.modal_confirm_yes }}
          </button>
        </div>
      </div>
    </div>
  </div>

  <protected-layout>
    <div class="col-lg-10 col-sm-12 col-12 p-4 bg-f9f9f9">
      <div class="container-fluid p-3 bg-white">
        <div class="row">
          <p class="fw-bolder fs-4">{{ data.title }}</p>
        </div>
        <form class="row w-100 form" role="search">
          <div class="col-lg-4 col-sm-12 col-12 d-inline-flex py-3">
            <span class="input-group-text" id="basic-addon1"
              ><i class="bi bi-funnel fs-5"></i
            ></span>
            <input
              type="text"
              class="form-control"
              :placeholder="data.filter1_placeholder"
              aria-describedby="basic-addon1"
            />
          </div>
          <div class="col-lg-2 col-sm-4 col-4 py-3">
            <select class="form-select">
              <option selected>{{ data.status_op1 }}</option>
              <option value="1">{{ data.status_op2 }}</option>
              <option value="2">{{ data.status_op3 }}</option>
              <option value="3">{{ data.status_op4 }}</option>
            </select>
          </div>
          <div class="col-lg-2 col-sm-4 col-4 py-3">
            <select class="form-select">
              <option selected>{{ data.state_op1 }}</option>
              <option value="1">{{ data.state_op2 }}</option>
              <option value="2">{{ data.state_op3 }}</option>
            </select>
          </div>
          <div class="col-lg-3 col-sm-4 col-4 ms-auto py-3">
            <router-link class="a-white" to="/products/create">
              <button
                type="button"
                class="btn btn-success ms-auto d-flex align-items-center"
              >
                {{ data.btn_add_product }}
              </button>
            </router-link>
          </div>
        </form>
        <div class="row p-3">
          <table class="table text-center">
            <thead>
              <tr>
                <th scope="col">{{ data.id }}</th>
                <th scope="col">{{ data.name_product }}</th>
                <th scope="col">{{ data.price }}</th>
                <th scope="col">{{ data.quantity }}</th>
                <th scope="col">{{ data.status_label }}</th>
                <th scope="col">{{ data.state_label }}</th>
                <th scope="col">{{ data.action }}</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(item, index) in products" :key="index">
                <td>{{ item.id }}</td>
                <td>{{ item.name }}</td>
                <td>{{ item.price }}</td>
                <td>{{ item.stock_quantity }}</td>
                <td>
                  {{
                    item.status == 0
                      ? "Bản nháp"
                      : item.status == 1
                      ? "Đang bán"
                      : "Dừng bán"
                  }}
                </td>
                <td>
                  <div
                    class="form-check form-switch d-flex justify-content-center"
                  >
                    <input
                      class="form-check-input"
                      type="checkbox"
                      role="switch"
                      :checked="item.status == 1"
                      @change="toggleStatus(item)"
                    />
                  </div>
                </td>
                <td>
                  <router-link
                    class="a-black px-2"
                    :to="{
                      name: 'update-product',
                      params: { slug: item.slug, id: index },
                    }"
                  >
                    <i class="bi bi-pencil-square btn btn-info"></i>
                  </router-link>
                  <i
                    class="bi bi-trash3 btn btn-danger"
                    @click="openDeleteModal(item.id)"
                  ></i>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="row mb-5">
          <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
              <li class="page-item" :class="{ disabled: currentPage === 1 }">
                <a
                  class="page-link"
                  href="#"
                  @click="fetchProducts(currentPage - 1)"
                  >Previous</a
                >
              </li>
              <li
                class="page-item"
                v-for="n in totalPage"
                :key="n"
                :class="{ active: n === currentPage }"
              >
                <a class="page-link" href="#" @click="fetchProducts(n)">{{
                  n
                }}</a>
              </li>
              <li
                class="page-item"
                :class="{ disabled: currentPage === totalPage }"
              >
                <a
                  class="page-link"
                  href="#"
                  @click="fetchProducts(currentPage + 1)"
                  >Next</a
                >
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </protected-layout>
</template>
  
<script setup>
import ProtectedLayout from "@/layouts/ProtectedLayout.vue";
import { ref, onMounted } from "vue";
import { useToast } from "vue-toastification";
import productsService from "@/services/products";

const data = ref({
  title: "Tất Cả Sản Phẩm",
  filter1_placeholder: "Tên sản phẩm",
  status_op1: "Tình trạng",
  status_op2: "Dừng bán",
  status_op3: "Đang bán",
  status_op4: "Bản nháp",
  state_op1: "Trạng thái",
  state_op2: "Bật",
  state_op3: "Tắt",
  btn_add_product: "Thêm Sản Phẩm",
  id: "ID",
  name_product: "Tên Sản Phẩm",
  price: "Giá Bán",
  quantity: "Số Lượng Hiện Có",
  status_label: "Tình Trạng",
  state_label: "Trạng Thái",
  action: "Hành Động",
  modal_confirm_text: "Bạn có chắc chắn muốn xóa thông tin này không?",
  modal_confirm_no: "Không",
  modal_confirm_yes: "Có",
});

const currentPage = ref(1);
const totalPage = ref(0);
const products = ref([]);
const deletingProductId = ref(null);
const showModal = ref(false);
const toast = useToast();

onMounted(() => {
  getTotalPages();
  fetchProducts(currentPage.value);
});

const getTotalPages = async () => {
  try {
    const totalResponse = await productsService.getTotal();
    console.log(totalResponse);
    if (totalResponse.data && totalResponse.data.data) {
      totalPage.value = Math.ceil(totalResponse.data.data / 10);
      if (totalPage.value < 1) {
        totalPage.value = 1;
      }
    } else {
      throw new Error("Invalid response for total products");
    }
  } catch (error) {
    toast.error("Failed to load total pages: " + error.message, {
      timeout: 2000,
    });
    totalPage.value = 1;
  }
};

const fetchProducts = async (page) => {
  try {
    const response = await productsService.getProductsOnPage(page);
    console.log(response);
    console.log(response.data.data);
    products.value = response.data.data;
    currentPage.value = page;
  } catch (error) {
    toast.error("Failed to load products", { timeout: 2000 });
  }
};

const toggleStatus = async (item) => {
  try {
    let newStatus = -1;
    if (item.status == 1) {
      newStatus = 2;
    } else {
      newStatus = 1;
    }
    const response = await productsService.updateStatus(item.id, newStatus);
    console.log(response);
    if (response.data.data == true) {
      item.status = newStatus;
      console.log(response.data.data.status);
      console.log("Mới" + item.status);
      toast.success("Status update successful!");
    } else {
      throw new Error("Status update failed!");
    }
  } catch (error) {
    toast.error(error.message, { timeout: 2000 });
  }
};

const openDeleteModal = (productId) => {
  deletingProductId.value = productId;
  showModal.value = true;
};

const deleteProduct = async (id) => {
  try {
    const response = await productsService.deleteProduct(id);
    console.log(response);
    if (response.data.status == 1) {
      toast.success("Product successfully deleted");
      fetchProducts(currentPage.value);
    } else {
      throw new Error("Failed to delete product");
    }
  } catch (error) {
    toast.error("Error deleting product: " + error.message, { timeout: 2000 });
  }
};

const confirmDelete = async () => {
  await deleteProduct(deletingProductId.value);
  showModal.value = false;
};
</script>
  
  <style scoped>
.a-white {
  color: white;
  text-decoration: none;
}
</style>