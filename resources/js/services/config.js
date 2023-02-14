import axios from "axios";
const URL = "/api/";
const token = localStorage.getItem("token") || null;

const instance = axios.create({
    baseURL: URL,
    headers: {
        "Content-Type": "application/json",
        Authorization: `Bearer ${token}`,
    },
});
export default instance;
