import { Route, Routes } from "react-router";
import LoginPage from "./pages/auth/login";
import RegisterPage from "./pages/auth/register";
import Dashboard from "./pages/dashboard";
import DashboardLayout from "./layouts/DashboardLayout";

function App() {
  return (
    <Routes>
      <Route path="/" element={<LoginPage />} />
      <Route path="/register" element={<RegisterPage />} />

      <Route element={<DashboardLayout />}>
        <Route path="/user" element={<Dashboard />} />
      </Route>
    </Routes>
  );
}

export default App;
