/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    boxShadow: {
      default: '0 0 5px 0 rgba(0, 0, 0, 0.08)',
    },
    extend: {
      colors: {
        grey: {
          light: "#F5F6F9",
        }
      },
    },
  },
  plugins: [],
}

