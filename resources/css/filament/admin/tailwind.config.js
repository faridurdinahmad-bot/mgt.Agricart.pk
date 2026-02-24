import preset from '../../../../vendor/filament/filament/tailwind.config.preset'

export default {
    presets: [preset],
    content: [
        './app/Filament/**/*.php',
        './resources/views/filament/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
    ],
    theme: {
        extend: {
            colors: {
                primary: {
                    50: 'rgb(var(--primary-50))',
                    100: 'rgb(var(--primary-100))',
                    200: 'rgb(var(--primary-200))',
                    300: 'rgb(var(--primary-300))',
                    400: 'rgb(var(--primary-400))',
                    500: 'rgb(var(--primary-500))',
                    600: 'rgb(var(--primary-600))',
                    700: 'rgb(var(--primary-700))',
                    800: 'rgb(var(--primary-800))',
                    900: 'rgb(var(--primary-900))',
                    950: 'rgb(var(--primary-950))',
                },
            },
        },
    },
}
