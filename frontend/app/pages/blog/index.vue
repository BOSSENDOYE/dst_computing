<template>
  <div class="min-h-screen bg-dst-light">

    <!-- Hero -->
    <section class="bg-dst-navy pt-32 pb-0 text-white">
      <div class="section-container">
        <div class="text-center pb-12">
          <span class="inline-block bg-white/10 text-white text-xs font-bold tracking-widest uppercase px-4 py-1.5 rounded-full mb-5 border border-white/20">
            Actualités & Conseils
          </span>
          <h1 class="font-heading text-4xl md:text-5xl font-bold mb-4">
            Le Blog <span class="text-dst-orange">DST Computing</span>
          </h1>
          <p class="text-white/70 text-lg max-w-xl mx-auto">
            Tendances IT, conseils pratiques et actualités numériques pour les entreprises africaines.
          </p>
        </div>

        <!-- Stats bar -->
        <div class="grid grid-cols-3 border-t border-white/10">
          <div class="py-6 text-center border-r border-white/10">
            <div class="font-heading text-3xl font-bold text-white">6</div>
            <div class="text-white/50 text-xs mt-1">Articles publiés</div>
          </div>
          <div class="py-6 text-center border-r border-white/10">
            <div class="font-heading text-3xl font-bold text-dst-orange">6</div>
            <div class="text-white/50 text-xs mt-1">Catégories</div>
          </div>
          <div class="py-6 text-center">
            <div class="font-heading text-3xl font-bold text-white">~6<span class="text-lg">min</span></div>
            <div class="text-white/50 text-xs mt-1">Lecture moyenne</div>
          </div>
        </div>
      </div>
    </section>

    <!-- Filtres catégories -->
    <section class="py-5 bg-white border-b border-gray-100 sticky top-[72px] z-10">
      <div class="section-container">
        <div class="flex flex-wrap gap-2 justify-center">
          <button
            v-for="cat in categories"
            :key="cat"
            class="px-4 py-1.5 rounded-full text-sm font-medium transition-all"
            :class="categorie === cat
              ? 'bg-dst-navy text-white'
              : 'bg-gray-100 text-gray-600 hover:bg-gray-200'"
            @click="categorie = cat"
          >
            {{ cat }}
          </button>
        </div>
      </div>
    </section>

    <!-- Articles -->
    <section class="py-16">
      <div class="section-container">

        <!-- Article à la une -->
        <div v-if="articleUne" class="rounded-3xl overflow-hidden mb-12 group hover:shadow-card-hover transition-all shadow-card">
          <div class="grid grid-cols-1 lg:grid-cols-5">

            <!-- Visual -->
            <div
              class="lg:col-span-2 min-h-[240px] flex flex-col items-center justify-center relative overflow-hidden"
              :style="articleUne.bgStyle"
            >
              <!-- Watermark -->
              <div class="absolute inset-0 flex items-center justify-center">
                <span class="font-heading font-bold text-white/10 text-[120px] leading-none select-none">{{ articleUne.categorie.substring(0,2).toUpperCase() }}</span>
              </div>
              <!-- Icon -->
              <div class="relative z-10 w-16 h-16 bg-white/15 backdrop-blur-sm rounded-2xl flex items-center justify-center border border-white/20 mb-4">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" :d="articleUne.iconPath" />
                </svg>
              </div>
              <span class="relative z-10 text-xs font-bold uppercase tracking-widest text-white/70 bg-white/10 px-3 py-1 rounded-full border border-white/20">
                {{ articleUne.categorie }}
              </span>
              <!-- Badge une -->
              <div class="absolute top-4 left-4 bg-dst-orange text-white text-xs font-bold px-3 py-1 rounded-full">
                À la une
              </div>
            </div>

            <!-- Content -->
            <div class="lg:col-span-3 bg-white p-8 lg:p-10 flex flex-col justify-center">
              <div class="flex items-center gap-2 mb-4 text-xs text-dst-gray">
                <span>{{ articleUne.auteur }}</span>
                <span class="text-gray-300">·</span>
                <span>{{ articleUne.date }}</span>
                <span class="text-gray-300">·</span>
                <span class="flex items-center gap-1">
                  <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                  </svg>
                  {{ articleUne.tempsLecture }}
                </span>
              </div>
              <h2 class="font-heading text-2xl lg:text-3xl font-bold text-dst-navy mb-4 group-hover:text-dst-blue transition-colors">
                <NuxtLink :to="`/blog/${articleUne.slug}`">{{ articleUne.titre }}</NuxtLink>
              </h2>
              <p class="text-dst-gray leading-relaxed mb-8">{{ articleUne.extrait }}</p>
              <NuxtLink
                :to="`/blog/${articleUne.slug}`"
                class="inline-flex items-center gap-2 text-dst-blue font-semibold text-sm hover:text-dst-orange transition-colors"
              >
                Lire l'article
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                </svg>
              </NuxtLink>
            </div>
          </div>
        </div>

        <!-- Grille articles -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
          <article
            v-for="article in autresArticles"
            :key="article.id"
            class="bg-white rounded-2xl shadow-card overflow-hidden group hover:shadow-card-hover hover:-translate-y-1 transition-all duration-300"
          >
            <!-- Visual -->
            <div class="h-40 relative overflow-hidden flex items-center justify-center" :style="article.bgStyle">
              <div class="absolute inset-0 flex items-center justify-center">
                <span class="font-heading font-bold text-white/10 text-8xl leading-none select-none">{{ article.categorie.substring(0,2).toUpperCase() }}</span>
              </div>
              <div class="relative z-10 w-12 h-12 bg-white/15 backdrop-blur-sm rounded-xl flex items-center justify-center border border-white/20">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" :d="article.iconPath" />
                </svg>
              </div>
            </div>

            <!-- Content -->
            <div class="p-6">
              <div class="flex items-center justify-between mb-3">
                <span class="px-2 py-0.5 bg-gray-100 text-gray-600 text-xs font-medium rounded-full">{{ article.categorie }}</span>
                <span class="flex items-center gap-1 text-xs text-dst-gray">
                  <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                  </svg>
                  {{ article.tempsLecture }}
                </span>
              </div>
              <h3 class="font-heading font-bold text-dst-navy mb-2 leading-snug group-hover:text-dst-blue transition-colors">
                <NuxtLink :to="`/blog/${article.slug}`">{{ article.titre }}</NuxtLink>
              </h3>
              <p class="text-dst-gray text-sm leading-relaxed mb-4">{{ article.extrait }}</p>
              <div class="flex items-center justify-between text-xs text-dst-gray pt-4 border-t border-gray-100">
                <span>{{ article.auteur }}</span>
                <span>{{ article.date }}</span>
              </div>
            </div>
          </article>
        </div>

        <!-- Vide -->
        <div v-if="autresArticles.length === 0 && !articleUne" class="text-center py-20">
          <div class="w-16 h-16 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
            </svg>
          </div>
          <h3 class="font-heading font-bold text-dst-navy mb-2">Articles bientôt disponibles</h3>
          <p class="text-dst-gray text-sm">Notre équipe prépare des contenus de qualité sur cette catégorie.</p>
        </div>

      </div>
    </section>

    <!-- Newsletter -->
    <section class="py-16 bg-dst-navy">
      <div class="section-container">
        <div class="max-w-2xl mx-auto">
          <div class="bg-white/5 border border-white/10 rounded-3xl p-10 text-center">
            <!-- Icon -->
            <div class="w-14 h-14 bg-dst-orange/20 rounded-2xl flex items-center justify-center mx-auto mb-6">
              <svg class="w-7 h-7 text-dst-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
              </svg>
            </div>
            <h2 class="font-heading text-2xl font-bold text-white mb-2">Restez informé</h2>
            <p class="text-white/60 mb-8">Recevez nos derniers articles et conseils IT directement dans votre boîte mail.</p>
            <form class="flex flex-col sm:flex-row gap-3 max-w-md mx-auto" @submit.prevent="subscribeNewsletter">
              <input
                v-model="newsletterEmail"
                type="email"
                placeholder="votre@email.com"
                required
                class="flex-1 px-4 py-3 rounded-xl bg-white/10 border border-white/20 text-white placeholder-white/40 focus:outline-none focus:border-dst-orange text-sm"
              />
              <button type="submit" class="btn-primary whitespace-nowrap" :disabled="newsletterLoading">
                {{ newsletterLoading ? 'Inscription...' : "S'abonner" }}
              </button>
            </form>
            <p v-if="newsletterSuccess" class="text-green-400 text-sm mt-4 flex items-center justify-center gap-2">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
              </svg>
              Inscription réussie ! Merci.
            </p>
          </div>
        </div>
      </div>
    </section>

  </div>
