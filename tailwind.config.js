/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./public/**/*.{php, js}"],
  theme: {
    extend: {},
  },
  plugins: [require('tailwind-scrollbar'),require('tw-elements/dist/plugin')],
}
