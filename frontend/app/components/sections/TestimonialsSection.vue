<template>
  <section class="py-24 bg-white overflow-hidden">
    <div class="section-container">
      <div class="text-center mb-12">
        <span class="inline-block bg-dst-blue/10 text-dst-blue text-xs font-bold tracking-widest uppercase px-4 py-1.5 rounded-full mb-5">
          Témoignages
        </span>
        <h2 class="font-heading text-3xl md:text-4xl font-bold text-dst-navy mb-4">
          Ce que disent <span class="text-dst-blue">nos clients</span>
        </h2>

        <!-- Séparateur déco -->
        <div class="flex items-center justify-center gap-3 mb-5">
          <div class="h-px w-16 bg-gray-200" />
          <div class="flex gap-1">
            <span class="w-1.5 h-1.5 rounded-full bg-dst-orange" />
            <span class="w-1.5 h-1.5 rounded-full bg-dst-blue" />
            <span class="w-1.5 h-1.5 rounded-full bg-dst-orange" />
          </div>
          <div class="h-px w-16 bg-gray-200" />
        </div>

        <!-- Stats inline -->
        <div class="inline-flex flex-wrap justify-center gap-6 text-sm">
          <span class="flex items-center gap-2 text-dst-gray">
            <span class="font-heading font-bold text-lg text-dst-blue">30+</span> clients satisfaits
          </span>
          <span class="text-gray-300">|</span>
          <span class="flex items-center gap-2 text-dst-gray">
            <span class="font-heading font-bold text-lg text-dst-orange">5★</span> note moyenne
          </span>
          <span class="text-gray-300">|</span>
          <span class="flex items-center gap-2 text-dst-gray">
            <span class="font-heading font-bold text-lg text-green-600">95%</span> taux de fidélité
          </span>
        </div>
      </div>
    </div>

    <!-- Carousel -->
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
        <div
          v-for="testimonial in testimonials"
          :key="testimonial.name"
          class="bg-white rounded-2xl border border-gray-100 shadow-card p-6 relative
                 flex-shrink-0 snap-start w-[280px] sm:w-[320px] md:w-[380px]"
        >
          <!-- Guillemets déco -->
          <div class="absolute -top-4 left-8 text-dst-blue/20 text-8xl font-serif leading-none select-none">"</div>

          <!-- Étoiles -->
          <div class="flex gap-1 mb-4">
            <svg v-for="i in 5" :key="i" class="w-4 h-4 text-dst-orange fill-current" viewBox="0 0 20 20">
              <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
            </svg>
          </div>

          <!-- Témoignage -->
          <p class="text-gray-600 text-sm leading-relaxed mb-6 italic relative z-10">
            "{{ testimonial.text }}"
          </p>

          <!-- Auteur -->
          <div class="flex items-center gap-3">
            <div
              class="w-11 h-11 rounded-full flex items-center justify-center text-white font-bold text-lg flex-shrink-0"
              :class="testimonial.avatarBg"
            >
              {{ testimonial.name[0] }}
            </div>
            <div>
              <p class="font-semibold text-dst-navy text-sm">{{ testimonial.name }}</p>
              <p class="text-dst-gray text-xs">{{ testimonial.role }} — {{ testimonial.company }}</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Dots -->
      <div class="flex justify-center gap-2 mt-6">
        <button
          v-for="(t, i) in testimonials"
          :key="t.name"
          class="h-1.5 rounded-full transition-all duration-300"
          :class="activeIndex === i ? 'w-6 bg-dst-blue' : 'w-1.5 bg-gray-300'"
          :aria-label="`Aller à ${t.name}`"
          @click="scrollToIndex(i)"
        />
      </div>
    </div>
  </section>
</template>

<script setup lang="ts">
const config = useRuntimeConfig()

const { data: rawTestimonials } = await useFetch<any[]>(`${config.public.apiBase}/v1/temoignages`)

const testimonials = computed(() => (rawTestimonials.value ?? []).map((t: any) => ({
  name: t.name,
  role: t.role,
  company: t.company,
  avatarBg: t.avatar_bg,
  text: t.text,
})))

const track = ref<HTMLElement | null>(null)
const activeIndex = ref(0)

function scroll(dir: 1 | -1) {
  if (!track.value) return
  const cardWidth = track.value.querySelector('div')?.offsetWidth ?? 380
  track.value.scrollBy({ left: dir * (cardWidth + 20), behavior: 'smooth' })
}

function scrollToIndex(i: number) {
  if (!track.value) return
  const cardWidth = track.value.querySelector('div')?.offsetWidth ?? 380
  track.value.scrollTo({ left: i * (cardWidth + 20), behavior: 'smooth' })
}

let autoTimer: ReturnType<typeof setInterval> | null = null

function startAuto() {
  stopAuto()
  autoTimer = setInterval(() => {
    const next = (activeIndex.value + 1) % testimonials.value.length
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
    const cardWidth = el.querySelector('div')?.offsetWidth ?? 380
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
