import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'agro-dark': '#09090b', // Fondo casi negro (Zinc 950)
                'agro-card': '#18181b', // Fondo para tarjetas (Zinc 900)
                'agro-green': '#00d632', // Verde vibrante principal
                'agro-green-dark': '#009924',
                'agro-yellow': '#ffc107', // Amarillo para botones CTA
            }
        },
    },

    plugins: [forms],
};