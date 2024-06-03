/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
    darkMode: "class",
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],
    safelist: [
        "text-stone-300",
        "text-blue-400",
        "text-red-500",
        "text-pink-300",
        "text-purple-500",
        "text-yellow-400",
        "text-violet-400",
    ],
    theme: {
        extend: {
            fontSize: {
                "2xs": ".685rem",
            },
            fontFamily: {
                sans: [
                    "Inter var",
                    "Inter",
                    "sans-serif",
                    ...defaultTheme.fontFamily.sans,
                ],
            },
            colors: {
                twitch: "#6441a5",
                youtube: "#FF0000",
                kick: "#53fc18",
                douyu: "#ff5f3a",
                huya: "#ffaa06",
            },
        },
    },
    variants: {
        extend: {
            textColor: ["group-hover"],
        },
    },
    plugins: [
        require("flowbite/plugin"),
        require("tailwind-capitalize-first-letter"),
        require("@tailwindcss/typography"),
    ],
};
