import { useAuthStore } from "@/stores/auth";
import { Navigate } from "react-router";

export function AuthenticatedRoute({
  children,
}: {
  children: React.ReactNode;
  allowedRoles?: string[];
}) {
  const { isAuthenticated } = useAuthStore();
  const token = localStorage.getItem("fullstack-auth-token");

  if (!isAuthenticated && !token) {
    return <Navigate to="/" />;
  }

  return <>{children}</>;
}
