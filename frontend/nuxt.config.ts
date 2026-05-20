// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  compatibilityDate: '2025-07-15',
  devtools: { enabled: false },

  modules: [
    '@nuxtjs/tailwindcss',
    '@vueuse/nuxt',
  ],

  components: {
    dirs: [
      { path: '~/components', pathPrefix: false },
    ],
  },

  // SSR activé pour SEO optimal
  ssr: true,

  runtimeConfig: {
    public: {
      apiBase: process.env.NUXT_PUBLIC_API_BASE || 'http://localhost:8000/api',
      siteUrl: process.env.NUXT_PUBLIC_SITE_URL || 'http://localhost:3000',
    },
  },

  app: {
    head: {
      charset: 'utf-8',
      viewport: 'width=device-width, initial-scale=1',
      titleTemplate: '%s | DST Computing — Dakar, Sénégal',
      title: 'Solutions IT & Logiciels Métiers',
      meta: [
        {
          name: 'description',
          content: 'DST Computing — Société informatique à Dakar, Sénégal. Développement logiciel sur mesure, applications web & mobile, agents IA, infrastructure IT pour les entreprises d\'Afrique de l\'Ouest.',
        },
        {
          name: 'keywords',
          content: 'société informatique Dakar, développement logiciel Sénégal, logiciel métier Dakar, application mobile Sénégal, prestataire IT Dakar, transformation numérique Afrique, intelligence artificielle Sénégal, infrastructure informatique Dakar, DST Computing, NAMASTECH, logiciel pharmacie Sénégal, gestion commerciale Sénégal, développement web Dakar, ERP Sénégal, CRM Dakar',
        },
        { name: 'robots', content: 'index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1' },
        { name: 'author', content: 'DST Computing' },
        { name: 'theme-color', content: '#0F1A3E' },
        { name: 'geo.region', content: 'SN-DK' },
        { name: 'geo.placename', content: 'Dakar, Sénégal' },
        { name: 'geo.position', content: '14.6937;-17.4441' },
        { name: 'ICBM', content: '14.6937, -17.4441' },
        { name: 'language', content: 'French' },
        { name: 'revisit-after', content: '7 days' },
        // Open Graph
        { property: 'og:type', content: 'website' },
        { property: 'og:site_name', content: 'DST Computing' },
        { property: 'og:locale', content: 'fr_SN' },
        { property: 'og:image', content: '/og-image.jpg' },
        { property: 'og:image:width', content: '1200' },
        { property: 'og:image:height', content: '630' },
        { property: 'og:image:alt', content: 'DST Computing — Solutions IT à Dakar, Sénégal' },
        // Twitter Card
        { name: 'twitter:card', content: 'summary_large_image' },
        { name: 'twitter:site', content: '@DSTComputing' },
        { name: 'twitter:image', content: '/og-image.jpg' },
      ],
      link: [
        { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' },
        { rel: 'canonical', href: 'https://www.dstcomputing.sn' },
        { rel: 'preconnect', href: 'https://fonts.googleapis.com' },
        { rel: 'preconnect', href: 'https://fonts.gstatic.com', crossorigin: '' },
        {
          rel: 'stylesheet',
          href: 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Poppins:wght@600;700;800&display=swap',
        },
      ],
      script: [
        {
          type: 'application/ld+json',
          innerHTML: JSON.stringify({
            '@context': 'https://schema.org',
            '@type': 'LocalBusiness',
            '@id': 'https://www.dstcomputing.sn/#organization',
            name: 'DST Computing',
            alternateName: 'NAMASTECH',
            description: 'Société informatique à Dakar spécialisée en développement logiciel sur mesure, applications web et mobile, agents IA, infrastructure IT pour les entreprises d\'Afrique de l\'Ouest.',
            url: 'https://www.dstcomputing.sn',
            logo: 'https://www.dstcomputing.sn/icone.png',
            image: 'https://www.dstcomputing.sn/og-image.jpg',
            telephone: '+221338600000',
            email: 'contact@dstcomputing.sn',
            foundingDate: '2015',
            numberOfEmployees: { '@type': 'QuantitativeValue', value: 20 },
            address: {
              '@type': 'PostalAddress',
              streetAddress: 'Dakar',
              addressLocality: 'Dakar',
              addressRegion: 'Dakar',
              postalCode: 'BP 1234',
              addressCountry: 'SN',
            },
            geo: {
              '@type': 'GeoCoordinates',
              latitude: 14.6937,
              longitude: -17.4441,
            },
            areaServed: [
              { '@type': 'Country', name: 'Sénégal' },
              { '@type': 'Country', name: 'Côte d\'Ivoire' },
              { '@type': 'Country', name: 'Mali' },
              { '@type': 'Country', name: 'Guinée' },
              { '@type': 'AdministrativeArea', name: 'Afrique de l\'Ouest' },
            ],
            serviceType: [
              'Développement logiciel sur mesure',
              'Application web Sénégal',
              'Application mobile Dakar',
              'Infrastructure IT',
              'Intelligence artificielle',
              'Formation informatique',
              'ERP Sénégal',
              'CRM Dakar',
            ],
            hasOfferCatalog: {
              '@type': 'OfferCatalog',
              name: 'Solutions IT DST Computing',
              itemListElement: [
                { '@type': 'Offer', itemOffered: { '@type': 'Service', name: 'SAYCURE — Logiciel pharmacie Sénégal' } },
                { '@type': 'Offer', itemOffered: { '@type': 'Service', name: 'LERAL — Application web Dakar' } },
                { '@type': 'Offer', itemOffered: { '@type': 'Service', name: 'GESOM-CCIS — Gestion douanes Sénégal' } },
                { '@type': 'Offer', itemOffered: { '@type': 'Service', name: 'SEN ARCHIV — Archivage numérique' } },
              ],
            },
            sameAs: [
              'https://www.linkedin.com/company/dst-computing',
              'https://www.facebook.com/dstcomputing',
            ],
            openingHoursSpecification: [
              {
                '@type': 'OpeningHoursSpecification',
                dayOfWeek: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                opens: '08:00',
                closes: '18:00',
              },
            ],
            priceRange: '$$',
          }),
        },
      ],
    },
  },

  tailwindcss: {
    configPath: '~/tailwind.config.ts',
    exposeConfig: true,
  },

  nitro: {
    compressPublicAssets: true,
  },
})
