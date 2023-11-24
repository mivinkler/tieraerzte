/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      container: {
        padding: '1rem',
        center: true,
        screens: {
          sm: '100%',
          md: '100%',
          lg: '1280px',
          xl: '1280px',
        },
    },
  },
  plugins: [],
}
}




