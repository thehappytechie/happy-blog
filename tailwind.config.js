const colors = require('tailwindcss/colors')

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        './app/Http/Livewire/**/*Table.php',
        './vendor/power-components/livewire-powergrid/resources/views/**/*.php',
        './vendor/power-components/livewire-powergrid/src/Themes/Tailwind.php',
        './vendor/wire-elements/modal/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './vendor/rappasoft/laravel-livewire-tables/resources/views/**/*.blade.php',
    ],
    theme: {
        extend: {
            colors: {
                transparent: 'transparent',
                "pg-primary": colors.gray,
            },
            fontFamily: {
                sans: ['Inter', 'sans-serif'],
            },
        },
    },
    safelist: [
        {
           pattern: /max-w-(sm|md|lg|xl|2xl|3xl|4xl|5xl|6xl|7xl)/,
           variants: ['sm', 'md', 'lg', 'xl', '2xl'],
        },
     ],
    plugins: [],
}
