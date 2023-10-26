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
        default: 'var(--text-default-color)',
        accent: 'var(--text-accent-color)',
        'accent-light': 'var(--text-accent-light-color)',
        muted: 'var(--text-muted-color)',
        'muted-light': 'var(--text-muted-light-color)',
      },
      backgroundColor: {
        page: 'var(--page-background-color)', // bg-page
        card: 'var(--card-background-color)',
        button: 'var(--button-background-color)',
        header: 'var(--header-background-color)',
      },
    },
  },

  plugins: [],
}

