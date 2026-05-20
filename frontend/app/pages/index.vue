<template>
  <div>
    <HeroSection />
    <ServicesSection />
    <ProductsSection />
    <TestimonialsSection />
    <PartnersSection />
    <CtaBanner />
  </div>
</template>

<script setup lang="ts">
useSeoMeta({
  title: 'Société Informatique à Dakar — Logiciels Métiers, IA & Infrastructure IT',
  description: 'DST Computing, votre prestataire informatique à Dakar, Sénégal. Développement logiciel sur mesure, applications web & mobile, agents IA, ERP, CRM et infrastructure IT pour les entreprises d\'Afrique de l\'Ouest. Devis gratuit sous 24h.',
  keywords: 'société informatique Dakar, prestataire IT Sénégal, développement logiciel Dakar, logiciel métier Sénégal, application web Dakar, application mobile Sénégal, intelligence artificielle Dakar, infrastructure IT Sénégal, ERP Dakar, CRM Sénégal, DST Computing, transformation numérique Afrique',
  ogTitle: 'DST Computing — Société Informatique à Dakar, Sénégal',
  ogDescription: 'Logiciels métiers, applications web & mobile, agents IA et infrastructure IT pour les entreprises du Sénégal et de la CEDEAO. Devis gratuit sous 24h.',
  ogImage: 'https://www.dstcomputing.sn/og-image.jpg',
  ogUrl: 'https://www.dstcomputing.sn',
  twitterTitle: 'DST Computing — Solutions IT à Dakar, Sénégal',
  twitterDescription: 'Développement logiciel, IA et infrastructure IT pour les entreprises d\'Afrique de l\'Ouest.',
  twitterImage: 'https://www.dstcomputing.sn/og-image.jpg',
})

useHead({
  link: [{ rel: 'canonical', href: 'https://www.dstcomputing.sn' }],
  script: [{
    type: 'application/ld+json',
    innerHTML: JSON.stringify({
      '@context': 'https://schema.org',
      '@type': 'WebSite',
      name: 'DST Computing',
      url: 'https://www.dstcomputing.sn',
      potentialAction: {
        '@type': 'SearchAction',
        target: 'https://www.dstcomputing.sn/blog?q={search_term_string}',
        'query-input': 'required name=search_term_string',
      },
    }),
  }],
})
</script>
