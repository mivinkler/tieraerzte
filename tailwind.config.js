import plugin from 'tailwindcss/plugin';

export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    container: {
      center: true,
      padding: '1rem',
    },
    fontSize: {
      xs: '0.8rem',
      sm: '0.9rem',
      base: '1rem',
      lg: '1.1rem',
      xl: '1.25rem',
      '2xl': '1.563rem',
      '3xl': '1.953rem',
      '4xl': '2.441rem',
      '5xl': '3.052rem',
    }
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
