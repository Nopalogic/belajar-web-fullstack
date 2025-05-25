import { create } from "zustand";
import { createJSONStorage, persist } from "zustand/middleware";
import { verifyToken } from "@/services/auth";
import { User } from "@/types/user";

type AuthState = {
  isAuthenticated: boolean;
  user: User | null;
  isLoading: boolean;
  login: (token: string, userData: User) => void;
  logout: () => void;
  initializeAuth: () => Promise<void>;
};

export const useAuthStore = create<AuthState>()(
  persist(
    (set) => ({
      user: null,
      isLoading: true,
      isAuthenticated: false,

      login: (token: string, userData: User) => {
        localStorage.setItem("fullstack-auth-token", token);
        set({
          user: userData,
          isLoading: false,
          isAuthenticated: true,
        });
      },

      logout: () => {
        localStorage.removeItem("fullstack-auth-token");
        set({
          user: null,
          isLoading: false,
          isAuthenticated: false,
        });
      },

      initializeAuth: async () => {
        try {
          const token = localStorage.getItem("fullstack-auth-token");
          if (token) {
            const userData = await verifyToken(token);
            set({
              user: userData,
              isLoading: false,
              isAuthenticated: true,
            });
          } else {
            set({ isLoading: false, isAuthenticated: false });
          }
        // eslint-disable-next-line @typescript-eslint/no-unused-vars
        } catch (error) {
          localStorage.removeItem("fullstack-auth-token");
          set({
            user: null,
            isLoading: false,
            isAuthenticated: false,
          });
        }
      },
    }),
    {
      name: "fullstack-auth-storage",
      storage: createJSONStorage(() => localStorage),
      partialize: (state) => ({
        user: state.user,
        isAuthenticated: state.isAuthenticated,
      }),
    },
  ),
);
