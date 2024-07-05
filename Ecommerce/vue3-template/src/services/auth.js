import axios from './axios/index.js';

export default {
  async register(user) {
    try {
      const response = await axios.post('users/register', user);
      return response.data;
    } catch (error) {
      console.error("Register error response:", error.response);
      throw error;
    }
  },
  async login(credentials) {
    try {
      const response = await axios.post('users/login', {
        email: credentials.email,
        password: credentials.password
      });
      if (response.data.data.token) {
        localStorage.setItem('token', response.data.data.token);
      }
      return response.data.data;
    } catch (error) {
      console.error("Login error response:", error.response);
      throw error;
    }
  },
  async logout() {
    const response = await axios.post('users/logout');
    localStorage.removeItem('token');
    return response;
  },
  async forgotPassword(email) {
    try {
      const response = await axios.post('users/forgot-password', { email });
      return response.data;
    } catch (error) {
      console.error("Forgot password error response:", error.response);
      throw error;
    }
  },
  async resetPassword(data) {
    try {
      const response = await axios.post('users/reset-password', data);
      return response.data;
    } catch (error) {
      console.error("Reset password error response:", error.response);
      throw error;
    }
  },
  async checkResetToken(token) {
    try {
      const response = await axios.get(`users/check-reset-token?token=${token}`);
      return response.data;
    } catch (error) {
      console.error("Check reset token error response:", error.response);
      throw error;
    }
  },
};
