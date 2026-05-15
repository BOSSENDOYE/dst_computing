<template>
  <div class="min-h-screen">

    <!-- ═══════════════════════════════════════════
         HERO
    ═══════════════════════════════════════════ -->
    <section class="relative bg-dst-navy pt-32 pb-20 overflow-hidden">
      <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle at 1px 1px, white 1px, transparent 0); background-size: 40px 40px;" />
      <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-dst-orange/10 rounded-full blur-3xl" />
      <div class="absolute bottom-0 left-0 w-80 h-80 bg-dst-blue/20 rounded-full blur-3xl" />

      <div class="section-container relative z-10">
        <div class="max-w-3xl mx-auto text-center">
          <span class="inline-block bg-white/10 text-white/80 text-xs font-bold tracking-widest uppercase px-4 py-1.5 rounded-full mb-6 border border-white/15">
            Portfolio
          </span>
          <h1 class="font-heading text-4xl md:text-6xl font-bold text-white leading-tight mb-6">
            Nos <span class="text-dst-orange">réalisations</span>
          </h1>
          <p class="text-white/65 text-lg max-w-2xl mx-auto mb-10">
            Découvrez nos 5 produits phares développés pour des secteurs stratégiques en Afrique de l'Ouest.
          </p>
        </div>

        <!-- Stats bar -->
        <div class="grid grid-cols-3 border-t border-white/10 mt-6">
          <div class="text-center py-8 border-r border-white/10">
            <div class="font-heading text-4xl font-bold text-dst-orange mb-1">5</div>
            <div class="text-white/50 text-xs uppercase tracking-wide">Produits phares</div>
          </div>
          <div class="text-center py-8 border-r border-white/10">
            <div class="font-heading text-4xl font-bold text-dst-orange mb-1">50+</div>
            <div class="text-white/50 text-xs uppercase tracking-wide">Projets livrés</div>
          </div>
          <div class="text-center py-8">
            <div class="font-heading text-4xl font-bold text-dst-orange mb-1">5</div>
            <div class="text-white/50 text-xs uppercase tracking-wide">Secteurs couverts</div>
          </div>
        </div>
      </div>
    </section>

    <!-- ═══════════════════════════════════════════
         FILTRES
    ═══════════════════════════════════════════ -->
    <section class="py-6 bg-white border-b border-gray-100 sticky top-16 z-10">
      <div class="section-container">
        <div class="flex flex-wrap gap-2 justify-center">
          <button
            v-for="f in filtres"
            :key="f.value"
            class="px-5 py-2 rounded-full text-sm font-semibold transition-all duration-200"
            :class="filtre === f.value
              ? 'bg-dst-navy text-white shadow-md'
              : 'bg-gray-100 text-gray-500 hover:bg-gray-200 hover:text-gray-700'"
            @click="filtre = f.value"
          >
            {{ f.label }}
          </button>
        </div>
      </div>
    </section>

    <!-- ═══════════════════════════════════════════
         PRODUITS
    ═══════════════════════════════════════════ -->
    <section class="py-16 bg-dst-light">
      <div class="section-container">
        <div class="space-y-10">
          <article
            v-for="(produit, index) in produitsFiltres"
            :key="produit.id"
            class="bg-white rounded-3xl overflow-hidden shadow-card hover:shadow-card-hover transition-all duration-300"
          >
            <div class="grid grid-cols-1 lg:grid-cols-5">

              <!-- Visuel (2/5) -->
              <div
                class="lg:col-span-2 min-h-[280px] flex flex-col items-center justify-center relative overflow-hidden p-10"
                :class="[produit.bgGradient, index % 2 === 1 ? 'lg:order-last' : '']"
              >
                <!-- Nom en arrière-plan -->
                <div class="absolute inset-0 flex items-center justify-center select-none pointer-events-none">
                  <span class="font-heading font-bold text-white/10 text-7xl md:text-8xl whitespace-nowrap">
                    {{ produit.nom }}
                  </span>
                </div>

                <!-- Icône SVG centrale -->
                <div class="relative z-10 w-20 h-20 bg-white/15 backdrop-blur-sm rounded-3xl flex items-center justify-center mb-5 border border-white/20">
                  <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <path :d="produit.iconPath" />
                  </svg>
                </div>

                <!-- Nom + type -->
                <div class="relative z-10 text-center">
                  <div class="font-heading font-bold text-white text-2xl mb-1">{{ produit.nom }}</div>
                  <div class="text-white/60 text-xs">{{ produit.type }}</div>
                </div>

                <!-- Techs -->
                <div class="relative z-10 flex flex-wrap gap-2 justify-center mt-5">
                  <span
                    v-for="tech in produit.techs"
                    :key="tech"
                    class="text-xs px-3 py-1 bg-white/15 text-white rounded-full border border-white/20 font-mono"
                  >{{ tech }}</span>
                </div>
              </div>

              <!-- Contenu (3/5) -->
              <div class="lg:col-span-3 p-8 lg:p-12 flex flex-col justify-center">

                <!-- Tags -->
                <div class="flex flex-wrap items-center gap-2 mb-5">
                  <span class="px-3 py-1 rounded-full text-xs font-bold" :class="produit.tagClass">
                    {{ produit.secteur }}
                  </span>
                  <span class="px-3 py-1 rounded-full text-xs bg-gray-100 text-gray-500 font-medium">
                    {{ produit.type }}
                  </span>
                </div>

                <h2 class="font-heading text-2xl lg:text-3xl font-bold text-dst-navy mb-3">{{ produit.nom }}</h2>
                <p class="text-dst-gray text-sm leading-relaxed mb-6">{{ produit.description }}</p>

                <!-- Fonctionnalités -->
                <div class="mb-6">
                  <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Fonctionnalités clés</p>
                  <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                    <div v-for="feature in produit.features" :key="feature" class="flex items-center gap-2 text-sm text-gray-600">
                      <svg class="w-4 h-4 flex-shrink-0" :class="produit.accentColor" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                      </svg>
                      {{ feature }}
                    </div>
                  </div>
                </div>

                <!-- Stats -->
                <div class="flex flex-wrap gap-6 mb-8 pb-8 border-b border-gray-100">
                  <div v-for="stat in produit.stats" :key="stat.label">
                    <div class="font-heading font-bold text-xl" :class="produit.accentColor">{{ stat.value }}</div>
                    <div class="text-xs text-gray-400">{{ stat.label }}</div>
                  </div>
                </div>

                <!-- CTA -->
                <div class="flex flex-wrap gap-3">
                  <NuxtLink to="/devis"
                    class="inline-flex items-center gap-2 text-white font-semibold px-6 py-3 rounded-xl text-sm transition-colors"
                    :class="produit.btnBg">
                    Demander une démo
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                  </NuxtLink>
                  <NuxtLink to="/contact"
                    class="inline-flex items-center gap-2 border border-gray-200 hover:border-gray-300 text-gray-600 hover:text-gray-800 font-semibold px-6 py-3 rounded-xl text-sm transition-all">
                    En savoir plus
                  </NuxtLink>
                </div>
              </div>
            </div>
          </article>
        </div>
      </div>
    </section>

    <!-- ═══════════════════════════════════════════
         AUTRES PROJETS
    ═══════════════════════════════════════════ -->
    <section class="py-24 bg-dst-navy relative overflow-hidden">
      <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle at 1px 1px, white 1px, transparent 0); background-size: 40px 40px;" />
      <div class="absolute -right-20 top-0 w-72 h-72 bg-dst-orange/10 rounded-full blur-3xl" />
      <div class="section-container relative z-10 text-center">
        <h2 class="font-heading text-3xl md:text-4xl font-bold text-white mb-4">Et bien d'autres projets...</h2>
        <p class="text-white/60 mb-8 max-w-xl mx-auto">
          En plus de nos produits phares, nous avons livré plus de 50 projets sur-mesure pour des PME, institutions et startups en Afrique de l'Ouest.
        </p>
        <NuxtLink to="/devis"
          class="inline-flex items-center gap-2 bg-dst-orange hover:bg-orange-500 text-white font-semibold px-8 py-4 rounded-xl transition-colors text-sm">
          Discuter de votre projet
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
        </NuxtLink>
      </div>
    </section>

  </div>
