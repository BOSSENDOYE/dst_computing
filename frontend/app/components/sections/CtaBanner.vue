<template>
  <section class="py-24 bg-dst-light relative overflow-hidden">

    <div class="section-container relative z-10">
      <div class="bg-dst-navy rounded-3xl overflow-hidden relative">

        <!-- Déco interne -->
        <div class="absolute inset-0 opacity-5" aria-hidden="true"
          style="background-image: radial-gradient(circle at 1px 1px, white 1px, transparent 0); background-size: 40px 40px;" />
        <div class="absolute -top-20 -right-20 w-72 h-72 bg-dst-orange/15 rounded-full blur-3xl" aria-hidden="true" />
        <div class="absolute -bottom-20 -left-20 w-64 h-64 bg-dst-blue/20 rounded-full blur-3xl" aria-hidden="true" />

        <div class="relative z-10 grid lg:grid-cols-2 gap-0">

          <!-- Gauche : texte + CTA -->
          <div class="px-8 py-12 md:px-14 md:py-16">
            <span class="inline-block bg-dst-orange/15 text-dst-orange text-xs font-semibold tracking-widest uppercase px-4 py-1.5 rounded-full mb-6">
              Démarrons ensemble
            </span>
            <h2 class="font-heading text-3xl md:text-4xl font-bold text-white mb-4 leading-tight">
              Votre projet mérite la<br>
              <span class="text-dst-orange">meilleure solution</span>
            </h2>
            <p class="text-white/60 text-base leading-relaxed mb-8 max-w-md">
              Discutons de vos besoins et construisons ensemble votre outil numérique sur mesure. Devis gratuit sous 24h.
            </p>

            <div class="flex flex-wrap gap-3">
              <NuxtLink
                to="/devis"
                class="inline-flex items-center gap-2 bg-dst-orange hover:bg-orange-500 text-white font-semibold px-7 py-3.5 rounded-xl transition-colors duration-200 text-sm"
              >
                Demander un devis gratuit
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                </svg>
              </NuxtLink>
              <a
                href="https://wa.me/221XXXXXXXXX"
                target="_blank"
                rel="noopener noreferrer"
                class="inline-flex items-center gap-2 border border-white/20 hover:border-white/40 text-white hover:bg-white/5 font-semibold px-7 py-3.5 rounded-xl transition-all duration-200 text-sm"
              >
                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                  <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                </svg>
                WhatsApp
              </a>
            </div>
          </div>

          <!-- Droite : stats -->
          <div class="lg:border-l border-white/10 px-8 py-12 md:px-14 md:py-16 flex items-center">
            <div class="grid grid-cols-2 gap-6 w-full">
              <div
                v-for="stat in stats"
                :key="stat.label"
                class="bg-white/5 hover:bg-white/10 border border-white/10 rounded-2xl p-5 transition-colors duration-200"
              >
                <div class="font-heading text-3xl font-bold mb-1" :class="stat.color">
                  {{ stat.value }}
                </div>
                <div class="text-white/50 text-xs leading-snug">{{ stat.label }}</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup lang="ts">
const stats = [
  { value: '10+', label: 'Années d\'expérience', color: 'text-dst-orange' },
  { value: '50+', label: 'Projets livrés', color: 'text-dst-blue' },
  { value: '30+', label: 'Clients actifs', color: 'text-green-400' },
  { value: '24h', label: 'Réponse garantie', color: 'text-purple-400' },
]
</script>
