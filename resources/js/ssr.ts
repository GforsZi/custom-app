import { createSSRApp, h, DefineComponent } from 'vue'
import { renderToString } from '@vue/server-renderer'
import { createInertiaApp } from '@inertiajs/vue3'
import createServer from '@inertiajs/vue3/server'
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers'
import PrimeVue from 'primevue/config'
import Aura from '@primeuix/themes/aura'

createServer((page) =>
    createInertiaApp({
        page,
        render: renderToString,
        resolve: (name) =>
            resolvePageComponent(
                `./pages/${name}.vue`,
                import.meta.glob<DefineComponent>('./pages/**/*.vue'),
            ),
        setup({ App, props, plugin }) {
            return createSSRApp({ render: () => h(App, props) })
                .use(plugin)
                .use(PrimeVue, {
                    theme: {
                        preset: Aura,
                        options: {
                            darkModeSelector: '.dark',
                            cssLayer: {
                                name: 'primevue',
                                order: 'tailwind-base, primevue, tailwind-utilities',
                            },
                        },
                    },
                })
        },
    }),
)