</template>

<script setup lang="ts">
useSeoMeta({
  title: 'Blog IT & Numérique — Conseils pour Entreprises au Sénégal',
  description: 'Blog DST Computing : actualités informatiques, conseils en transformation numérique, tendances IA et bonnes pratiques IT pour les PME et entreprises du Sénégal et d\'Afrique de l\'Ouest.',
  keywords: 'blog informatique Sénégal, actualité IT Dakar, conseils numérique entreprise Sénégal, transformation digitale Afrique, intelligence artificielle Dakar, développement logiciel actualité, tech Sénégal, innovation numérique Dakar',
  ogTitle: 'Blog IT — DST Computing, Dakar',
  ogDescription: 'Conseils, actualités et tendances numériques pour les entreprises d\'Afrique de l\'Ouest.',
  ogUrl: 'https://www.dstcomputing.sn/blog',
  ogImage: 'https://www.dstcomputing.sn/og-image.jpg',
})
useHead({ link: [{ rel: 'canonical', href: 'https://www.dstcomputing.sn/blog' }] })

const config = useRuntimeConfig()
const categorie = ref('Tous')
const newsletterEmail = ref('')
const newsletterLoading = ref(false)
const newsletterSuccess = ref(false)

const categories = ['Tous', 'Développement', 'Infrastructure', 'IA & Data', 'Secteur Santé', 'Conseils IT', 'Actualités']

