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
      sm: ['16px', '28px'],
      base: ['17px', '28px'],
      lg: ['20px', '28px'],
      xl: ['22px', '32px'],
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
