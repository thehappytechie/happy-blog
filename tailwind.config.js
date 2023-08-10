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
                sans: ['Nunito Sans', 'sans-serif']
            },
        },
    },
    safelist: [
        "sm:max-w-sm",
        "sm:max-w-md",
        "sm:max-w-lg",
        "sm:max-w-xl",
        "sm:max-w-2xl",
        "sm:max-w-3xl",
        "sm:max-w-4xl",
        "sm:max-w-5xl",
        "sm:max-w-6xl",
        "sm:max-w-7xl"
    ],
    plugins: [],
}
