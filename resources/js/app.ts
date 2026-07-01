import 'primeicons/primeicons.css';
import { createApp, h, DefineComponent } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers'
import PrimeVue from 'primevue/config'
import { definePreset } from '@primeuix/themes'
import Aura from '@primeuix/themes/aura'
import Lara from '@primeuix/themes/lara'

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';
const colorScheme: string = "amber";

function applyStoredTheme(): void {
    const theme = localStorage.getItem('theme')
    const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches

    const isDark =
        theme === 'dark' ||
        (theme === 'system' && prefersDark) ||
        (!theme && prefersDark)

    document.documentElement.classList.toggle('dark', isDark)
}

applyStoredTheme()
window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', (e) => {
    const theme = localStorage.getItem('theme')
    if (theme === 'system' || !theme) {
        document.documentElement.classList.toggle('dark', e.matches)
    }
})

const MyPreset = definePreset(Aura, {
    semantic: {
        primary: {
            50: `{${colorScheme}.50}`,
            100: `{${colorScheme}.100}`,
            200: `{${colorScheme}.200}`,
            300: `{${colorScheme}.300}`,
            400: `{${colorScheme}.400}`,
            500: `{${colorScheme}.500}`,
            600: `{${colorScheme}.600}`,
            700: `{${colorScheme}.700}`,
            800: `{${colorScheme}.800}`,
            900: `{${colorScheme}.900}`,
            950: `{${colorScheme}.950}`,
        },
    },
})

createInertiaApp({
    resolve: (name) =>
        resolvePageComponent(`./pages/${name}.vue`, import.meta.glob<DefineComponent>('./pages/**/*.vue'),
        ),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin).use(PrimeVue, {
                theme: {
                    preset: MyPreset,
                    options: {
                        darkModeSelector: '.dark',
                        cssLayer: false,
                    },
                },
                ripple: true,
            }).mount(el)
    },
    title: (title) => (title ? `${title} - ${appName}` : appName),
    // progress: {
    //     color: '#4B5563',
    // },
});
