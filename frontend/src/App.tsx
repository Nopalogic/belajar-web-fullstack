function App() {
  return (
    <section className="relative h-screen overflow-hidden bg-gradient-to-b from-slate-900 to-slate-800 py-24 text-white md:py-32">
      <div className="bg-grid-white/[0.05] absolute inset-0 bg-[size:40px_40px]" />
      <div className="absolute inset-0 bg-gradient-to-b from-slate-900/80 to-slate-800/80" />

      <div className="absolute right-10 top-20 h-64 w-64 rounded-full bg-blue-500/20 blur-3xl" />
      <div className="absolute bottom-10 left-10 h-96 w-96 rounded-full bg-cyan-500/20 blur-3xl" />

      <div className="container relative z-10 mx-auto px-6">
        <div className="mx-auto max-w-3xl text-center">
          <div className="mb-6 flex flex-col items-center gap-1">
            <div className="flex items-center gap-5">
              <a href="/" className="flex items-center gap-4">
                <img
                  src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/react/react-original.svg"
                  className="h-16 w-16"
                />
                <div className="font-medium md:text-5xl">React</div>
              </a>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="28"
                height="28"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                className="lucide lucide-x-icon lucide-x mt-3"
              >
                <path d="M18 6 6 18" />
                <path d="m6 6 12 12" />
              </svg>
              <a href="/" className="flex items-center gap-4">
                <img
                  src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/typescript/typescript-original.svg"
                  className="h-16 w-16"
                />
                <span className="font-medium md:text-5xl">TypeScript</span>
              </a>
            </div>
            <span className="mt-2 text-lg font-normal">with</span>
            <a href="/" className="flex items-center gap-4">
              <img
                src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/tailwindcss/tailwindcss-original.svg"
                className="h-16 w-16"
              />
              <span className="font-medium md:text-5xl">TailwindCSS</span>
            </a>
          </div>
          <p className="mb-8 text-lg leading-relaxed text-slate-300 md:text-xl">
            A powerful, type-safe template for building beautiful web
            applications with the best modern technologies.
          </p>
          <div className="mb-6 inline-flex gap-1 rounded-full border border-slate-700 bg-slate-700/50 px-3 py-1 text-sm font-medium text-blue-300 backdrop-blur-sm">
            Edit <code>src/App.tsx</code> and save to test HMR
          </div>
        </div>
      </div>
    </section>
  );
}

export default App;
