import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class', // Ativa o modo escuro via classe
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
                // Cores personalizadas para o tema escuro
                background: '#262626', // Fundo escuro
                text: '#ffffff', // Letras brancas
                primary: '#bb86fc', // Cor primária
                secondary: '#03dac6', // Cor secundária
                // Cores adicionais para botões
                buttonColors: {
                    purple: '#bb86fc', // Roxo
                    lightBlue: '#03dac6', // Azul claro
                    red: '#ff3d00', // Vermelho
                    yellow: '#ffeb3b', // Amarelo
                    green: '#4caf50', // Verde
                },
                // Cores adicionais, se necessário
                gray: {
                    900: '#1a1a1a', // Um tom de cinza mais escuro
                    800: '#2d2d2d',
                },
            },
        },
    },

    plugins: [forms],
};
