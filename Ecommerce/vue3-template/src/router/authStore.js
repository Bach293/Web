import { defineStore } from 'pinia';
import authService from '@/services/auth'; 

export const useAuthStore = defineStore('auth', {
  state: () => ({
    isLoggedIn: false,
    user: null,
    token: localStorage.getItem('token') || null,
  }),
  actions: {
    async login(credentials) {
      try {
        const data = await authService.login(credentials);
        this.user = data.user;
        this.token = data.token;
        this.isLoggedIn = true;
        localStorage.setItem('token', data.token);
        return true; 
      } catch (error) {
        console.error('Failed to login:', error);
        return false;
      }
    },
    async logout() {
      try {
        await authService.logout();
        this.isLoggedIn = false;
        this.user = null;
        this.token = null;
        localStorage.removeItem('token');
        window.location.href = '/login';
      } catch (error) {
        console.error('Failed to logout:', error);
      }
    },
    isAuthenticated() {
      return !!this.token;
    },
    checkAuth() {
      const token = localStorage.getItem('token');
      if (token) {
        this.token = token;
        this.isLoggedIn = true;
      } else {
        this.isLoggedIn = false;
      }
    }
  }
});
