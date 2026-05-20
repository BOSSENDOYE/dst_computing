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
    <article v-if="article" class="pb-20">
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

    <!-- 404 article -->
    <div v-else class="pb-20 pt-8">
      <div class="section-container max-w-3xl text-center">
        <p class="text-dst-gray text-lg">Cet article n'existe pas ou a été déplacé.</p>
        <NuxtLink to="/blog" class="mt-6 inline-flex items-center gap-2 text-dst-blue hover:underline text-sm">
          Retour au blog
        </NuxtLink>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
const route = useRoute()
const config = useRuntimeConfig()

// Style visuel par catégorie (non stocké en DB)
const categoryStyle: Record<string, { emoji: string; heroBg: string }> = {
  'Secteur Santé':             { emoji: '💊', heroBg: 'bg-blue-100' },
  'Intelligence Artificielle': { emoji: '🤖', heroBg: 'bg-purple-100' },
  'Cybersécurité':             { emoji: '🔒', heroBg: 'bg-red-100' },
  'Développement Web':         { emoji: '💻', heroBg: 'bg-indigo-100' },
  'Gestion Documentaire':      { emoji: '📁', heroBg: 'bg-teal-100' },
  'Infrastructure IT':         { emoji: '🖥️', heroBg: 'bg-gray-100' },
}

const { data: rawArticle } = await useFetch<any>(
  `${config.public.apiBase}/v1/articles/${route.params.slug}`,
  { default: () => null }
)

const article = computed(() => {
  const a = rawArticle.value
  if (!a) return null
  const style = categoryStyle[a.categorie] ?? { emoji: '📝', heroBg: 'bg-gray-100' }
  return {
    titre: a.titre,
    categorie: a.categorie,
    auteur: a.auteur ?? 'Équipe DST Computing',
    date: a.publie_le ? new Date(a.publie_le).toLocaleDateString('fr-FR', { day: 'numeric', month: 'long', year: 'numeric' }) : '',
    tempsLecture: a.temps_lecture ? `${a.temps_lecture} de lecture` : '',
    contenu: a.contenu,
    emoji: style.emoji,
    heroBg: style.heroBg,
  }
})

useSeoMeta({
  title: () => article.value ? `${article.value.titre} — Blog DST Computing Dakar` : 'Blog IT — DST Computing, Dakar',
  description: () => rawArticle.value?.extrait ?? `${rawArticle.value?.titre} — Conseils et actualités IT par DST Computing, société informatique à Dakar, Sénégal.` ?? '',
  ogTitle: () => article.value?.titre ?? 'Blog DST Computing',
  ogDescription: () => rawArticle.value?.extrait ?? '',
  ogType: 'article',
  ogImage: () => rawArticle.value?.image_url ?? 'https://www.dstcomputing.sn/og-image.jpg',
  twitterCard: 'summary_large_image',
})
useHead({
  link: [{ rel: 'canonical', href: () => `https://www.dstcomputing.sn/blog/${rawArticle.value?.slug ?? ''}` }],
  script: [{
    type: 'application/ld+json',
    innerHTML: () => JSON.stringify({
      '@context': 'https://schema.org',
      '@type': 'BlogPosting',
      headline: rawArticle.value?.titre ?? '',
      description: rawArticle.value?.extrait ?? '',
      image: rawArticle.value?.image_url ?? 'https://www.dstcomputing.sn/og-image.jpg',
      datePublished: rawArticle.value?.published_at ?? '',
      author: { '@type': 'Organization', name: 'DST Computing', url: 'https://www.dstcomputing.sn' },
      publisher: { '@type': 'Organization', name: 'DST Computing', logo: { '@type': 'ImageObject', url: 'https://www.dstcomputing.sn/icone.png' } },
      mainEntityOfPage: { '@type': 'WebPage', '@id': `https://www.dstcomputing.sn/blog/${rawArticle.value?.slug ?? ''}` },
    }),
  }],
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
