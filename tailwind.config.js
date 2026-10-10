/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
  ],
  darkMode: 'class',
  theme: {
    extend: {
      colors: {
        brand: {
          blue: '#2563eb',
          'blue-light': '#eff6ff',
          'blue-accent': '#3b82f6',
          sky: '#0284c7',
          wa: '#25D366',
          'wa-hover': '#1eb757',
        }
      },
      fontFamily: {
        sans: ['Plus Jakarta Sans', 'Inter', 'sans-serif'],
      },
      boxShadow: {
        'glass-light': '0 8px 32px 0 rgba(31, 38, 135, 0.07)',
        'glass-hover': '0 14px 40px 0 rgba(37, 99, 235, 0.12)',
        'glow-blue': '0 0 25px rgba(59, 130, 246, 0.25)',
        'glow-wa': '0 0 25px rgba(37, 211, 102, 0.3)',
      },
    },
  },
  plugins: [],
}
