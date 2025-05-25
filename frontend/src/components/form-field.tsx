interface FormFieldProps {
  id: string;
  label: string;
  children: React.ReactNode;
  className?: string;
}

export default function FormField({
  label,
  children,
  id,
  className,
}: FormFieldProps) {
  return (
    <div className={className}>
      <label htmlFor={id} className="mb-2 block text-sm font-medium">
        {label}
      </label>
      {children}
    </div>
  );
}
