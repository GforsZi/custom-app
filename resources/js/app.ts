import 'primeicons/primeicons.css';
import { createApp, h, DefineComponent } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers'
import PrimeVue from 'primevue/config'
import { definePreset } from '@primeuix/themes'
import Aura from '@primeuix/themes/aura'
import Lara from '@primeuix/themes/lara'

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

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
            50: '{amber.50}',
            100: '{amber.100}',
            200: '{amber.200}',
            300: '{amber.300}',
            400: '{amber.400}',
            500: '{amber.500}',
            600: '{amber.600}',
            700: '{amber.700}',
            800: '{amber.800}',
            900: '{amber.900}',
            950: '{amber.950}',
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
