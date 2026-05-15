<template>
  <div class="min-h-screen bg-dst-light">

    <!-- Hero compact -->
    <section class="bg-dst-navy pt-32 pb-20 relative overflow-hidden">
      <!-- Déco -->
      <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle at 1px 1px, white 1px, transparent 0); background-size: 40px 40px;" />
      <div class="absolute -top-20 -right-20 w-80 h-80 bg-dst-blue/20 rounded-full blur-3xl" />
      <div class="absolute -bottom-20 -left-20 w-64 h-64 bg-dst-orange/10 rounded-full blur-3xl" />

      <div class="section-container relative z-10">
        <div class="max-w-2xl">
          <span class="inline-block bg-white/10 text-white text-xs font-bold tracking-widest uppercase px-4 py-1.5 rounded-full mb-6 border border-white/20">
            Parlons de votre projet
          </span>
          <h1 class="font-heading text-4xl md:text-6xl font-bold text-white leading-tight mb-4">
            On est là pour<br/><span class="text-dst-orange">vous aider.</span>
          </h1>
          <p class="text-white/60 text-lg">
            Une idée, un besoin ou une urgence ? Écrivez-nous — notre équipe à Dakar vous répond sous 24h.
          </p>
        </div>
      </div>
    </section>

    <!-- Split card -->
    <section class="py-0 -mt-12 pb-20 relative z-10">
      <div class="section-container">
        <div class="rounded-3xl overflow-hidden shadow-2xl grid grid-cols-1 lg:grid-cols-5">

          <!-- Panneau gauche — navy -->
          <div class="lg:col-span-2 bg-dst-navy p-10 relative overflow-hidden flex flex-col">

            <!-- Déco blobs -->
            <div class="absolute -top-16 -right-16 w-56 h-56 bg-dst-blue/20 rounded-full blur-2xl pointer-events-none" />
            <div class="absolute -bottom-16 -left-16 w-48 h-48 bg-dst-orange/10 rounded-full blur-2xl pointer-events-none" />

            <div class="relative z-10 flex flex-col h-full">
              <h2 class="font-heading text-2xl font-bold text-white mb-2">Nos coordonnées</h2>
              <p class="text-white/50 text-sm mb-8">Retrouvez-nous ou contactez-nous directement.</p>

              <!-- Infos -->
              <div class="space-y-6 mb-8">
                <div v-for="info in contactInfos" :key="info.label" class="flex items-start gap-4">
                  <div class="w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0" :class="info.iconBg">
                    <svg class="w-5 h-5" :class="info.iconColor" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" :d="info.iconPath" />
                    </svg>
                  </div>
                  <div>
                    <p class="text-white/40 text-xs font-bold uppercase tracking-widest mb-0.5">{{ info.label }}</p>
                    <p class="text-white text-sm leading-relaxed font-medium" v-html="info.value" />
                  </div>
                </div>
              </div>

              <!-- Séparateur -->
              <div class="border-t border-white/10 mb-6" />

              <!-- Horaires -->
              <div class="mb-8">
                <p class="text-white/40 text-xs font-bold uppercase tracking-widest mb-4">Horaires</p>
                <div class="space-y-2.5 text-sm">
                  <div class="flex justify-between">
                    <span class="text-white/60">Lun – Ven</span>
                    <span class="text-white font-semibold">08h – 18h</span>
                  </div>
                  <div class="flex justify-between">
                    <span class="text-white/60">Samedi</span>
                    <span class="text-white font-semibold">09h – 13h</span>
                  </div>
                  <div class="flex justify-between">
                    <span class="text-white/60">Dimanche</span>
                    <span class="text-white/30">Fermé</span>
                  </div>
                </div>
              </div>

              <!-- Séparateur -->
              <div class="border-t border-white/10 mb-6" />

              <!-- Socials -->
              <div class="mt-auto">
                <p class="text-white/40 text-xs font-bold uppercase tracking-widest mb-4">Suivez-nous</p>
                <div class="flex gap-3">
                  <a
                    v-for="social in socials"
                    :key="social.name"
                    :href="social.url"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="w-10 h-10 rounded-xl bg-white/10 border border-white/15 flex items-center justify-center text-white hover:bg-white/20 transition-colors"
                    :aria-label="social.name"
                  >
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                      <path :d="social.iconPath" />
                    </svg>
                  </a>
                </div>
              </div>
            </div>
          </div>

          <!-- Panneau droit — formulaire -->
          <div class="lg:col-span-3 bg-white">

            <!-- Succès -->
            <div
              v-if="submitted"
              class="h-full flex flex-col items-center justify-center p-12 text-center"
            >
              <div class="w-20 h-20 bg-green-100 rounded-3xl flex items-center justify-center mb-6">
                <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
              </div>
              <h2 class="font-heading text-2xl font-bold text-dst-navy mb-2">Message bien reçu !</h2>
              <p class="text-dst-gray mb-8 max-w-sm">
                Merci <strong class="text-dst-navy">{{ lastNom }}</strong>. Notre équipe vous contacte dans les plus brefs délais.
              </p>
              <button
                class="inline-flex items-center gap-2 bg-dst-navy text-white font-semibold text-sm px-6 py-3 rounded-xl hover:bg-dst-blue transition-colors"
                @click="submitted = false"
              >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
                </svg>
                Envoyer un autre message
              </button>
            </div>

            <!-- Form -->
            <form
              v-else
              class="p-10 space-y-6 h-full"
              @submit.prevent="submitForm"
            >
              <!-- En-tête form -->
              <div>
                <h2 class="font-heading text-2xl font-bold text-dst-navy">Votre message</h2>
                <p class="text-dst-gray text-sm mt-1">Remplissez le formulaire — nous vous répondons rapidement.</p>
              </div>

              <!-- Champs -->
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div class="group">
                  <label class="form-label">Nom complet <span class="text-red-400">*</span></label>
                  <input v-model="form.nom" type="text" class="form-input" placeholder="Moussa Diallo" required />
                </div>
                <div>
                  <label class="form-label">Email <span class="text-red-400">*</span></label>
                  <input v-model="form.email" type="email" class="form-input" placeholder="contact@exemple.sn" required />
                </div>
              </div>

              <div>
                <label class="form-label">Téléphone <span class="text-gray-400 font-normal">(facultatif)</span></label>
                <input v-model="form.telephone" type="tel" class="form-input" placeholder="+221 77 XXX XX XX" />
              </div>

              <!-- Sujet rapide -->
              <div>
                <label class="form-label">Sujet <span class="text-red-400">*</span></label>
                <div class="flex flex-wrap gap-2 mb-3">
                  <button
                    v-for="s in sujets"
                    :key="s"
                    type="button"
                    class="px-3 py-1.5 rounded-lg text-xs font-medium border transition-all"
                    :class="form.objet === s
                      ? 'bg-dst-navy text-white border-dst-navy'
                      : 'bg-white text-gray-600 border-gray-200 hover:border-dst-blue hover:text-dst-blue'"
                    @click="form.objet = s"
                  >
                    {{ s }}
                  </button>
                </div>
                <input v-model="form.objet" type="text" class="form-input" placeholder="Ou saisissez votre sujet..." required />
              </div>

              <div>
                <label class="form-label">Message <span class="text-red-400">*</span></label>
                <textarea
                  v-model="form.message"
                  class="form-input resize-none"
                  rows="5"
                  placeholder="Décrivez votre projet ou votre demande..."
                  required
                  minlength="10"
                />
              </div>

              <!-- Erreur API -->
              <div v-if="apiError" class="bg-red-50 border border-red-200 rounded-xl p-4 text-sm text-red-700 flex items-start gap-3">
                <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                {{ apiError }}
              </div>

              <button
                type="submit"
                :disabled="loading"
                class="w-full flex items-center justify-center gap-2 bg-dst-navy text-white font-bold text-sm px-6 py-4 rounded-xl hover:bg-dst-blue transition-colors disabled:opacity-50 disabled:cursor-not-allowed"
              >
                <svg v-if="loading" class="w-5 h-5 animate-spin" fill="none" viewBox="0 0 24 24">
                  <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                  <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/>
                </svg>
                <svg v-else class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                </svg>
                {{ loading ? 'Envoi en cours...' : 'Envoyer le message' }}
              </button>

              <p class="text-center text-xs text-gray-400">
                Ou contactez-nous directement sur
                <a href="https://wa.me/221XXXXXXXX" target="_blank" class="text-green-600 font-semibold hover:underline">WhatsApp</a>
              </p>
            </form>
          </div>
        </div>
      </div>
    </section>

  </div>