</template>

<script setup lang="ts">
useSeoMeta({
  title: 'Réalisations — DST Computing',
  description: 'Découvrez les produits phares de DST Computing : SAYCURE, LERAL, GESOM-CCIS, Cabinet Soins Ide et SEN ARCHIV.',
})

const filtre = ref('tous')

const filtres = [
  { value: 'tous', label: 'Tous les projets' },
  { value: 'sante', label: 'Santé' },
  { value: 'commerce', label: 'Commerce' },
  { value: 'administration', label: 'Administration' },
  { value: 'archivage', label: 'Archivage' },
]

const config = useRuntimeConfig()

const { data: rawProduits } = await useFetch<any[]>(`${config.public.apiBase}/v1/produits`)

// Métadonnées visuelles et de filtrage statiques par nom de produit
const metaMap: Record<string, { secteurKey: string; type: string; bgGradient: string; tagClass: string; accentColor: string; btnBg: string; iconPath: string; stats: { value: string; label: string }[] }> = {
  'SAYCURE': {
    secteurKey: 'sante', type: 'Logiciel métier',
    bgGradient: 'bg-gradient-to-br from-blue-700 to-dst-blue',
    tagClass: 'bg-blue-50 text-blue-700', accentColor: 'text-dst-blue', btnBg: 'bg-dst-blue hover:bg-blue-700',
    iconPath: 'M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10',
    stats: [{ value: '15+', label: 'Pharmacies clientes' }, { value: '99.9%', label: 'Disponibilité' }, { value: '2019', label: 'Lancé en' }],
  },
  'LERAL': {
    secteurKey: 'commerce', type: 'ERP multi-boutiques',
    bgGradient: 'bg-gradient-to-br from-orange-600 to-dst-orange',
    tagClass: 'bg-orange-50 text-orange-700', accentColor: 'text-dst-orange', btnBg: 'bg-dst-orange hover:bg-orange-600',
    iconPath: 'M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z',
    stats: [{ value: '10+', label: 'Commerces actifs' }, { value: '3 pays', label: 'Déployé dans' }, { value: '2021', label: 'Lancé en' }],
  },
  'GESOM-CCIS': {
    secteurKey: 'administration', type: 'Logiciel métier',
    bgGradient: 'bg-gradient-to-br from-green-700 to-green-500',
    tagClass: 'bg-green-50 text-green-700', accentColor: 'text-green-600', btnBg: 'bg-green-600 hover:bg-green-700',
    iconPath: 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
    stats: [{ value: '500+', label: 'Dossiers/mois' }, { value: '1', label: 'Déploiement CCIS' }, { value: '2022', label: 'Lancé en' }],
  },
  'Cabinet Soins Ide': {
    secteurKey: 'sante', type: 'Application mobile & web',
    bgGradient: 'bg-gradient-to-br from-purple-700 to-purple-500',
    tagClass: 'bg-purple-50 text-purple-700', accentColor: 'text-purple-600', btnBg: 'bg-purple-600 hover:bg-purple-700',
    iconPath: 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z',
    stats: [{ value: '8+', label: 'Cabinets utilisateurs' }, { value: '2 000+', label: 'Patients suivis' }, { value: '2023', label: 'Lancé en' }],
  },
  'SEN ARCHIV': {
    secteurKey: 'archivage', type: 'GED / Logiciel métier',
    bgGradient: 'bg-gradient-to-br from-teal-700 to-teal-500',
    tagClass: 'bg-teal-50 text-teal-700', accentColor: 'text-teal-600', btnBg: 'bg-teal-600 hover:bg-teal-700',
    iconPath: 'M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4',
    stats: [{ value: '50 000+', label: 'Documents archivés' }, { value: '5+', label: 'Institutions clientes' }, { value: '2023', label: 'Lancé en' }],
  },
}

const produits = computed(() => (rawProduits.value ?? []).map((p: any) => ({
  id: p.id,
  nom: p.nom,
  secteur: p.secteur,
  description: p.description,
  techs: p.techs ?? [],
  features: p.features ?? [],
  ...(metaMap[p.nom] ?? {
    secteurKey: 'autres', type: 'Logiciel métier',
    bgGradient: 'bg-gradient-to-br from-dst-navy to-dst-blue',
    tagClass: 'bg-blue-50 text-blue-700', accentColor: 'text-dst-blue', btnBg: 'bg-dst-blue hover:bg-blue-700',
    iconPath: p.icon_path ?? '', stats: [],
  }),
})))

const produitsFiltres = computed(() => {
  if (filtre.value === 'tous') return produits.value
  return produits.value.filter((p: any) => p.secteurKey === filtre.value)
})
</script>
