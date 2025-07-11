import '../css/app.css';
import './bootstrap';

import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createApp, h } from 'vue';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';

import { library } from '@fortawesome/fontawesome-svg-core';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
// Import the specific icons you want to use
import {
  faFilm,
  faPlay,
  faStar,
  faEye,
  faArrowTrendUp,
  faPlus,
  faClock,
  faArrowRight,
  faRightFromBracket
} from '@fortawesome/free-solid-svg-icons';

// Add them to the library
library.add(faFilm, faPlay, faStar, faEye, faArrowTrendUp, faPlus, faClock, faArrowRight, faRightFromBracket);

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob('./Pages/**/*.vue'),
        ),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .component('font-awesome-icon', FontAwesomeIcon)
            .mount(el);
    },
    // setup({ el, App, props, plugin }) {
    //     const app = createApp({ render: () => h(App, props) })
    //         .use(plugin)
    //         .use(ZiggyVue)
    //         // Register FontAwesomeIcon component globally
    //         .component('font-awesome-icon', FontAwesomeIcon);
    //
    //     return app.mount(el);
    // },
    progress: {
        color: '#4B5563',
    },
});
