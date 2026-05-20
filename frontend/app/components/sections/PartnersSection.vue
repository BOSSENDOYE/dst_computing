<template>
  <section class="py-16 bg-white border-t border-gray-100 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-10 text-center">
      <p class="text-sm font-semibold uppercase tracking-widest text-dst-blue mb-2">Ils nous font confiance</p>
      <h2 class="text-2xl sm:text-3xl font-bold text-dst-navy">
        Nos partenaires &amp; clients
      </h2>
    </div>

    <!-- Marquee wrapper: mask edges with gradient -->
    <div
      class="relative"
      style="mask-image: linear-gradient(to right, transparent 0%, black 8%, black 92%, transparent 100%);
             -webkit-mask-image: linear-gradient(to right, transparent 0%, black 8%, black 92%, transparent 100%);"
    >
      <div class="flex gap-0 marquee-track" aria-hidden="false">
        <!-- Duplicate the list twice so the loop is seamless -->
        <template v-for="pass in 2" :key="pass">
          <div
            v-for="partner in partners"
            :key="`${pass}-${partner.id}`"
            class="partner-card flex-shrink-0 mx-4"
          >
            <a
              :href="partner.site_url || '#'"
              :target="partner.site_url ? '_blank' : undefined"
              rel="noopener noreferrer"
              class="group flex flex-col items-center justify-center gap-2 w-40 h-24 px-4
                     rounded-xl border border-gray-100 bg-white shadow-sm
                     hover:shadow-md hover:border-dst-blue/30 transition-all duration-300"
              :title="partner.nom"
            >
              <!-- Logo image or fallback text -->
              <img
                v-if="partner.logo_url"
                :src="partner.logo_url"
                :alt="partner.nom"
                class="h-10 w-auto object-contain filter grayscale group-hover:grayscale-0 transition-all duration-300"
                loading="lazy"
              />
              <span
                v-if="!partner.logo_url"
                class="text-xs font-bold text-gray-400 group-hover:text-dst-blue transition-colors duration-300 text-center leading-tight"
              >{{ partner.nom }}</span>
            </a>
          </div>
        </template>
      </div>
    </div>

    <!-- Pause on hover hint -->
    <p class="text-center text-xs text-gray-400 mt-8">
      Passez la souris pour pause le défilement
    </p>
  </section>
</template>

<script setup lang="ts">
const config = useRuntimeConfig()

const { data: rawPartenaires } = await useFetch<any[]>(
  `${config.public.apiBase}/v1/partenaires`
)

const partners = computed(() => rawPartenaires.value ?? [])
</script>

<style scoped>
/* Infinite marquee animation */
@keyframes marquee {
  0%   { transform: translateX(0); }
  100% { transform: translateX(-50%); }
}

.marquee-track {
  width: max-content;
  animation: marquee 28s linear infinite;
}

/* Pause on hover */
.marquee-track:hover {
  animation-play-state: paused;
}
</style>
