const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors')

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./node_modules/flowbite/**/*.js"
    ],

    theme: {
        extend: {
            fontFamily: {
                poppins: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                    950 :  "#00a650",
                    900 :  "#00a650",
                    800 :  "#00a650",
                    700 :  "#00a650",
                    600 :  "#00a650",
                    500 :  "#00a650",
                    400 :  "#00a650",
                },
                secondary: {
                    900 :  "#ec0079",
                    800 :  "#ec0079",
                    700 :  "#ec0079",
                    600 :  "#ec0079",
                    500 :  "#ec0079",
                    400 :  "#ec0079",
                },
                danger: colors.rose,
                warning: colors.yellow
            }
        },
    },

    plugins: [
        require('flowbite/plugin') ,
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography')
    ],
};
