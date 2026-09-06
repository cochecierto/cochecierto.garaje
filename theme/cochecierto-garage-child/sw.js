const CACHE_NAME = 'cochecierto-garaje-v0.4.3';
const STATIC_ASSETS = [
  '/',
  '/style.css',
  '/assets/js/garage-breakdown.js',
  '/manifest.json',
  '/assets/brand/icon-192.png',
  '/assets/brand/icon-512.png',
  '/assets/vehicles/coche-insignia-orange-transparent.png'
];

self.addEventListener('install', (event) => {
  event.waitUntil(
    caches.open(CACHE_NAME).then((cache) => {
      return cache.addAll(STATIC_ASSETS).catch((err) => {
        console.warn('PWA: algunos recursos no se pudieron precachear inmediatamente', err);
      });
    }).then(() => self.skipWaiting())
  );
});

self.addEventListener('activate', (event) => {
  event.waitUntil(
    caches.keys().then((keys) => {
      return Promise.all(
        keys.map((key) => {
          if (key !== CACHE_NAME) {
            return caches.delete(key);
          }
        })
      );
    }).then(() => self.clients.claim())
  );
});

self.addEventListener('fetch', (event) => {
  const request = event.request;
  // Solo procesar peticiones GET
  if (request.method !== 'GET') return;

  // Estrategia Network-First con fallback a cache
  event.respondWith(
    fetch(request)
      .then((networkResponse) => {
        if (networkResponse && networkResponse.status === 200) {
          const responseClone = networkResponse.clone();
          caches.open(CACHE_NAME).then((cache) => {
            // Guardar en cache recursos CSS, JS, imágenes y fuentes
            if (request.url.match(/\.(css|js|png|jpg|svg|woff2?)$/)) {
              cache.put(request, responseClone);
            }
          });
        }
        return networkResponse;
      })
      .catch(() => {
        return caches.match(request).then((cachedResponse) => {
          if (cachedResponse) {
            return cachedResponse;
          }
          if (request.mode === 'navigate') {
            return caches.match('/');
          }
          return new Response('Sin conexión.', {
            status: 503,
            statusText: 'Service Unavailable',
            headers: { 'Content-Type': 'text/plain; charset=utf-8' }
          });
        });
      })
  );
});