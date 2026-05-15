<template>
  <section class="relative min-h-screen flex items-center bg-hero-pattern overflow-hidden">

    <!-- Grille décorative en fond -->
    <div class="absolute inset-0 opacity-10" aria-hidden="true">
      <div class="absolute inset-0" style="background-image: radial-gradient(circle at 1px 1px, white 1px, transparent 0); background-size: 40px 40px;" />
    </div>

    <!-- Formes décoratives -->
    <div class="absolute top-20 right-0 w-96 h-96 bg-dst-blue/20 rounded-full blur-3xl" aria-hidden="true" />
    <div class="absolute bottom-10 left-10 w-64 h-64 bg-dst-orange/10 rounded-full blur-3xl" aria-hidden="true" />

    <div class="section-container relative z-10 pt-32 pb-20">
      <div class="max-w-4xl">

        <!-- Badge -->
        <div class="inline-flex items-center gap-2 bg-white/10 border border-white/20 text-white/90
                    text-sm font-medium px-4 py-2 rounded-full mb-8 animate-fade-in-up">
          <span class="w-2 h-2 bg-dst-orange rounded-full animate-pulse" />
          Solutions IT & Agents IA — Dakar, Sénégal
        </div>

        <!-- Titre principal -->
        <h1 class="font-heading text-5xl md:text-6xl lg:text-7xl font-bold text-white leading-tight mb-6 animate-fade-in-up animate-delay-100">
          Nous Transformons vos
          <span class="text-dst-orange">Défis Numériques</span>
          en Solutions Concrètes
        </h1>

        <!-- Sous-titre -->
        <p class="text-xl text-white/75 max-w-2xl mb-10 leading-relaxed animate-fade-in-up animate-delay-200">
          Logiciels métiers, applications mobiles, agents IA et infrastructure IT sur mesure pour les entreprises d'Afrique de l'Ouest.
        </p>

        <!-- CTA buttons -->
        <div class="flex flex-wrap gap-4 mb-16 animate-fade-in-up animate-delay-300">
          <NuxtLink to="/services" class="btn-primary text-base px-8 py-4">
            Voir nos services
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
            </svg>
          </NuxtLink>
          <NuxtLink to="/devis" class="btn-secondary text-base px-8 py-4">
            Demander un devis gratuit
          </NuxtLink>
        </div>

        <!-- Stats rapides -->
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-6 animate-fade-in-up animate-delay-400">
          <div
            v-for="stat in stats"
            :key="stat.label"
            class="text-center"
          >
            <p class="font-heading text-3xl font-bold text-white mb-1">{{ stat.value }}</p>
            <p class="text-white/60 text-sm">{{ stat.label }}</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Vague de transition -->
    <div class="absolute bottom-0 left-0 right-0" aria-hidden="true">
      <svg viewBox="0 0 1440 80" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0 80L60 72C120 64 240 48 360 42.7C480 37 600 42 720 48C840 54 960 59 1080 56C1200 53 1320 43 1380 37.3L1440 32V80H1380C1320 80 1200 80 1080 80C960 80 840 80 720 80C600 80 480 80 360 80C240 80 120 80 60 80H0Z" fill="white"/>
      </svg>
    </div>
  </section>
</template>

<script setup lang="ts">
const stats = [
  { value: '6+', label: "Ans d'expérience" },
  { value: '50+', label: 'Projets livrés' },
  { value: '30+', label: 'Clients actifs' },
  { value: '5', label: 'Secteurs couverts' },
]
</script>
