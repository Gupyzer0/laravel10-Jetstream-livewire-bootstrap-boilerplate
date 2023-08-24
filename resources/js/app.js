import './bootstrap';

// Bootstrapcss
import * as bootstrap from 'bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();
