import './bootstrap';
import Alpine from 'alpinejs';
import $ from 'jquery';  // Importando jQuery

// Disponibilizando jQuery globalmente
window.$ = $;
window.jQuery = $;

window.Alpine = Alpine;

Alpine.start();
