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
            <div class="font-heading text-4xl font-bold text-dst-orange mb-1">{{ stat.value }}</div>
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

        <!-- Header équipe -->
        <div class="text-center mb-14">
          <span class="inline-block bg-dst-blue/10 text-dst-blue text-xs font-bold tracking-widest uppercase px-4 py-1.5 rounded-full mb-5">
            Les visages de DST
          </span>
          <h2 class="font-heading text-3xl md:text-4xl font-bold text-dst-navy mb-3">
            Notre équipe
          </h2>
          <p class="text-dst-gray text-sm max-w-sm mx-auto mb-8">
            Des passionnés du numérique engagés à vos côtés au quotidien.
          </p>

          <!-- Ligne avec avatars preview -->
          <div class="flex items-center justify-center gap-0 mb-2">
            <div class="h-px w-16 bg-gray-200" />
            <div class="flex -space-x-3 mx-4">
              <div class="w-10 h-10 rounded-full border-2 border-white flex items-center justify-center text-white text-xs font-bold shadow-md bg-dst-blue">DG</div>
              <div class="w-10 h-10 rounded-full border-2 border-white flex items-center justify-center text-white text-xs font-bold shadow-md bg-dst-orange">LD</div>
              <div class="w-10 h-10 rounded-full border-2 border-white flex items-center justify-center text-white text-xs font-bold shadow-md bg-purple-600">UX</div>
              <div class="w-10 h-10 rounded-full border-2 border-white flex items-center justify-center text-white text-xs font-bold shadow-md bg-green-600">IS</div>
            </div>
            <div class="h-px w-16 bg-gray-200" />
          </div>
          <p class="text-xs text-gray-400">4 experts · Dakar, Sénégal</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
          <div
            v-for="membre in equipe"
            :key="membre.nom"
            class="bg-white rounded-2xl shadow-card hover:shadow-card-hover transition-all duration-300 hover:-translate-y-1 overflow-hidden group"
          >
            <!-- Avatar -->
            <div class="h-44 flex items-end justify-center relative" :class="membre.heroBg">
              <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 1px 1px, white 1px, transparent 0); background-size: 20px 20px;" />
              <div class="relative z-10 w-20 h-20 rounded-full border-4 border-white shadow-lg flex items-center justify-center text-white font-heading font-bold text-2xl mb-0 translate-y-10" :class="membre.avatarBg">
                {{ membre.initials }}
              </div>
            </div>

            <div class="pt-12 pb-6 px-5 text-center">
              <h3 class="font-heading font-bold text-dst-navy text-base">{{ membre.nom }}</h3>
              <p class="text-sm font-semibold mb-2" :class="membre.roleColor">{{ membre.poste }}</p>
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
    <section class="py-16 bg-white border-b border-gray-100">
      <div class="section-container">
        <p class="text-center text-xs font-bold tracking-widest uppercase text-gray-400 mb-8">Technologies & Outils</p>
        <div class="flex flex-wrap justify-center gap-3">
          <span
            v-for="tech in technologies"
            :key="tech"
            class="px-4 py-2 rounded-xl bg-dst-light text-dst-navy text-sm font-medium border border-gray-100 hover:border-dst-blue/30 hover:text-dst-blue transition-colors"
          >
            {{ tech }}
          </span>
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
  title: 'Qui sommes-nous — DST Computing',
  description: 'DST Computing, société informatique basée à Dakar, Sénégal. Développement logiciel, transformation numérique, IA pour les entreprises africaines.',
})

const stats = [
  { value: '10+', label: 'Années d\'expérience' },
  { value: '50+', label: 'Projets livrés' },
  { value: '30+', label: 'Clients actifs' },
  { value: '5', label: 'Secteurs couverts' },
]

const missionItems = [
  {
    title: 'Notre mission',
    text: 'Accompagner les entreprises africaines dans leur transformation numérique avec des solutions IT innovantes, fiables et adaptées aux réalités locales.',
    iconBg: 'bg-dst-blue/10',
    iconColor: 'text-dst-blue',
    bar: 'bg-dst-blue',
    iconPath: 'M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z',
  },
  {
    title: 'Notre vision',
    text: 'Devenir le partenaire technologique de référence en Afrique de l\'Ouest, reconnu pour la qualité de nos solutions et notre proximité client.',
    iconBg: 'bg-orange-50',
    iconColor: 'text-dst-orange',
    bar: 'bg-dst-orange',
    iconPath: 'M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z',
  },
  {
    title: 'Notre engagement',
    text: 'Un accompagnement humain, une écoute active et des livrables de qualité. Chaque projet est traité comme une priorité, quelle que soit sa taille.',
    iconBg: 'bg-green-50',
    iconColor: 'text-green-600',
    bar: 'bg-green-500',
    iconPath: 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
  },
]

const config = useRuntimeConfig()

const { data: rawEquipe } = await useFetch<any[]>(`${config.public.apiBase}/v1/equipe`)

const styleEquipe: Record<string, { heroBg: string; roleColor: string }> = {
  'DG': { heroBg: 'bg-gradient-to-br from-dst-navy to-dst-blue', roleColor: 'text-dst-blue' },
  'LD': { heroBg: 'bg-gradient-to-br from-orange-600 to-dst-orange', roleColor: 'text-dst-orange' },
  'UX': { heroBg: 'bg-gradient-to-br from-purple-700 to-purple-500', roleColor: 'text-purple-600' },
  'IS': { heroBg: 'bg-gradient-to-br from-green-700 to-green-500', roleColor: 'text-green-600' },
}

const equipe = computed(() => (rawEquipe.value ?? []).map((m: any) => ({
  initials: m.initiales,
  heroBg: styleEquipe[m.initiales]?.heroBg ?? 'bg-gradient-to-br from-dst-navy to-dst-blue',
  avatarBg: m.avatar_bg,
  roleColor: styleEquipe[m.initiales]?.roleColor ?? 'text-dst-blue',
  nom: m.nom,
  poste: m.poste,
  bio: m.bio,
})))

const valeurs = [
  { title: 'Excellence', text: 'Code propre, interfaces soignées, documentation complète. Nous ne livrons que ce dont nous sommes fiers.', numBg: 'bg-dst-blue/20 text-dst-blue' },
  { title: 'Innovation', text: 'Nous explorons constamment de nouvelles technologies pour apporter les meilleures solutions du marché.', numBg: 'bg-dst-orange/20 text-dst-orange' },
  { title: 'Partenariat', text: 'Nous ne sommes pas de simples prestataires, mais de véritables partenaires dans la durée.', numBg: 'bg-green-500/20 text-green-400' },
  { title: 'Confiance', text: 'Confidentialité, transparence et honnêteté dans chaque échange et chaque livrable.', numBg: 'bg-purple-500/20 text-purple-400' },
  { title: 'Agilité', text: 'Des cycles courts, des retours fréquents. Vos besoins évoluent, nos solutions s\'adaptent.', numBg: 'bg-teal-500/20 text-teal-400' },
  { title: 'Ancrage local', text: 'Nous comprenons les défis locaux — énergie, connectivité, coûts — et y apportons des réponses concrètes.', numBg: 'bg-yellow-500/20 text-yellow-400' },
]

const technologies = [
  'Laravel', 'Vue.js', 'Nuxt', 'React', 'Flutter',
  'WinDev', 'WebDev', 'HFSQL', 'MySQL', 'PostgreSQL',
  'SQLite', 'Docker', 'Nginx', 'Ubuntu Server', 'Claude AI',
  'Filament', 'Tailwind CSS',
]
</script>
