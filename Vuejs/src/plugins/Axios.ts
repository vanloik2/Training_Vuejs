import axios from 'axios'
const baseDomain = 'http://localhost:8000/api'
const baseURL = `${baseDomain}`; const instance = axios.create({
    baseURL
});
instance.interceptors.request.use(
    (config) => {
        const token = localStorage.getItem('AccessToken');
        if (token) {
            config.headers['Authorization'] = `Bearer ${token}`;
        }
        return config;
    },
    (error) => {
        return Promise.reject(error);
    }
);

export default instance;