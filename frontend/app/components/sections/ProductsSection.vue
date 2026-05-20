<template>
  <section class="py-24 bg-white overflow-hidden">
    <div class="section-container">

      <!-- Bandeau header navy sobre -->
      <div class="relative rounded-3xl overflow-hidden mb-12" style="background: linear-gradient(135deg, #0F1A3E 0%, #1A2A5E 60%, #1e3a8a 100%);">

        <!-- Déco dots subtile -->
        <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle at 1px 1px, white 1px, transparent 0); background-size: 32px 32px;" />
        <!-- Accent orange coin droit -->
        <div class="absolute -top-12 -right-12 w-56 h-56 bg-dst-orange/20 rounded-full blur-3xl" />
        <!-- Accent bleu coin gauche bas -->
        <div class="absolute -bottom-12 -left-12 w-48 h-48 bg-dst-blue/30 rounded-full blur-3xl" />

        <div class="relative z-10 px-8 md:px-14 py-12">

          <!-- Badge + titre -->
          <div class="text-center mb-10">
            <span class="inline-block bg-dst-orange/20 text-dst-orange text-xs font-bold tracking-widest uppercase px-4 py-1.5 rounded-full mb-5 border border-dst-orange/30">
              Logiciels métiers
            </span>
            <h2 class="font-heading text-3xl md:text-5xl font-bold text-white leading-tight">
              Nos produits <span class="text-dst-orange">phares</span>
            </h2>
            <p class="text-white/65 mt-3 text-base max-w-xl mx-auto">
              Des solutions opérationnelles pour chaque secteur, maintenues par nos équipes à Dakar.
            </p>
          </div>

          <!-- Stats -->
          <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <div v-for="stat in headerStats" :key="stat.label" class="bg-white/8 backdrop-blur-sm border border-white/10 rounded-2xl px-5 py-4 text-center">
              <div class="font-heading text-3xl font-bold text-dst-orange">{{ stat.value }}</div>
              <div class="text-white/60 text-xs mt-1">{{ stat.label }}</div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <!-- Marquee infini -->
    <div
      class="relative"
      style="mask-image: linear-gradient(to right, transparent 0%, black 6%, black 94%, transparent 100%);
             -webkit-mask-image: linear-gradient(to right, transparent 0%, black 6%, black 94%, transparent 100%);"
    >
      <div class="flex marquee-track">
        <template v-for="pass in 2" :key="pass">
          <NuxtLink
            v-for="product in products"
            :key="`${pass}-${product.name}`"
            :to="product.href"
            class="group bg-white rounded-2xl overflow-hidden shadow-card hover:shadow-card-hover
                   transition-all duration-300 hover:-translate-y-1.5 flex-shrink-0
                   w-[300px] mx-3"
          >
            <!-- Bande couleur top -->
            <div class="h-1.5" :class="product.accentColor" />
            <div class="p-6">

              <!-- Secteur + techs -->
              <div class="flex items-center justify-between mb-4">
                <span class="text-xs font-semibold px-3 py-1 rounded-full" :class="product.badgeClass">
                  {{ product.sector }}
                </span>
                <div class="flex gap-1 flex-wrap justify-end">
                  <span
                    v-for="tech in product.techs.slice(0,2)"
                    :key="tech"
                    class="text-xs px-2 py-0.5 bg-gray-100 text-gray-500 rounded-md font-mono"
                  >{{ tech }}</span>
                </div>
              </div>

              <!-- Nom + tagline -->
              <h3 class="font-heading font-bold text-lg text-dst-navy mb-1 group-hover:text-dst-blue transition-colors">
                {{ product.name }}
              </h3>
              <p class="text-dst-orange font-medium text-sm mb-3">{{ product.tagline }}</p>
              <p class="text-dst-gray text-sm leading-relaxed mb-4 line-clamp-3">{{ product.description }}</p>

              <!-- Features -->
              <ul class="space-y-1.5 mb-4">
                <li
                  v-for="feature in product.features.slice(0,3)"
                  :key="feature"
                  class="flex items-center gap-2 text-sm text-gray-600"
                >
                  <svg class="w-4 h-4 text-dst-blue flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                  </svg>
                  {{ feature }}
                </li>
              </ul>

              <!-- Lien -->
              <span class="inline-flex items-center gap-1.5 text-dst-blue font-semibold text-sm group-hover:text-dst-orange transition-colors">
                Découvrir {{ product.name }}
                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                </svg>
              </span>
            </div>
          </NuxtLink>
        </template>
      </div>
    </div>

    <!-- CTA -->
    <div class="text-center mt-10">
      <NuxtLink
        to="/realisations"
        class="group inline-flex items-center gap-3 font-bold text-base px-8 py-4 rounded-full border-2 border-dst-navy text-dst-navy transition-all duration-300 hover:bg-dst-navy hover:text-white hover:-translate-y-1 hover:shadow-lg"
      >
        Voir toutes nos réalisations
        <span class="w-8 h-8 rounded-full border border-dst-navy/40 flex items-center justify-center group-hover:border-white/40 transition-colors">
          <svg class="w-4 h-4 group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6" />
          </svg>
        </span>
      </NuxtLink>
    </div>
  </section>
</template>

<script setup lang="ts">
const config = useRuntimeConfig()

const { data: rawProducts } = await useFetch<any[]>(`${config.public.apiBase}/v1/produits`)

const products = computed(() => (rawProducts.value ?? []).map((p: any) => ({
  name: p.nom,
  tagline: p.tagline,
  sector: p.secteur,
  description: p.description,
  techs: p.techs ?? [],
  features: p.features ?? [],
  href: p.href,
  accentColor: p.accent_color,
  badgeClass: p.badge_class,
})))

const { data: rawHeaderStats } = await useFetch<any[]>(`${config.public.apiBase}/v1/stats?contexte=produits`)
const headerStats = computed(() => (rawHeaderStats.value ?? []).map((s: any) => ({ value: s.valeur, label: s.label })))
</script>

<style scoped>
@keyframes marquee {
  0%   { transform: translateX(0); }
  100% { transform: translateX(-50%); }
}

.marquee-track {
  width: max-content;
  animation: marquee 35s linear infinite;
}

.marquee-track:hover {
  animation-play-state: paused;
}
</style>
