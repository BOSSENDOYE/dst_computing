<template>
  <header
    :class="[
      'fixed top-0 left-0 right-0 z-50 transition-all duration-300',
      isScrolled ? 'bg-white shadow-sm' : 'bg-transparent',
    ]"
  >
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
      <div class="flex items-center justify-between h-16 md:h-20">

        <!-- Logo -->
        <NuxtLink to="/" class="flex items-center gap-2 flex-shrink-0 group">
          <div class="w-8 h-8 md:w-9 md:h-9 bg-dst-blue rounded-lg flex items-center justify-center group-hover:bg-dst-orange transition-colors duration-200">
            <span class="text-white font-heading font-bold text-xs">DST</span>
          </div>
          <span :class="['font-heading font-bold text-base md:text-lg', isScrolled ? 'text-dst-navy' : 'text-white']">
            DST Computing
          </span>
        </NuxtLink>

        <!-- Nav desktop (lg+) -->
        <nav class="hidden lg:flex items-center gap-5 xl:gap-7">
          <NuxtLink
            v-for="item in navItems"
            :key="item.href"
            :to="item.href"
            :class="[
              'text-sm font-medium transition-colors duration-200 relative group whitespace-nowrap',
              isScrolled ? 'text-gray-600 hover:text-dst-blue' : 'text-white/80 hover:text-white',
            ]"
            active-class="!text-dst-blue font-semibold"
          >
            {{ item.label }}
            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-dst-orange group-hover:w-full transition-all duration-200 rounded-full" />
          </NuxtLink>
        </nav>

        <!-- Droite : CTA + hamburger -->
        <div class="flex items-center gap-2 sm:gap-3">
          <NuxtLink
            to="/devis"
            class="hidden md:inline-flex items-center bg-dst-orange hover:bg-orange-500 text-white text-sm font-semibold px-4 py-2 md:px-5 md:py-2.5 rounded-xl transition-colors duration-200 whitespace-nowrap"
          >
            Devis gratuit
          </NuxtLink>

          <!-- Hamburger -->
          <button
            class="lg:hidden w-10 h-10 flex items-center justify-center rounded-xl transition-colors"
            :class="isScrolled ? 'text-dst-navy hover:bg-gray-100' : 'text-white hover:bg-white/10'"
            aria-label="Ouvrir le menu"
            @click="mobileOpen = !mobileOpen"
          >
            <svg v-if="!mobileOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <svg v-else class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Overlay -->
    <Transition name="fade">
      <div
        v-if="mobileOpen"
        class="fixed inset-0 bg-black/40 z-[-1] lg:hidden"
        @click="mobileOpen = false"
      />
    </Transition>

    <!-- Drawer mobile -->
    <Transition name="slide">
      <div
        v-if="mobileOpen"
        class="lg:hidden absolute top-full left-0 right-0 bg-white shadow-xl border-t border-gray-100"
      >
        <nav class="px-4 py-4 flex flex-col">
          <NuxtLink
            v-for="item in navItems"
            :key="item.href"
            :to="item.href"
            class="flex items-center gap-3 px-4 py-3.5 rounded-xl text-gray-700 font-medium hover:bg-dst-light hover:text-dst-blue transition-colors text-base"
            active-class="bg-dst-light text-dst-blue font-semibold"
            @click="mobileOpen = false"
          >
            <span class="w-1.5 h-1.5 rounded-full bg-dst-orange flex-shrink-0" />
            {{ item.label }}
          </NuxtLink>

          <div class="mt-4 pt-4 border-t border-gray-100">
            <NuxtLink
              to="/devis"
              class="flex items-center justify-center bg-dst-orange hover:bg-orange-500 text-white font-semibold py-3.5 rounded-xl transition-colors text-base"
              @click="mobileOpen = false"
            >
              Demander un devis gratuit
            </NuxtLink>
          </div>
        </nav>
      </div>
    </Transition>
  </header>
</template>

<script setup lang="ts">
const { y: scrollY } = useWindowScroll()
const isScrolled = computed(() => scrollY.value > 60)
const mobileOpen = ref(false)

// Fermer au scroll
watch(scrollY, (val) => {
  if (mobileOpen.value && val > 100) mobileOpen.value = false
})

// Bloquer le scroll du body quand le menu est ouvert
watch(mobileOpen, (val) => {
  if (import.meta.client) {
    document.body.style.overflow = val ? 'hidden' : ''
  }
})

const navItems = [
  { label: 'Accueil', href: '/' },
  { label: 'Qui sommes-nous', href: '/qui-sommes-nous' },
  { label: 'Services', href: '/services' },
  { label: 'Réalisations', href: '/realisations' },
  { label: 'Blog', href: '/blog' },
  { label: 'Contact', href: '/contact' },
]
</script>

<style scoped>
.slide-enter-active,
.slide-leave-active {
  transition: all 0.25s ease;
}
.slide-enter-from,
.slide-leave-to {
  opacity: 0;
  transform: translateY(-6px);
}

.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.25s ease;
}
.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
</style>
