/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        extend: {
            brightness: {
                25: ".25",
                175: "1.75",
            },
            colors: {
                bg_blue: "#2C3E50",
            },
        },
    },
    plugins: [require("flowbite/plugin")],
};
