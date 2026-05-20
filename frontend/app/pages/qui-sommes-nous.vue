<template>
  <div class="min-h-screen">

    <!-- ═══════════════════════════════════════════
         HERO
    ═══════════════════════════════════════════ -->
    <section class="relative bg-dst-navy pt-32 pb-0 overflow-hidden">
      <!-- Déco -->
      <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle at 1px 1px, white 1px, transparent 0); background-size: 40px 40px;" />
      <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-dst-orange/10 rounded-full blur-3xl" />
      <div class="absolute bottom-0 left-0 w-96 h-96 bg-dst-blue/20 rounded-full blur-3xl" />

      <div class="section-container relative z-10">
        <div class="max-w-3xl mx-auto text-center pb-16">
          <span class="inline-block bg-white/10 text-white/80 text-xs font-bold tracking-widest uppercase px-4 py-1.5 rounded-full mb-6 border border-white/15">
            Notre histoire
          </span>
          <h1 class="font-heading text-4xl md:text-6xl font-bold text-white leading-tight mb-6">
            On construit le numérique<br>
            <span class="text-dst-orange">africain de demain</span>
          </h1>
          <p class="text-white/65 text-lg leading-relaxed mb-10 max-w-2xl mx-auto">
            Fondée à Dakar, DST Computing accompagne les entreprises d'Afrique de l'Ouest dans leur transformation digitale — avec des solutions concrètes, durables et adaptées aux réalités locales.
          </p>
          <div class="flex flex-wrap gap-3 justify-center">
            <NuxtLink to="/devis" class="inline-flex items-center gap-2 bg-dst-orange hover:bg-orange-500 text-white font-semibold px-7 py-3.5 rounded-xl transition-colors text-sm">
              Travailler avec nous
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
            </NuxtLink>
            <NuxtLink to="/realisations" class="inline-flex items-center gap-2 border border-white/20 hover:border-white/40 text-white hover:bg-white/5 font-semibold px-7 py-3.5 rounded-xl transition-all text-sm">
              Nos réalisations
            </NuxtLink>
          </div>
        </div>

        <!-- Stats bar -->
        <div class="grid grid-cols-2 md:grid-cols-4 border-t border-white/10">
          <div v-for="(stat, i) in stats" :key="stat.label"
            class="text-center py-8 border-white/10"
            :class="i < 3 ? 'border-r' : ''"
          >
            <div class="font-heading text-4xl font-bold text-dst-orange mb-1">{{ stat.valeur }}</div>
            <div class="text-white/50 text-xs uppercase tracking-wide">{{ stat.label }}</div>
          </div>
        </div>
      </div>
    </section>

    <!-- ═══════════════════════════════════════════
         MISSION / VISION / ENGAGEMENT
    ═══════════════════════════════════════════ -->
    <section class="py-24 bg-white">
      <div class="section-container">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          <div
            v-for="item in missionItems"
            :key="item.title"
            class="group p-8 rounded-2xl border border-gray-100 hover:border-transparent hover:shadow-xl transition-all duration-300"
          >
            <div class="w-14 h-14 rounded-2xl flex items-center justify-center mb-6 transition-transform duration-300 group-hover:scale-110" :class="item.iconBg">
              <svg class="w-7 h-7" :class="item.iconColor" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <path :d="item.iconPath" />
              </svg>
            </div>
            <div class="w-8 h-0.5 rounded-full mb-4" :class="item.bar" />
            <h2 class="font-heading text-xl font-bold text-dst-navy mb-3">{{ item.title }}</h2>
            <p class="text-dst-gray text-sm leading-relaxed">{{ item.text }}</p>
          </div>
        </div>
      </div>
    </section>

    <!-- ═══════════════════════════════════════════
         ÉQUIPE
    ═══════════════════════════════════════════ -->
    <section class="py-24 bg-dst-light">
      <div class="section-container">

        <!-- Header -->
        <div class="text-center mb-14">
          <span class="inline-block bg-dst-blue/10 text-dst-blue text-xs font-bold tracking-widest uppercase px-4 py-1.5 rounded-full mb-5">
            Les visages de DST
          </span>
          <h2 class="font-heading text-3xl md:text-4xl font-bold text-dst-navy mb-3">Notre équipe</h2>
          <p class="text-dst-gray text-sm max-w-sm mx-auto">Des passionnés du numérique engagés à vos côtés au quotidien.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
          <div
            v-for="membre in equipe"
            :key="membre.nom"
            class="bg-white rounded-2xl overflow-hidden shadow-card hover:shadow-card-hover transition-all duration-300 hover:-translate-y-1.5 group"
          >
            <!-- Bandeau couleur haut avec avatar centré qui dépasse -->
            <div class="relative h-32" :style="`background: ${membre.heroBg};`">
              <!-- Motif points déco -->
              <div class="absolute inset-0 opacity-[0.08]" style="background-image: radial-gradient(circle at 1px 1px, white 1px, transparent 0); background-size: 18px 18px;" />
              <!-- Accent déco -->
              <div class="absolute -bottom-6 -right-6 w-24 h-24 rounded-full opacity-20" :style="`background: ${membre.roleColor};`" />
              <!-- Avatar positionné en bas au centre -->
              <div class="absolute -bottom-10 left-1/2 -translate-x-1/2">
                <div class="w-20 h-20 rounded-full border-4 border-white shadow-lg overflow-hidden" :style="`background: ${membre.roleColor};`">
                  <img src="/icone.png" alt="Avatar" class="w-full h-full object-cover" />
                </div>
              </div>
            </div>

            <!-- Contenu texte -->
            <div class="pt-12 pb-6 px-5 text-center">
              <!-- Badge rôle coloré -->
              <span class="inline-block text-xs font-bold px-3 py-1 rounded-full mb-3 text-white" :style="`background: ${membre.roleColor};`">
                {{ membre.initials }}
              </span>
              <h3 class="font-heading font-bold text-dst-navy text-base leading-tight mb-1">{{ membre.nom }}</h3>
              <p class="text-sm font-semibold mb-4" :style="`color: ${membre.roleColor};`">{{ membre.poste }}</p>
              <div class="w-10 h-px mx-auto mb-4 bg-gray-200" />
              <p class="text-dst-gray text-xs leading-relaxed">{{ membre.bio }}</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ═══════════════════════════════════════════
         VALEURS
    ═══════════════════════════════════════════ -->
    <section class="py-24 bg-dst-navy relative overflow-hidden">
      <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle at 1px 1px, white 1px, transparent 0); background-size: 40px 40px;" />

      <div class="section-container relative z-10">
        <div class="text-center mb-14">
          <span class="inline-block bg-dst-orange/15 text-dst-orange text-xs font-bold tracking-widest uppercase px-4 py-1.5 rounded-full mb-4">
            Ce qui nous guide
          </span>
          <h2 class="font-heading text-3xl md:text-4xl font-bold text-white mb-3">Nos valeurs</h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
          <div
            v-for="(valeur, i) in valeurs"
            :key="valeur.title"
            class="group flex gap-4 bg-white/5 hover:bg-white/10 border border-white/10 hover:border-white/20 rounded-2xl p-6 transition-all duration-300"
          >
            <div class="w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0 font-heading font-bold text-lg" :class="valeur.numBg">
              {{ String(i + 1).padStart(2, '0') }}
            </div>
            <div>
              <h3 class="font-heading font-semibold text-white mb-1 group-hover:text-dst-orange transition-colors">{{ valeur.title }}</h3>
              <p class="text-white/50 text-sm leading-relaxed group-hover:text-white/70 transition-colors">{{ valeur.text }}</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ═══════════════════════════════════════════
         TECHNOLOGIES
    ═══════════════════════════════════════════ -->
    <section class="py-16 bg-white border-b border-gray-100 overflow-hidden">
      <p class="text-center text-xs font-bold tracking-widest uppercase text-gray-400 mb-8">Technologies & Outils</p>

      <div
        class="relative"
        style="mask-image: linear-gradient(to right, transparent 0%, black 8%, black 92%, transparent 100%);
               -webkit-mask-image: linear-gradient(to right, transparent 0%, black 8%, black 92%, transparent 100%);"
      >
        <div class="flex tech-marquee-track">
          <template v-for="pass in 2" :key="pass">
            <span
              v-for="tech in technologies"
              :key="`${pass}-${tech}`"
              class="flex-shrink-0 mx-2 px-5 py-2.5 rounded-xl bg-dst-light text-dst-navy text-sm font-medium border border-gray-100 hover:border-dst-blue/40 hover:text-dst-blue hover:bg-blue-50 transition-colors cursor-default whitespace-nowrap"
            >
              {{ tech }}
            </span>
          </template>
        </div>
      </div>
    </section>

    <!-- ═══════════════════════════════════════════
         CTA
    ═══════════════════════════════════════════ -->
    <section class="py-24 bg-dst-light">
      <div class="section-container">
        <div class="bg-dst-navy rounded-3xl px-8 md:px-16 py-14 text-center relative overflow-hidden">
          <div class="absolute -top-16 -right-16 w-64 h-64 bg-dst-orange/10 rounded-full blur-3xl" />
          <div class="absolute -bottom-16 -left-16 w-64 h-64 bg-dst-blue/20 rounded-full blur-3xl" />
          <div class="relative z-10">
            <h2 class="font-heading text-3xl md:text-4xl font-bold text-white mb-4">
              Vous avez un projet en tête ?
            </h2>
            <p class="text-white/60 mb-8 max-w-xl mx-auto text-base">
              Échangeons sur vos besoins. Notre équipe vous propose la solution la plus adaptée — gratuitement.
            </p>
            <NuxtLink
              to="/devis"
              class="inline-flex items-center gap-2 bg-dst-orange hover:bg-orange-500 text-white font-semibold px-8 py-4 rounded-xl transition-colors text-sm"
            >
              Demander un devis gratuit
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
            </NuxtLink>
          </div>
        </div>
      </div>
    </section>

  </div>
