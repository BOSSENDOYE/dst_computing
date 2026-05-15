<template>
  <div class="min-h-screen">

    <!-- ═══════════════════════════════════════════
         HERO
    ═══════════════════════════════════════════ -->
    <section class="relative bg-dst-navy pt-32 pb-20 overflow-hidden">
      <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle at 1px 1px, white 1px, transparent 0); background-size: 40px 40px;" />
      <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-dst-orange/10 rounded-full blur-3xl" />
      <div class="absolute bottom-0 left-0 w-80 h-80 bg-dst-blue/20 rounded-full blur-3xl" />

      <div class="section-container relative z-10 text-center">
        <span class="inline-block bg-white/10 text-white/80 text-xs font-bold tracking-widest uppercase px-4 py-1.5 rounded-full mb-6 border border-white/15">
          Nos expertises
        </span>
        <h1 class="font-heading text-4xl md:text-6xl font-bold text-white leading-tight mb-6">
          Des solutions sur-mesure<br>
          <span class="text-dst-orange">pour chaque besoin</span>
        </h1>
        <p class="text-white/65 text-lg max-w-2xl mx-auto mb-10">
          De la conception à la maintenance, DST Computing vous accompagne à chaque étape de votre transformation numérique.
        </p>
        <NuxtLink to="/devis"
          class="inline-flex items-center gap-2 bg-dst-orange hover:bg-orange-500 text-white font-semibold px-8 py-4 rounded-xl transition-colors text-sm">
          Demander un devis gratuit
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
        </NuxtLink>
      </div>
    </section>

    <!-- ═══════════════════════════════════════════
         SERVICES
    ═══════════════════════════════════════════ -->
    <section class="py-24 bg-dst-light">
      <div class="section-container">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div
            v-for="service in services"
            :key="service.id"
            class="group bg-white rounded-2xl shadow-card hover:shadow-card-hover transition-all duration-300 hover:-translate-y-1 overflow-hidden"
          >
            <!-- Bande accent -->
            <div class="h-1" :class="service.accent" />

            <div class="p-8">
              <div class="flex items-start gap-5 mb-5">
                <!-- Icône -->
                <div class="w-14 h-14 rounded-2xl flex items-center justify-center flex-shrink-0 transition-transform duration-300 group-hover:scale-110" :class="service.iconBg">
                  <svg class="w-7 h-7" :class="service.iconColor" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path :d="service.iconPath" />
                  </svg>
                </div>
                <!-- Numéro -->
                <div class="ml-auto font-heading text-5xl font-bold text-gray-100 group-hover:text-gray-200 transition-colors select-none leading-none">
                  {{ String(service.id).padStart(2, '0') }}
                </div>
              </div>

              <h2 class="font-heading text-xl font-bold text-dst-navy mb-2 group-hover:text-dst-blue transition-colors">
                {{ service.title }}
              </h2>
              <p class="text-dst-gray text-sm leading-relaxed mb-5">{{ service.description }}</p>

              <ul class="grid grid-cols-2 gap-x-4 gap-y-2 mb-6">
                <li v-for="item in service.items" :key="item" class="flex items-center gap-2 text-xs text-gray-600">
                  <svg class="w-3.5 h-3.5 flex-shrink-0" :class="service.iconColor" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                  </svg>
                  {{ item }}
                </li>
              </ul>

              <NuxtLink to="/devis" class="inline-flex items-center gap-1.5 text-sm font-semibold transition-colors" :class="service.linkColor">
                Demander un devis
                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
              </NuxtLink>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ═══════════════════════════════════════════
         POURQUOI DST
    ═══════════════════════════════════════════ -->
    <section class="py-24 bg-dst-navy relative overflow-hidden">
      <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle at 1px 1px, white 1px, transparent 0); background-size: 40px 40px;" />
      <div class="absolute -right-20 top-0 w-80 h-80 bg-dst-orange/10 rounded-full blur-3xl" />

      <div class="section-container relative z-10">
        <div class="text-center mb-14">
          <span class="inline-block bg-dst-orange/15 text-dst-orange text-xs font-bold tracking-widest uppercase px-4 py-1.5 rounded-full mb-4">
            Notre différence
          </span>
          <h2 class="font-heading text-3xl md:text-4xl font-bold text-white">
            Pourquoi choisir DST Computing ?
          </h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
          <div
            v-for="avantage in avantages"
            :key="avantage.title"
            class="group bg-white/5 hover:bg-white/10 border border-white/10 hover:border-white/20 rounded-2xl p-6 text-center transition-all duration-300"
          >
            <div class="w-14 h-14 rounded-2xl flex items-center justify-center mx-auto mb-5 transition-transform duration-300 group-hover:scale-110" :class="avantage.iconBg">
              <svg class="w-7 h-7" :class="avantage.iconColor" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <path :d="avantage.iconPath" />
              </svg>
            </div>
            <h3 class="font-heading font-bold text-white mb-2 group-hover:text-dst-orange transition-colors">{{ avantage.title }}</h3>
            <p class="text-white/50 text-sm leading-relaxed group-hover:text-white/70 transition-colors">{{ avantage.text }}</p>
          </div>
        </div>
      </div>
    </section>

    <!-- ═══════════════════════════════════════════
         CTA
    ═══════════════════════════════════════════ -->
    <section class="py-24 bg-dst-light">
      <div class="section-container">
        <div class="relative bg-dst-navy rounded-3xl overflow-hidden px-8 md:px-16 py-14 text-center">
          <div class="absolute -top-16 -right-16 w-64 h-64 bg-dst-orange/10 rounded-full blur-3xl" />
          <div class="absolute -bottom-16 -left-16 w-64 h-64 bg-dst-blue/20 rounded-full blur-3xl" />
          <div class="relative z-10">
            <h2 class="font-heading text-3xl md:text-4xl font-bold text-white mb-4">
              Prêt à démarrer votre projet ?
            </h2>
            <p class="text-white/60 mb-8 max-w-xl mx-auto text-base">
              Obtenez une estimation gratuite sous 24h. Notre équipe analyse votre besoin et vous propose la solution la plus adaptée.
            </p>
            <div class="flex flex-wrap gap-3 justify-center">
              <NuxtLink to="/devis"
                class="inline-flex items-center gap-2 bg-dst-orange hover:bg-orange-500 text-white font-semibold px-7 py-3.5 rounded-xl transition-colors text-sm">
                Demande de devis gratuit
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
              </NuxtLink>
              <NuxtLink to="/contact"
                class="inline-flex items-center gap-2 border border-white/20 hover:border-white/40 text-white hover:bg-white/5 font-semibold px-7 py-3.5 rounded-xl transition-all text-sm">
                Nous contacter
              </NuxtLink>
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>
</template>

