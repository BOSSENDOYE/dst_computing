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
      title: 'DST Computing | Solutions IT & Logiciels Métiers — Dakar, Sénégal',
      meta: [
        {
          name: 'description',
          content:
            'DST Computing — Développement logiciel, agents IA, infrastructure IT à Dakar, Sénégal. SAYCURE, LERAL, GESOM-CCIS et plus.',
        },
        { name: 'theme-color', content: '#1A2A5E' },
        { property: 'og:type', content: 'website' },
        { property: 'og:site_name', content: 'DST Computing' },
        { property: 'og:locale', content: 'fr_SN' },
      ],
      link: [
        { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' },
        { rel: 'preconnect', href: 'https://fonts.googleapis.com' },
        { rel: 'preconnect', href: 'https://fonts.gstatic.com', crossorigin: '' },
        {
          rel: 'stylesheet',
          href: 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Poppins:wght@600;700;800&display=swap',
          // display=swap déjà inclus dans l'URL
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
