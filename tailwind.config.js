/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        extend: {
            screens: {
                phone: "",
                tablet: "640px",
                // => @media (min-width: 640px) { ... }
                laptop: "1024px",
                // => @media (min-width: 1024px) { ... }
                desktop: "1280px",
                // => @media (min-width: 1280px) { ... }
            },
            // textShadow: {
            //     sm: "0 1px 2px var(--tw-shadow-color)",
            //     DEFAULT: "0 2px 4px var(--tw-shadow-color)",
            //     lg: "0 8px 16px var(--tw-shadow-color)",
            // },
            fontFamily: {
                noto: "noto sans",
                inter: "inter",
                lato: "lato",
                poppins: "poppins",
            },
            colors: {
                primary: "#000000",
                secondary: "#7C8DB5",
                border: "#E6EDFF",
                indigoo: "#347AE2",
                redd: "#FF3B30",
                greenn: "#34C759",
                orange: "#FF9500",
                icon: "#393872",
                caption: "#082431b7",
                active: "#5D5FEF",
                wall: "#637DDC",
                p: "#9F61D9",
            },
            backgroundImage: {
                aeon: "url('/public/img/aeon.png')",
                hero: "url('/public/img/bg-hero.jpg')",
                login: "url('/public/img/bg-login.jpg')",
                logo: "url('/public/img/logo-dm.jpg')",
                ma: "url('/public/img/MA.png')",
                icon_saintek: "url('/public/img/saintek.png')",
                icon_siswa: "url('/public/img/siswa.png')",
                icon_soshum: "url('/public/img/soshum.png')",
                user: "url('/public/img/user.png')",
                ma_dm: "url('/public/img/ma-dm.png')",
                student: "url('/public/img/student.png')",
            },
        },
    },
    plugins: [require("flowbite/plugin"), require("tailwind-scrollbar")],
};
