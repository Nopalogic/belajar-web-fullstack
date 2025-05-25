import FormField from "@/components/form-field";
import { Button } from "@/components/ui/button";
import { Card, CardContent } from "@/components/ui/card";
import { Input } from "@/components/ui/input";
import { toast } from "@/hooks/use-toast";
import { cn } from "@/lib/utils";
import { registerUser } from "@/services/auth";
import { Register } from "@/types/auth";
import { useForm } from "react-hook-form";
import { useNavigate } from "react-router";

export default function LoginPage() {
  const navigate = useNavigate();
  const {
    register,
    handleSubmit,
    formState: { errors },
  } = useForm({
    defaultValues: {
      name: "",
      email: "",
      password: "",
    },
  });

  const onSubmit = async (data: Register) => {
    try {
      const response = await registerUser(data);
      if (response.success) {
        navigate("/");
      }
    } catch (error) {
      console.log(error);

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
                  <FormField id="name" label="Name">
                    <Input
                      id="name"
                      type="text"
                      className={cn({
                        "border-destructive": errors.name?.message,
                      })}
                      {...register("name")}
                    />
                    {errors.name?.message && (
                      <span className="text-destructive text-xs">
                        {errors.name.message}
                      </span>
                    )}
                  </FormField>
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
                    Sign Up
                  </Button>
                  <div className="text-center text-sm">
                    Already have an account?{" "}
                    <a
                      href="/"
                      className="underline underline-offset-4"
                    >
                      Login
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
