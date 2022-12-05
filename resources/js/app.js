import './bootstrap';
import './dashboard';
import axios from 'axios'

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.store('logo', {
    url: 'inicio',

    setUrl(url) {
        this.url = url;
    }
})

Alpine.start();

