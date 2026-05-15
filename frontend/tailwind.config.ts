import type { Config } from 'tailwindcss'

export default {
  content: [
    './components/**/*.{js,vue,ts}',
    './layouts/**/*.vue',
    './pages/**/*.vue',
    './plugins/**/*.{js,ts}',
    './app.vue',
    './error.vue',
  ],
  theme: {
    extend: {
      colors: {
        // Charte DST Computing
        'dst-navy': '#1A2A5E',      // Bleu foncé — autorité, confiance
        'dst-blue': '#2563EB',      // Bleu vif — tech, action
        'dst-orange': '#F97316',    // Orange — énergie, CTA
        'dst-light': '#F0F4FF',     // Fond clair bleuté
        'dst-dark': '#0F1A3E',      // Bleu très foncé — hero background
        'dst-gray': '#64748B',      // Texte secondaire
      },
      fontFamily: {
        sans: ['Inter', 'system-ui', 'sans-serif'],
        heading: ['Poppins', 'Inter', 'sans-serif'],
      },
      fontSize: {
        'display': ['3.5rem', { lineHeight: '1.1', fontWeight: '800' }],
        'hero': ['2.75rem', { lineHeight: '1.15', fontWeight: '700' }],
      },
      boxShadow: {
        'card': '0 4px 24px rgba(26, 42, 94, 0.08)',
        'card-hover': '0 8px 40px rgba(26, 42, 94, 0.16)',
        'cta': '0 4px 20px rgba(249, 115, 22, 0.35)',
      },
      backgroundImage: {
        'hero-pattern': 'linear-gradient(135deg, #0F1A3E 0%, #1A2A5E 50%, #1e3a8a 100%)',
        'section-gradient': 'linear-gradient(180deg, #F0F4FF 0%, #FFFFFF 100%)',
      },
      animation: {
        'fade-in-up': 'fadeInUp 0.6s ease-out forwards',
        'count-up': 'countUp 2s ease-out forwards',
        'slide-in': 'slideIn 0.5s ease-out forwards',
      },
      keyframes: {
        fadeInUp: {
          '0%': { opacity: '0', transform: 'translateY(30px)' },
          '100%': { opacity: '1', transform: 'translateY(0)' },
        },
        slideIn: {
          '0%': { opacity: '0', transform: 'translateX(-20px)' },
          '100%': { opacity: '1', transform: 'translateX(0)' },
        },
      },
      container: {
        center: true,
        padding: {
          DEFAULT: '1rem',
          sm: '1.5rem',
          lg: '2rem',
          xl: '2rem',
          '2xl': '2rem',
        },
        screens: {
          sm: '640px',
          md: '768px',
          lg: '1024px',
          xl: '1280px',
          '2xl': '1440px',
        },
      },
    },
  },
  plugins: [],
} satisfies Config