</template>

<script setup lang="ts">
useSeoMeta({
  title: 'Qui Sommes-Nous — Société Informatique à Dakar, Sénégal',
  description: 'DST Computing (NAMASTECH) est une société informatique fondée à Dakar, Sénégal. Spécialisée en développement logiciel sur mesure, transformation numérique et intelligence artificielle pour les entreprises d\'Afrique de l\'Ouest depuis plus de 10 ans.',
  keywords: 'DST Computing Dakar, NAMASTECH Sénégal, société informatique Dakar, entreprise IT Sénégal, équipe développeurs Dakar, startup tech Sénégal, transformation numérique Dakar, cabinet informatique Sénégal, agence digitale Dakar',
  ogTitle: 'DST Computing — Société Informatique fondée à Dakar',
  ogDescription: 'Découvrez l\'équipe et l\'histoire de DST Computing, votre partenaire numérique en Afrique de l\'Ouest depuis Dakar, Sénégal.',
  ogUrl: 'https://www.dstcomputing.sn/qui-sommes-nous',
  ogImage: 'https://www.dstcomputing.sn/og-image.jpg',
})
useHead({
  link: [{ rel: 'canonical', href: 'https://www.dstcomputing.sn/qui-sommes-nous' }],
  script: [{
    type: 'application/ld+json',
    innerHTML: JSON.stringify({
      '@context': 'https://schema.org',
      '@type': 'AboutPage',
      name: 'Qui sommes-nous — DST Computing',
      url: 'https://www.dstcomputing.sn/qui-sommes-nous',
      description: 'Page de présentation de DST Computing, société informatique à Dakar, Sénégal.',
      mainEntity: { '@id': 'https://www.dstcomputing.sn/#organization' },
    }),
  }],
})