<script setup lang="ts">
useSeoMeta({
  title: 'Nos Services — DST Computing',
  description: 'Développement logiciel, applications web & mobile, infrastructure IT, intelligence artificielle, formation — DST Computing vous accompagne dans votre transformation numérique.',
})

const config = useRuntimeConfig()

const { data: rawServices } = await useFetch<any[]>(`${config.public.apiBase}/v1/services`)

const services = computed(() => (rawServices.value ?? []).map((s: any) => ({
  id: s.id,
  accent: s.accent_bar,
  iconBg: s.icon_bg,
  iconColor: s.icon_color,
  linkColor: s.link_color,
  title: s.titre,
  description: s.description,
  iconPath: s.icon_path,
  items: s.items ?? [],
})))

const avantages = [
  {
    title: 'Ancrage local',
    text: 'Basés à Dakar, nous connaissons les réalités du marché ouest-africain.',
    iconBg: 'bg-dst-blue/20',
    iconColor: 'text-dst-blue',
    iconPath: 'M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z M15 11a3 3 0 11-6 0 3 3 0 016 0z',
  },
  {
    title: 'Réactivité',
    text: 'Réponse sous 24h et déploiements rapides, sans bureaucratie.',
    iconBg: 'bg-dst-orange/20',
    iconColor: 'text-dst-orange',
    iconPath: 'M13 10V3L4 14h7v7l9-11h-7z',
  },
  {
    title: 'Fiabilité',
    text: 'Code de qualité, tests rigoureux et suivi post-déploiement.',
    iconBg: 'bg-green-500/20',
    iconColor: 'text-green-400',
    iconPath: 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
  },
  {
    title: 'Scalabilité',
    text: 'Des solutions qui grandissent avec votre activité sans tout refaire.',
    iconBg: 'bg-purple-500/20',
    iconColor: 'text-purple-400',
    iconPath: 'M13 7h8m0 0v8m0-8l-8 8-4-4-6 6',
  },
]
</script>
