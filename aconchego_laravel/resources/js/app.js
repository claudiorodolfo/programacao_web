import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

if ('serviceWorker' in navigator) {
    window.addEventListener('load', function() {
      navigator.serviceWorker.register('/service-worker.js').then(function(registration) {
        console.log('Service Worker registrado com sucesso: ', registration.scope);
      }, function(err) {
        console.log('Falha ao registrar o Service Worker: ', err);
      });
    });
  }