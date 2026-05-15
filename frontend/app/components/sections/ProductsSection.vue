<template>
  <section class="py-24 bg-dst-light overflow-hidden">
    <div class="section-container">

      <!-- Bandeau header dégradé -->
      <div class="relative rounded-3xl overflow-hidden mb-12" style="background: linear-gradient(135deg, #1A2A5E 0%, #2563EB 50%, #F97316 100%);">

        <!-- Déco dots -->
        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 1px 1px, white 1px, transparent 0); background-size: 32px 32px;" />
        <!-- Blob -->
        <div class="absolute -top-10 -right-10 w-64 h-64 bg-white/10 rounded-full blur-3xl" />
        <div class="absolute -bottom-10 -left-10 w-48 h-48 bg-black/10 rounded-full blur-3xl" />

        <div class="relative z-10 px-8 md:px-14 py-12">

          <!-- Badge + titre -->
          <div class="text-center mb-10">
            <span class="inline-block bg-white/15 backdrop-blur-sm text-white text-xs font-bold tracking-widest uppercase px-4 py-1.5 rounded-full mb-5 border border-white/20">
              Logiciels métiers
            </span>
            <h2 class="font-heading text-3xl md:text-5xl font-bold text-white leading-tight">
              Nos produits phares
            </h2>
            <p class="text-white/70 mt-3 text-base max-w-xl mx-auto">
              Des solutions opérationnelles pour chaque secteur, maintenues par nos équipes à Dakar.
            </p>
          </div>

          <!-- Stats -->
          <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <div v-for="stat in headerStats" :key="stat.label" class="bg-white/10 backdrop-blur-sm border border-white/15 rounded-2xl px-5 py-4 text-center">
              <div class="font-heading text-3xl font-bold text-white">{{ stat.value }}</div>
              <div class="text-white/60 text-xs mt-1">{{ stat.label }}</div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <!-- Carousel horizontal -->
    <div class="relative">

      <!-- Boutons navigation (desktop) -->
      <button
        class="hidden md:flex absolute left-4 top-1/2 -translate-y-1/2 z-10 w-10 h-10 bg-white shadow-card rounded-full items-center justify-center hover:shadow-card-hover transition-shadow"
        aria-label="Précédent"
        @click="scroll(-1)"
      >
        <svg class="w-5 h-5 text-dst-navy" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
      </button>
      <button
        class="hidden md:flex absolute right-4 top-1/2 -translate-y-1/2 z-10 w-10 h-10 bg-white shadow-card rounded-full items-center justify-center hover:shadow-card-hover transition-shadow"
        aria-label="Suivant"
        @click="scroll(1)"
      >
        <svg class="w-5 h-5 text-dst-navy" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
      </button>

      <!-- Track scrollable -->
      <div
        ref="track"
        class="flex gap-5 overflow-x-auto scroll-smooth snap-x snap-mandatory px-6 md:px-16 pb-4"
        style="scrollbar-width: none; -ms-overflow-style: none;"
      >
        <NuxtLink
          v-for="product in products"
          :key="product.name"
          :to="product.href"
          class="group bg-white rounded-2xl overflow-hidden shadow-card hover:shadow-card-hover
                 transition-all duration-300 hover:-translate-y-1 flex-shrink-0 snap-start
                 w-[280px] sm:w-[320px] md:w-[340px]"
        >
          <!-- Bande couleur -->
          <div class="h-1.5" :class="product.accentColor" />
          <div class="p-6">

            <!-- Secteur + techs -->
            <div class="flex items-center justify-between mb-5">
              <span class="text-xs font-semibold px-3 py-1 rounded-full" :class="product.badgeClass">
                {{ product.sector }}
              </span>
              <div class="flex gap-1">
                <span
                  v-for="tech in product.techs"
                  :key="tech"
                  class="text-xs px-2 py-0.5 bg-gray-100 text-gray-500 rounded-md font-mono"
                >
                  {{ tech }}
                </span>
              </div>
            </div>

            <!-- Nom + tagline -->
            <h3 class="font-heading font-bold text-xl text-dst-navy mb-1 group-hover:text-dst-blue transition-colors">
              {{ product.name }}
            </h3>
            <p class="text-dst-orange font-medium text-sm mb-3">{{ product.tagline }}</p>
            <p class="text-dst-gray text-sm leading-relaxed mb-5">{{ product.description }}</p>

            <!-- Features -->
            <ul class="space-y-1.5 mb-5">
              <li
                v-for="feature in product.features"
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
      </div>

      <!-- Indicateurs dots -->
      <div class="flex justify-center gap-2 mt-6">
        <button
          v-for="(product, i) in products"
          :key="product.name"
          class="h-1.5 rounded-full transition-all duration-300"
          :class="activeIndex === i ? 'w-6 bg-dst-blue' : 'w-1.5 bg-gray-300'"
          :aria-label="`Aller à ${product.name}`"
          @click="scrollToIndex(i)"
        />
      </div>
    </div>

    <!-- CTA -->
    <div class="text-center mt-10">
      <NuxtLink to="/realisations" class="btn-outline">
        Voir toutes nos réalisations
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

const headerStats = [
  { value: '5', label: 'Logiciels livrés' },
  { value: '5+', label: 'Secteurs couverts' },
  { value: '50+', label: 'Clients actifs' },
  { value: '10+', label: 'Années d\'expérience' },
]

const track = ref<HTMLElement | null>(null)
const activeIndex = ref(0)

function scroll(dir: 1 | -1) {
  if (!track.value) return
  const cardWidth = track.value.querySelector('a')?.offsetWidth ?? 340
  track.value.scrollBy({ left: dir * (cardWidth + 20), behavior: 'smooth' })
}

function scrollToIndex(i: number) {
  if (!track.value) return
  const cardWidth = track.value.querySelector('a')?.offsetWidth ?? 340
  track.value.scrollTo({ left: i * (cardWidth + 20), behavior: 'smooth' })
}

let autoTimer: ReturnType<typeof setInterval> | null = null

function startAuto() {
  stopAuto()
  autoTimer = setInterval(() => {
    const next = (activeIndex.value + 1) % products.value.length
    scrollToIndex(next)
  }, 2000)
}

function stopAuto() {
  if (autoTimer) { clearInterval(autoTimer); autoTimer = null }
}

onMounted(() => {
  const el = track.value
  if (!el) return

  el.addEventListener('scroll', () => {
    const cardWidth = el.querySelector('a')?.offsetWidth ?? 340
    activeIndex.value = Math.round(el.scrollLeft / (cardWidth + 20))
  })

  el.addEventListener('mouseenter', stopAuto)
  el.addEventListener('mouseleave', startAuto)
  el.addEventListener('touchstart', stopAuto, { passive: true })
  el.addEventListener('touchend', startAuto, { passive: true })

  startAuto()
})

onUnmounted(() => stopAuto())
</script>

<style scoped>
div::-webkit-scrollbar {
  display: none;
}
</style>