const config = useRuntimeConfig()

const { data: rawStats } = await useFetch<any[]>(`${config.public.apiBase}/v1/stats?contexte=about`)
const stats = computed(() => rawStats.value ?? [])

const { data: rawMissionItems } = await useFetch<any[]>(`${config.public.apiBase}/v1/mission-items`)
const missionItems = computed(() => (rawMissionItems.value ?? []).map((m: any) => ({
  title: m.titre,
  text: m.texte,
  iconBg: m.icone_bg,
  iconColor: m.icone_color,
  bar: m.barre,
  iconPath: m.icone_path,
})))

const { data: rawEquipe } = await useFetch<any[]>(`${config.public.apiBase}/v1/equipe`)


const styleEquipe: Record<string, { heroBg: string; roleColor: string }> = {
  'DG': { heroBg: 'linear-gradient(135deg, #0F1A3E 0%, #1e40af 100%)', roleColor: '#1e40af' },
  'LD': { heroBg: 'linear-gradient(135deg, #c2410c 0%, #f97316 100%)', roleColor: '#f97316' },
  'UX': { heroBg: 'linear-gradient(135deg, #6d28d9 0%, #a855f7 100%)', roleColor: '#7c3aed' },
  'IS': { heroBg: 'linear-gradient(135deg, #15803d 0%, #22c55e 100%)', roleColor: '#16a34a' },
}

const equipe = computed(() => (rawEquipe.value ?? []).map((m: any) => ({
  initials: m.initiales,
  heroBg: styleEquipe[m.initiales]?.heroBg ?? 'linear-gradient(135deg, #0F1A3E 0%, #1e40af 100%)',
  roleColor: styleEquipe[m.initiales]?.roleColor ?? '#1e40af',
  nom: m.nom,
  poste: m.poste,
  bio: m.bio,
})))

const { data: rawValeurs } = await useFetch<any[]>(`${config.public.apiBase}/v1/valeurs`)
const valeurs = computed(() => (rawValeurs.value ?? []).map((v: any) => ({
  title: v.titre,
  text: v.texte,
  numBg: v.num_bg,
})))

const { data: rawTechnologies } = await useFetch<any[]>(`${config.public.apiBase}/v1/technologies`)
const technologies = computed(() => (rawTechnologies.value ?? []).map((t: any) => t.nom))
</script>

<style scoped>
@keyframes techMarquee {
  0%   { transform: translateX(0); }
  100% { transform: translateX(-50%); }
}

.tech-marquee-track {
  width: max-content;
  animation: techMarquee 30s linear infinite;
}

.tech-marquee-track:hover {
  animation-play-state: paused;
}
</style>
