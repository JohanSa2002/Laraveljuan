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
            colors: {
                'cyber-purple': {
                    50: '#f5f0ff',
                    100: '#ede4ff',
                    200: '#dcc9ff',
                    300: '#c1a1ff',
                    400: '#a36dff',
                    500: '#8c2bee',
                    600: '#7a1cd1',
                    700: '#6616ad',
                    800: '#55158c',
                    900: '#471374',
                },
                'cyber-dark': {
                    900: '#0f0a1a',
                    800: '#1a132e',
                    700: '#2a1e4a',
                }
            },
            fontFamily: {
                sans: ['Inter', 'Space Grotesk', 'sans-serif'],
            },
            backdropBlur: {
                'xs': '2px',
            },
            keyframes: {
                blob: {
                    "0%": {
                        transform: "translate(0px, 0px) scale(1)",
                    },
                    "33%": {
                        transform: "translate(30px, -50px) scale(1.1)",
                    },
                    "66%": {
                        transform: "translate(-20px, 20px) scale(0.9)",
                    },
                    "100%": {
                        transform: "translate(0px, 0px) scale(1)",
                    },
                },
            },
            animation: {
                blob: "blob 7s infinite",
            },
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('tailwindcss-animate'),
    ],
};
