import axios from './axios';

export default {
  async getPageProductsOnPage(page) {
    return axios.get(`/page/products?page=${page}`);
  },
  async getPageTotal() {
    return axios.get(`/page/products/total`);
  },
  async getPageProductById(id) {
    return axios.get(`/page/products/${id}`);
  },
  async getProductsOnPage(page) {
    return axios.get(`/products?page=${page}`);
  },
  async getTotal() {
    return axios.get(`/products/total`);
  },
  async getProductById(id) {
    return axios.get(`/products/${id}`);
  },
  async createProduct(data) {
    return axios.post('/products', data);
  },
  async createDraft(data) {
    return axios.post('/products/draft', data);
  },
  async updateProduct(id, data) {
    return axios.put(`/products/${id}`, data);
  },
  async deleteProduct(id) {
    return axios.delete(`/products/${id}`);
  },
  async saveDraft(id, data) {
    return axios.patch(`/products/${id}/draft`, data);
  },
  async updateStatus(id, status) {
    return axios.patch(`/products/${id}/status`, { status });
  }
};
