<template>
  <div class="pt-28 pb-20 min-h-screen bg-dst-light">
    <div class="section-container max-w-3xl">

      <!-- En-tête -->
      <div class="text-center mb-12">
        <span class="section-badge">Gratuit & sans engagement</span>
        <h1 class="section-title">Demandez votre devis</h1>
        <p class="section-subtitle">
          Décrivez votre projet en quelques minutes. Notre équipe vous répond sous 24h ouvrées.
        </p>
      </div>

      <!-- Succès -->
      <div
        v-if="submitted"
        class="bg-green-50 border border-green-200 rounded-2xl p-8 text-center"
      >
        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
          <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
          </svg>
        </div>
        <h2 class="font-heading text-2xl font-bold text-green-800 mb-2">Demande bien reçue !</h2>
        <p class="text-green-700 mb-6">
          Merci <strong>{{ form.nom_complet }}</strong>. Notre équipe analysera votre projet et vous recontactera sous 24h ouvrées.
        </p>
        <button class="btn-primary" @click="submitted = false">Soumettre une autre demande</button>
      </div>

      <!-- Formulaire -->
      <form
        v-else
        class="bg-white rounded-2xl shadow-card p-8 space-y-8"
        @submit.prevent="submitForm"
      >
        <!-- Bloc 1 — Informations contact -->
        <fieldset>
          <legend class="font-heading font-semibold text-dst-navy text-lg mb-5 pb-3 border-b border-gray-100 w-full flex items-center gap-2">
            <span class="w-7 h-7 bg-dst-blue text-white text-sm font-bold rounded-lg flex items-center justify-center">1</span>
            Vos informations
          </legend>
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div>
              <label class="form-label">Nom complet <span class="text-red-500">*</span></label>
              <input v-model="form.nom_complet" type="text" class="form-input" placeholder="Ex: Moussa Diallo" required />
            </div>
            <div>
              <label class="form-label">Structure / Entreprise</label>
              <input v-model="form.structure" type="text" class="form-input" placeholder="Ex: Pharmacie Centrale" />
            </div>
            <div>
              <label class="form-label">Téléphone <span class="text-red-500">*</span></label>
              <input v-model="form.telephone" type="tel" class="form-input" placeholder="+221 77 XXX XX XX" required />
            </div>
            <div>
              <label class="form-label">Email <span class="text-red-500">*</span></label>
              <input v-model="form.email" type="email" class="form-input" placeholder="contact@exemple.sn" required />
            </div>
            <div class="sm:col-span-2">
              <label class="form-label">Localisation</label>
              <input v-model="form.localisation" type="text" class="form-input" placeholder="Ex: Dakar, Thiès, Abidjan..." />
            </div>
          </div>
        </fieldset>

        <!-- Bloc 2 — Projet -->
        <fieldset>
          <legend class="font-heading font-semibold text-dst-navy text-lg mb-5 pb-3 border-b border-gray-100 w-full flex items-center gap-2">
            <span class="w-7 h-7 bg-dst-blue text-white text-sm font-bold rounded-lg flex items-center justify-center">2</span>
            Votre projet
          </legend>
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div>
              <label class="form-label">Type de projet <span class="text-red-500">*</span></label>
              <select v-model="form.type_projet" class="form-input" required>
                <option value="">-- Sélectionner --</option>
                <option value="logiciel">Logiciel métier</option>
                <option value="web">Application web</option>
                <option value="mobile">Application mobile</option>
                <option value="infrastructure">Infrastructure IT</option>
                <option value="ia">Agent IA / Automatisation</option>
                <option value="formation">Formation</option>
                <option value="autre">Autre</option>
              </select>
            </div>
            <div>
              <label class="form-label">Secteur d'activité <span class="text-red-500">*</span></label>
              <select v-model="form.secteur" class="form-input" required>
                <option value="">-- Sélectionner --</option>
                <option value="sante">Santé / Pharmacie</option>
                <option value="commerce">Commerce / Retail</option>
                <option value="douanes">Douanes / Export</option>
                <option value="education">Éducation</option>
                <option value="services">Services</option>
                <option value="administration">Administration publique</option>
                <option value="autre">Autre</option>
              </select>
            </div>
            <div class="sm:col-span-2">
              <label class="form-label">Description du besoin <span class="text-red-500">*</span></label>
              <textarea
                v-model="form.description_besoin"
                class="form-input resize-none"
                rows="5"
                placeholder="Décrivez votre projet, vos besoins et vos attentes..."
                required
              />
              <p class="text-xs text-dst-gray mt-1">{{ form.description_besoin.length }} / 2000 caractères</p>
            </div>
          </div>
        </fieldset>

        <!-- Bloc 3 — Budget & Délai -->
        <fieldset>
          <legend class="font-heading font-semibold text-dst-navy text-lg mb-5 pb-3 border-b border-gray-100 w-full flex items-center gap-2">
            <span class="w-7 h-7 bg-dst-blue text-white text-sm font-bold rounded-lg flex items-center justify-center">3</span>
            Budget & délai
          </legend>
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div>
              <label class="form-label">Budget estimatif</label>
              <select v-model="form.budget_estimatif" class="form-input">
                <option value="">-- Non défini --</option>
                <option value="<500k">Moins de 500 000 FCFA</option>
                <option value="500k-2M">500 000 – 2 000 000 FCFA</option>
                <option value="2M-10M">2 000 000 – 10 000 000 FCFA</option>
                <option value=">10M">Plus de 10 000 000 FCFA</option>
              </select>
            </div>
            <div>
              <label class="form-label">Délai souhaité</label>
              <select v-model="form.delai_souhaite" class="form-input">
                <option value="">-- Pas de contrainte --</option>
                <option value="urgent">Urgent (moins d'1 mois)</option>
                <option value="1-3mois">1 à 3 mois</option>
                <option value="3-6mois">3 à 6 mois</option>
              </select>
            </div>
            <div>
              <label class="form-label">Comment nous avez-vous connu ?</label>
              <input v-model="form.source_contact" type="text" class="form-input" placeholder="Bouche à oreille, Google, LinkedIn..." />
            </div>
            <div>
              <label class="form-label">Pièce jointe</label>
              <input
                type="file"
                class="form-input py-2 cursor-pointer"
                accept=".pdf,.doc,.docx,.jpg,.jpeg,.png"
                @change="handleFile"
              />
              <p class="text-xs text-dst-gray mt-1">PDF, Word, image — max 5 Mo</p>
            </div>
          </div>
        </fieldset>

        <!-- Erreur API -->
        <div v-if="apiError" class="bg-red-50 border border-red-200 rounded-xl p-4 text-sm text-red-700">
          {{ apiError }}
        </div>

        <!-- Submit -->
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pt-2">
          <p class="text-xs text-dst-gray max-w-xs">
            En soumettant ce formulaire, vous acceptez que DST Computing traite vos données dans le cadre de votre demande.
          </p>
          <button
            type="submit"
            :disabled="loading"
            class="btn-primary px-10 py-4 text-base disabled:opacity-60 disabled:cursor-not-allowed w-full sm:w-auto justify-center"
          >
            <svg v-if="loading" class="w-5 h-5 animate-spin" fill="none" viewBox="0 0 24 24">
              <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
              <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/>
            </svg>
            {{ loading ? 'Envoi en cours...' : 'Envoyer ma demande' }}
          </button>
        </div>
      </form>
    </div>
  </div>
</template>

<script setup lang="ts">
useSeoMeta({
  title: 'Demande de devis — DST Computing',
  description: 'Décrivez votre projet informatique et recevez un devis personnalisé sous 24h de DST Computing.',
})

const config = useRuntimeConfig()

const loading = ref(false)
const submitted = ref(false)
const apiError = ref('')
const pieceJointe = ref<File | null>(null)

const form = reactive({
  nom_complet: '',
  structure: '',
  telephone: '',
  email: '',
  localisation: '',
  type_projet: '',
  secteur: '',
  description_besoin: '',
  budget_estimatif: '',
  delai_souhaite: '',
  source_contact: '',
})

function handleFile(e: Event) {
  const target = e.target as HTMLInputElement
  pieceJointe.value = target.files?.[0] ?? null
}

async function submitForm() {
  loading.value = true
  apiError.value = ''

  try {
    const body = new FormData()
    Object.entries(form).forEach(([k, v]) => body.append(k, v))
    if (pieceJointe.value) body.append('piece_jointe', pieceJointe.value)

    await $fetch(`${config.public.apiBase}/v1/devis`, {
      method: 'POST',
      body,
    })

    submitted.value = true
    Object.keys(form).forEach(k => (form as any)[k] = '')
    pieceJointe.value = null
  } catch (err: any) {
    apiError.value = err?.data?.message ?? 'Une erreur est survenue. Veuillez réessayer.'
  } finally {
    loading.value = false
  }
}
</script>

<style>
.form-label {
  @apply block text-sm font-medium text-gray-700 mb-1.5;
}
.form-input {
  @apply w-full px-4 py-3 rounded-xl border border-gray-200 text-gray-800
         focus:outline-none focus:border-dst-blue focus:ring-2 focus:ring-dst-blue/10
         transition-all duration-200 bg-white text-sm;
}
</style>
