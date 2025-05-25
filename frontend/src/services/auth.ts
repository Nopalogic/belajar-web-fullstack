import { Login, Register } from "@/types/auth";
import api, { handleApiError } from "./api";

export const registerUser = async (userData: Register) => {
  try {
    const response = await api.post("/auth/register", userData);
    return response.data;
  } catch (error) {
    throw handleApiError(error);
  }
};

export const loginUser = async (userData: Login) => {
  try {
    const response = await api.post("/auth/login", userData);
    return response.data;
  } catch (error) {
    throw handleApiError(error);
  }
};

export const verifyToken = async (token: string) => {
  try {
    const response = await api.get("/auth/verify-token", {
      headers: {
        Authorization: `Bearer ${token}`,
      },
    });
    return response.data;
  } catch (error) {
    throw handleApiError(error);
  }
};

export const logoutUser = async () => {
  try {
    const response = await api.delete("/auth/logout");
    return response.data;
  } catch (error) {
    throw handleApiError(error);
  }
};
