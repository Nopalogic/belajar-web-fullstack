import { useNavigate } from "react-router";
import FormField from "@/components/form-field";
import { Button } from "@/components/ui/button";
import { Card, CardContent } from "@/components/ui/card";
import { Input } from "@/components/ui/input";
import { cn } from "@/lib/utils";
import { loginUser } from "@/services/auth";
import { useAuthStore } from "@/stores/auth";
import { useForm } from "react-hook-form";
import { Login } from "@/types/auth";
import { toast } from "@/hooks/use-toast";

export default function LoginPage() {
  const { login } = useAuthStore();
  const {
    register,
    handleSubmit,
    formState: { errors },
  } = useForm({
    defaultValues: {
      email: "",
      password: "",
    },
  });

  const navigate = useNavigate();

  const onSubmit = async (data: Login) => {
    try {
      const response = await loginUser(data);

      if (response.success) {
        login(response.token, response.data);
        navigate("/user");
      }
    } catch (error) {
      toast({
        variant: "destructive",
        title: error instanceof Error ? error.message : "Login failed",
      });
    }
  };

  return (
    <div className="bg-muted flex min-h-svh flex-col items-center justify-center p-6 md:p-10">
      <div className="w-full max-w-sm">
        <div className="flex flex-col gap-6">
          <Card className="overflow-hidden">
            <CardContent>
              <form className="p-6 md:p-8" onSubmit={handleSubmit(onSubmit)}>
                <div className="space-y-6">
                  <div className="flex flex-col items-center text-center">
                    <h1 className="text-2xl font-bold">Welcome back</h1>
                  </div>
                  <FormField id="email" label="Email">
                    <Input
                      id="email"
                      type="text"
                      className={cn({
                        "border-destructive": errors.email?.message,
                      })}
                      {...register("email")}
                    />
                    {errors.email?.message && (
                      <span className="text-destructive text-xs">
                        {errors.email.message}
                      </span>
                    )}
                  </FormField>
                  <FormField id="password" label="Password">
                    <Input
                      id="password"
                      type="password"
                      className={cn({
                        "border-destructive": errors.password?.message,
                      })}
                      {...register("password")}
                    />
                    {errors.email?.message && (
                      <span className="text-destructive text-xs">
                        {errors.email.message}
                      </span>
                    )}
                  </FormField>
                  <Button type="submit" className="w-full">
                    Sign In
                  </Button>
                  <div className="text-center text-sm">
                    Don&apos;t have an account?{" "}
                    <a
                      href="/register"
                      className="underline underline-offset-4"
                    >
                      Register
                    </a>
                  </div>
                </div>
              </form>
            </CardContent>
          </Card>
        </div>
      </div>
    </div>
  );
}
