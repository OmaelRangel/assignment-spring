import axios from "axios";

const API_URL = "http://localhost:8000/api"; // Adjust if hosted

export const getUsers = async () => {
    const response = await axios.get(`${API_URL}/users`);
    return response.data;
};

export const updateUserScore = async (id, points) => {
    await axios.patch(`${API_URL}/users/${id}/points`, { points });
};

export const addUser = async (userData) => {
    await axios.post(`${API_URL}/users`, userData);
};

export const deleteUser = async (id) => {
    await axios.delete(`${API_URL}/users/${id}`);
};

