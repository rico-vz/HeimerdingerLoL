/** @type {import('tailwindcss').Config} */
const defaultTheme = require("tailwindcss/defaultTheme");
module.exports = {
    darkMode: "class",
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        extend: {
            fontSize: {
                xsm: ".685rem",
            },
            fontFamily: {
                sans: [
                    "Inter var",
                    "Inter",
                    "sans-serif",
                    ...defaultTheme.fontFamily.sans,
                ],
            },
        },
    },
    corePlugins: {
        aspectRatio: false,
    },
    plugins: [require("flowbite/plugin"), require("@tailwindcss/aspect-ratio"), require('tailwind-capitalize-first-letter'),],
};
