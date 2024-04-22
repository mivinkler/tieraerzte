import plugin from 'tailwindcss/plugin';

export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      container: {
        center: true,
        screens: {
          sm: '100%',
          md: '100%',
          lg: '1200px',
          xl: '1200px',
        },
      },
      flexBasis: {
        '1/7': '14.2857143%',
        '2/7': '28.5714286%',
        '3/7': '42.8571429%',
        '4/7': '57.1428571%',
        '5/7': '71.4285714%',
        '6/7': '85.7142857%',
      },
      gridTemplateRows: {
        '7': 'repeat(7, minmax(0, 1fr))',
        '8': 'repeat(8, minmax(0, 1fr))',
        '9': 'repeat(9, minmax(0, 1fr))',
        '10': 'repeat(10, minmax(0, 1fr))',
      }
    },
  },
  plugins: [
    plugin(function({ addComponents }) {
      const newUtilities = {
        '.toggle-textarea': {
          '@apply relative': {},
          'input[type="checkbox"]:checked ~ textarea': {
            '@apply block': {},
          },
          'textarea': {
            '@apply hidden': {},
          }
        }
      };
      addComponents(newUtilities);
    })
  ],
}
