self.addEventListener('install', (e) => {
    console.log('[Service Worker] Installed');
});

self.addEventListener('fetch', (e) => {
    // Meneruskan permintaan jaringan secara normal
    e.respondWith(fetch(e.request).catch(() => caches.match(e.request)));
});