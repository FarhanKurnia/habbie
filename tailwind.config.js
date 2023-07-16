/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    fontFamily: {
      'sans': ['DINPro-Medium', 'sans-serif'],
      'bold': ['DINPro-Bold', 'sans-serif']
    },
    colors: {
      'pink-bloosom': '#F9D6D4',
      'pink-primary': '#DE586C',
      'grey': '#4B4D4F',
      'green': '#39AE41',
      'teal-shadow': '#BADBBF',
      'teal': '#DAEDDD',
      'grey-secondary': '#F0F0F0',
      'grey-secondary-50': '#F7F7F7',
      'white': '#FFFFFF',
      'grey-secondary': '#CCCCCC',
      'danger': '#d81b25'
    },
    extend: {},
  },
  plugins: [require("daisyui")],
  daisyui: {
    styled: true,
    themes: [
      {
        mytheme: {
          "primary": "#DE586C",
          "secondary": "#f6d860",
          "base-100": "#FFFFFF",
          "neutral": "#F9D6D4",
          "accent": "#39AE41"
        }
      }
    ],
    base: true,
    utils: true,
    logs: true,
    rtl: false
  }
}

