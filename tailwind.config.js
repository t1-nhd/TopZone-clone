/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/views/admin/layout_admin/*.blade.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        extend: {},
        screens: {
            mb: "320px",

            sm: "640px",
            // => @media (min-width: 640px) { ... }

            md: "768px",
            // => @media (min-width: 768px) { ... }

            lg: "1044px",
            // => @media (min-width: 1024px) { ... }
            
            "2lg": "1140px",
            // => @media (min-width: 1140px) { ... }

            xl: "1280px",
            // => @media (min-width: 1280px) { ... }

            "2xl": "1536px",
            // => @media (min-width: 1536px) { ... }
        },
    },
    plugins: [require("flowbite/plugin")],
};
