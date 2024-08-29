/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {},
    },
    plugins: [
        require('daisyui'),
    ],
    daisyui: {
        themes: [{
            baseTheme: {
                "primary": "#241B69",
                "primary-content": "#e7e5e4",
                "secondary": "#854d0e",
                "secondary-content": "#e7e5e4",
                "accent": "#f59e0b",
                "accent-content": "#e3e1e0",
                "neutral": "#44403c",
                "neutral-content": "#e7e5e4",
                "base-100": "#f5f5f4",
                "base-200": "#d5d5d4",
                "base-300": "#cccbcb",
                "base-content": "#44403c",
                "info": "#38bdf8",
                "info-content": "#44403c",
                "success": "#43ab00",
                "success-content": "#e7e5e4",
                "warning": "#f97316",
                "warning-content": "#e7e5e4",
                "error": "#ef4444",
                "error-content": "#e7e5e4",
            },
        }],
    },
}

