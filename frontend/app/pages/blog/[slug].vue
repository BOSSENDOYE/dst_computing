<template>
  <div class="min-h-screen bg-dst-light">

    <!-- Back -->
    <div class="pt-28 pb-4">
      <div class="section-container max-w-3xl">
        <NuxtLink to="/blog" class="inline-flex items-center gap-2 text-dst-gray hover:text-dst-blue text-sm transition-colors">
          <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
          Retour au blog
        </NuxtLink>
      </div>
    </div>

    <!-- Article -->
    <article class="pb-20">
      <div class="section-container max-w-3xl">

        <!-- Meta -->
        <div class="mb-6">
          <span class="px-3 py-1 bg-dst-blue/10 text-dst-blue text-xs font-semibold rounded-full">
            {{ article.categorie }}
          </span>
        </div>

        <!-- Titre -->
        <h1 class="font-heading text-3xl md:text-4xl font-bold text-dst-navy mb-6 leading-tight">
          {{ article.titre }}
        </h1>

        <!-- Auteur & date -->
        <div class="flex items-center gap-4 text-sm text-dst-gray border-b border-gray-200 pb-6 mb-8">
          <div class="w-10 h-10 rounded-full bg-dst-blue flex items-center justify-center text-white font-bold text-sm">
            DST
          </div>
          <div>
            <p class="font-medium text-dst-navy">{{ article.auteur }}</p>
            <p class="text-xs">{{ article.date }} · {{ article.tempsLecture }}</p>
          </div>
        </div>

        <!-- Image / Hero emoji -->
        <div class="h-64 rounded-2xl flex items-center justify-center text-8xl mb-10" :class="article.heroBg">
          {{ article.emoji }}
        </div>

        <!-- Contenu -->
        <div class="prose prose-dst max-w-none" v-html="article.contenu"></div>

        <!-- CTA -->
        <div class="mt-12 bg-dst-navy rounded-2xl p-8 text-white text-center">
          <h3 class="font-heading text-xl font-bold mb-3">Vous avez un projet similaire ?</h3>
          <p class="text-white/70 mb-6">Notre équipe peut vous accompagner. Obtenez un devis gratuit sous 24h.</p>
          <NuxtLink to="/devis" class="btn-primary">Demander un devis</NuxtLink>
        </div>

      </div>
    </article>
  </div>
</template>

<script setup lang="ts">
const route = useRoute()

// En production, fetcher depuis l'API : await $fetch(`/api/v1/articles/${route.params.slug}`)
// Ici on utilise des données statiques pour la démo
const articles: Record<string, any> = {
  'digitalisation-pharmacies-senegal': {
    titre: 'La digitalisation des pharmacies au Sénégal : enjeux et solutions',
    categorie: 'Secteur Santé',
    auteur: 'Équipe DST Computing',
    date: '10 mai 2025',
    tempsLecture: '5 min de lecture',
    emoji: '💊',
    heroBg: 'bg-blue-100',
    contenu: `
      <p>La gestion d'une pharmacie au Sénégal est un exercice complexe qui mêle impératifs réglementaires, gestion des stocks et service au patient. Longtemps réalisée sur papier ou via des tableurs basiques, cette gestion se digitalise progressivement.</p>
      <h2>Les défis des officines sénégalaises</h2>
      <p>Les pharmacies font face à plusieurs défis quotidiens :</p>
      <ul>
        <li>La gestion des péremptions et des stocks critiques</li>
        <li>Le suivi des ordonnances et des patients chroniques</li>
        <li>La conformité avec les exigences de la DPM (Direction de la Pharmacie et du Médicament)</li>
        <li>La facturation et les remboursements</li>
      </ul>
      <h2>Notre solution : SAYCURE</h2>
      <p>C'est pour répondre à ces besoins que DST Computing a développé SAYCURE, un logiciel de gestion complet pour les officines. En quelques chiffres :</p>
      <ul>
        <li><strong>15+ pharmacies</strong> utilisent SAYCURE activement au Sénégal</li>
        <li><strong>-40% de ruptures de stock</strong> grâce aux alertes automatiques</li>
        <li><strong>99.9% de disponibilité</strong> même lors de coupures internet</li>
      </ul>
      <h2>Conclusion</h2>
      <p>La digitalisation des pharmacies n'est plus une option mais une nécessité. Les officines qui adoptent des logiciels adaptés gagnent en efficacité, réduisent leurs pertes et offrent un meilleur service à leurs patients.</p>
    `,
  },
}

const article = computed(() => {
  const slug = route.params.slug as string
  return articles[slug] ?? {
    titre: 'Article non trouvé',
    categorie: '',
    auteur: 'DST Computing',
    date: '',
    tempsLecture: '',
    emoji: '📝',
    heroBg: 'bg-gray-100',
    contenu: '<p>Cet article n\'existe pas ou a été déplacé.</p>',
  }
})

useSeoMeta({
  title: () => `${article.value.titre} — Blog DST Computing`,
  description: () => article.value.extrait ?? article.value.titre,
})
</script>

<style>
.prose-dst h2 {
  @apply font-heading text-xl font-bold text-dst-navy mt-8 mb-4;
}
.prose-dst p {
  @apply text-gray-700 leading-relaxed mb-4;
}
.prose-dst ul {
  @apply list-disc list-inside space-y-2 text-gray-700 mb-4 ml-4;
}
.prose-dst strong {
  @apply font-semibold text-dst-navy;
}
</style>
