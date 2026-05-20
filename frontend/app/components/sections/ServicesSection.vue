<template>
  <section class="py-24 bg-dst-light relative overflow-hidden">

    <!-- Déco fond subtile -->
    <div class="absolute -top-40 -right-40 w-96 h-96 bg-dst-blue/8 rounded-full blur-3xl" aria-hidden="true" />
    <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-dst-orange/6 rounded-full blur-3xl" aria-hidden="true" />

    <div class="section-container relative z-10">

      <!-- Header -->
      <div class="text-center mb-16">
        <span class="inline-block bg-dst-blue/10 text-dst-blue text-xs font-semibold tracking-widest uppercase px-4 py-1.5 rounded-full mb-4">
          Nos expertises
        </span>
        <h2 class="font-heading text-3xl md:text-4xl font-bold text-dst-navy mb-4">
          Des solutions pour <span class="text-dst-orange">chaque besoin</span>
        </h2>
        <p class="text-dst-gray max-w-2xl mx-auto text-base leading-relaxed">
          De la conception à la maintenance, DST Computing accompagne votre transformation digitale avec des technologies éprouvées.
        </p>
      </div>

      <!-- Grille -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <NuxtLink
          v-for="service in services"
          :key="service.title"
          :to="service.href"
          class="group relative bg-white border border-gray-100 hover:border-dst-blue/30
                 rounded-2xl p-6 shadow-card hover:shadow-card-hover
                 transition-all duration-300 hover:-translate-y-1.5 cursor-pointer"
        >
          <!-- Accent top bar -->
          <div class="absolute top-0 left-0 right-0 h-1 rounded-t-2xl transition-all duration-300 opacity-0 group-hover:opacity-100"
            :class="service.accentBar" />

          <!-- Icône -->
          <div class="w-12 h-12 rounded-xl flex items-center justify-center mb-5 transition-all duration-300 group-hover:scale-110"
            :class="service.iconBg">
            <svg class="w-6 h-6" :class="service.iconColor" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path :d="service.iconPath" />
            </svg>
          </div>

          <!-- Titre -->
          <h3 class="font-heading font-semibold text-dst-navy text-base mb-2 group-hover:text-dst-blue transition-colors">
            {{ service.title }}
          </h3>

          <!-- Description -->
          <p class="text-dst-gray text-sm leading-relaxed">
            {{ service.description }}
          </p>

          <!-- Arrow -->
          <div class="mt-4 flex items-center gap-1 text-dst-orange opacity-0 group-hover:opacity-100 transition-all duration-300 text-xs font-semibold">
            En savoir plus
            <svg class="w-3.5 h-3.5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
          </div>
        </NuxtLink>
      </div>

      <!-- CTA -->
      <div class="text-center mt-12">
        <NuxtLink to="/services" class="btn-outline">
          Voir tous nos services
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
          </svg>
        </NuxtLink>
      </div>
    </div>
  </section>
</template>

<script setup lang="ts">
const config = useRuntimeConfig()

const { data: rawServices } = await useFetch<any[]>(`${config.public.apiBase}/v1/services`)

const services = computed(() => (rawServices.value ?? []).map((s: any) => ({
  title: s.titre,
  description: s.description,
  iconPath: s.icon_path,
  iconBg: s.icon_bg,
  iconColor: s.icon_color,
  accentBar: s.accent_bar,
  href: s.href,
})))
</script>