</template>

<script setup lang="ts">
useSeoMeta({
  title: 'Contact — DST Computing',
  description: 'Contactez DST Computing à Dakar pour vos projets informatiques. Développement logiciel, infrastructure IT, IA et formation.',
})

const config = useRuntimeConfig()
const loading = ref(false)
const submitted = ref(false)
const apiError = ref('')
const lastNom = ref('')

const sujets = ['Demande de devis', 'Question produit', 'Partenariat', 'Support technique', 'Formation']

const form = reactive({
  nom: '',
  email: '',
  telephone: '',
  objet: '',
  message: '',
})

const contactInfos = [
  {
    iconPath: 'M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z M15 11a3 3 0 11-6 0 3 3 0 016 0z',
    iconBg: 'bg-dst-blue/20',
    iconColor: 'text-dst-blue',
    label: 'Adresse',
    value: 'Dakar, Sénégal<br/><span class="text-white/40 text-xs">Plateau / Zone industrielle</span>',
  },
  {
    iconPath: 'M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z',
    iconBg: 'bg-green-500/20',
    iconColor: 'text-green-400',
    label: 'Téléphone',
    value: '+221 77 XXX XX XX<br/><span class="text-white/40 text-xs">WhatsApp disponible</span>',
  },
  {
    iconPath: 'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z',
    iconBg: 'bg-dst-orange/20',
    iconColor: 'text-dst-orange',
    label: 'Email',
    value: 'contact@dstcomputing.sn<br/><span class="text-white/40 text-xs">Réponse sous 24h ouvrées</span>',
  },
]

const socials = [
  {
    name: 'LinkedIn',
    url: '#',
    iconPath: 'M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z',
  },
  {
    name: 'Facebook',
    url: '#',
    iconPath: 'M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z',
  },
  {
    name: 'WhatsApp',
    url: 'https://wa.me/221XXXXXXXX',
    iconPath: 'M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z',
  },
]

async function submitForm() {
  loading.value = true
  apiError.value = ''
  try {
    await $fetch(`${config.public.apiBase}/v1/contact`, {
      method: 'POST',
      body: { ...form },
    })
    lastNom.value = form.nom
    submitted.value = true
    Object.keys(form).forEach(k => (form as any)[k] = '')
  } catch (err: any) {
    apiError.value = err?.data?.message ?? 'Une erreur est survenue. Veuillez réessayer.'
  } finally {
    loading.value = false
  }
}
</script>

<style scoped>
.form-label {
  @apply block text-sm font-medium text-gray-700 mb-1.5;
}
.form-input {
  @apply w-full px-4 py-3 rounded-xl border border-gray-200 text-gray-800
         focus:outline-none focus:border-dst-blue focus:ring-2 focus:ring-dst-blue/10
         transition-all duration-200 bg-white text-sm;
}
</style>
