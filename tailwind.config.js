/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./*.php', './templates/*.php'],
  theme: {
    extend: {
      display: ['hidden', 'invisible']
    },
  },
  variants: {
    extend: {
      borderWidth: ['hover', 'focus'],
      borderColor: ['hover', 'focus'],
      textDecoration: ['hover', 'focus'],
      display: ['responsive', 'group-hover', 'group-focus'],
      opacity: ['responsive', 'hover', 'focus', 'group-hover'],
    },
  },
  plugins: [
    require('@tailwindcss/typography'),
    require('@tailwindcss/forms'),
    require('@tailwindcss/aspect-ratio'),
    require('@tailwindcss/container-queries'),
    require('daisyui')
  ],
}
