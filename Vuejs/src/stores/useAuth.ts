import { defineStore } from "pinia";
import axios from "./../plugins/Axios";

export const useAuthStore = defineStore("auth", {
    actions: {
        async login(credentials :object)
        {
            // await axios.post('/login', credentials);
            const response = (await axios.post('/login', credentials)).data;
            
            if(response) {
                localStorage.setItem("AccessToken", response.token);
                localStorage.setItem("CurrentUserId", response.data);
            }
        },

        async logout() {
            const response = (await axios.post('/logout')).data;

            if(response) {
                localStorage.removeItem("AccessToken");
                localStorage.removeItem("CurrentUserId");

                this.$reset();
            }
        }
    }
})