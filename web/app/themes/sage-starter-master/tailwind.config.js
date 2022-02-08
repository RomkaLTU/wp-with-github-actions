module.exports = {
  content: [
    './app/**/*.php',
    './resources/**/*.{php,vue,js}'
  ],
  theme: {
    extend: {
      colors: {},
    },
    screens: {
      xs: '568px',
      sm: '768px',
      md: '1024px',
      lg: '1280px',
      xl: '1440px',
    },
  },
  plugins: [],
  corePlugins: {
    container: false,
  },

};
