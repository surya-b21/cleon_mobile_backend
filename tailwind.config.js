module.exports = {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
    ],
    purge: [],
    darkMode: false, // or 'media' or 'class'
    theme: {
      extend: {},
      colors: {
          'primary': '#2A2F4A',
          'secondary': '#867EBA',
      },
    },
    variants: {
      extend: {},
    },
    plugins: [],
  }
