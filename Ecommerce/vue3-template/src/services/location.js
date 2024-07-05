import axios from './axios';

export default {
  async getCities() {
    return axios.get('/cities');
  },
  async getDistricts() {
    return axios.get('/districts');
  },
  async getCategories() {
    return axios.get('/categories');
  }
};
