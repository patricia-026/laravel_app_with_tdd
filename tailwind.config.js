/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      boxShadow: {
        DEFAULT: '0 0 5px 0 rgba(0, 0, 0, 0.08)',
      },
      colors: {
        grey: {
          light: "#F5F6F9",
        },
        blue: {
          500: '#47cdff',
          400: '#8ae2fe',
        },
      },
      backgroundColor: {
        page: 'var(--page-background-color)', // bg-page
        card: 'var(--card-background-color)',
        button: 'var(--button-background-color)',
        header: 'var(--header-background-color)',
      },
      textColor: {
        default: 'var(--text-default-color)',
      }
    },
  },

  plugins: [],
}