// Styles visuels par catégorie (gérés côté front)
const categoryStyle: Record<string, { bgStyle: string; iconPath: string }> = {
  'Secteur Santé': {
    bgStyle: 'background: linear-gradient(135deg, #1A2A5E 0%, #2563EB 100%)',
    iconPath: 'M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z',
  },
  'IA & Data': {
    bgStyle: 'background: linear-gradient(135deg, #6d28d9 0%, #7c3aed 100%)',
    iconPath: 'M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z',
  },
  'Conseils IT': {
    bgStyle: 'background: linear-gradient(135deg, #dc2626 0%, #ef4444 100%)',
    iconPath: 'M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z',
  },
  'Développement': {
    bgStyle: 'background: linear-gradient(135deg, #059669 0%, #10b981 100%)',
    iconPath: 'M13 10V3L4 14h7v7l9-11h-7z',
  },
  'Infrastructure': {
    bgStyle: 'background: linear-gradient(135deg, #ea580c 0%, #f97316 100%)',
    iconPath: 'M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01',
  },
  'Actualités': {
    bgStyle: 'background: linear-gradient(135deg, #0d9488 0%, #14b8a6 100%)',
    iconPath: 'M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2 2 0 00-2-2h-2',
  },
}

const defaultStyle = {
  bgStyle: 'background: linear-gradient(135deg, #1A2A5E 0%, #2563EB 100%)',
  iconPath: 'M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z',
}

const { data: rawArticles } = await useFetch<any[]>(`${config.public.apiBase}/v1/articles`)

const articles = computed(() => (rawArticles.value ?? []).map((a: any, index: number) => ({
  id: a.id,
  slug: a.slug,
  titre: a.titre,
  extrait: a.extrait,
  categorie: a.categorie,
  auteur: a.auteur,
  tempsLecture: a.temps_lecture,
  date: a.publie_le ? new Date(a.publie_le).toLocaleDateString('fr-FR', { day: 'numeric', month: 'short', year: 'numeric' }) : '',
  une: index === 0,
  ...(categoryStyle[a.categorie] ?? defaultStyle),
})))

const articlesFiltres = computed(() => {
  if (categorie.value === 'Tous') return articles.value
  return articles.value.filter((a: any) => a.categorie === categorie.value)
})

const articleUne = computed(() => articlesFiltres.value.find((a: any) => a.une) ?? null)
const autresArticles = computed(() => articlesFiltres.value.filter((a: any) => !a.une))

async function subscribeNewsletter() {
  newsletterLoading.value = true
  try {
    await $fetch(`${config.public.apiBase}/v1/newsletter`, {
      method: 'POST',
      body: { email: newsletterEmail.value },
    })
    newsletterSuccess.value = true
    newsletterEmail.value = ''
  } catch {
    // fail silently
  } finally {
    newsletterLoading.value = false
  }
}
</script>
