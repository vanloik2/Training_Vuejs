import axios from "./../plugins/Axios";
import { defineStore } from "pinia";

export const usePost = defineStore("post", {
    actions: {
        async listPosts() {
            const response = (await axios.get('/posts')).data
            
            return response
        },

        async createPost(params :object) {
            params.user_id = localStorage.getItem("CurrentUserId");
            await axios.post('/posts', params)
        }
    }
})