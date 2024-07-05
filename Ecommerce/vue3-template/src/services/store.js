import axios from './axios';

export default {
  async getStore() {
    return axios.get('/store');
  },
  async updateStore(data) {
    return axios.put('/store', data);
  }
};
