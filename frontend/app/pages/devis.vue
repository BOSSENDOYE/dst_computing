<template>
  <div class="min-h-screen bg-dst-light pt-24 pb-16">
    <div class="section-container">

      <!-- ── Titre page ── -->
      <div class="text-center mb-10">
        <span class="inline-block bg-dst-blue/10 text-dst-blue text-xs font-bold tracking-widest uppercase px-4 py-1.5 rounded-full mb-4">
          Gratuit & sans engagement
        </span>
        <h1 class="font-heading text-4xl md:text-5xl font-bold text-dst-navy mb-3">
          Demandez votre devis <span class="text-dst-orange">personnalisé</span>
        </h1>
        <p class="text-dst-gray text-base max-w-xl mx-auto">
          Remplissez le formulaire ci-dessous. Notre équipe étudie votre besoin et vous répond sous <strong>24h ouvrées</strong>.
        </p>
      </div>

      <!-- ── Layout split ── -->
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">

        <!-- ── Panneau gauche ── -->
        <div class="lg:col-span-1 rounded-3xl overflow-hidden sticky top-28" style="background: linear-gradient(160deg, #0F1A3E 0%, #1A2A5E 60%, #1e3a8a 100%);">
          <div class="p-8">

            <div class="mb-8">
              <p class="text-dst-orange text-xs font-bold tracking-widest uppercase mb-3">Pourquoi DST Computing ?</p>
              <h2 class="font-heading text-xl font-bold text-white leading-snug">
                Une réponse concrète à chaque besoin digital
              </h2>
            </div>

            <ul class="space-y-5 mb-10">
              <li v-for="arg in arguments_" :key="arg.titre" class="flex gap-3">
                <div class="w-9 h-9 rounded-xl flex items-center justify-center flex-shrink-0" :style="`background: ${arg.color}22;`">
                  <svg class="w-5 h-5" :style="`color: ${arg.color};`" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" :d="arg.icon" />
                  </svg>
                </div>
                <div>
                  <p class="text-white text-sm font-semibold">{{ arg.titre }}</p>
                  <p class="text-white/50 text-xs leading-relaxed">{{ arg.texte }}</p>
                </div>
              </li>
            </ul>

            <!-- Séparateur -->
            <div class="border-t border-white/10 pt-6">
              <p class="text-white/40 text-xs uppercase tracking-widest mb-4">Contact direct</p>
              <a href="tel:+221338600000" class="flex items-center gap-3 text-white/80 hover:text-white text-sm mb-3 transition-colors">
                <svg class="w-4 h-4 text-dst-orange flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                </svg>
                +221 33 860 00 00
              </a>
              <a href="mailto:contact@dstcomputing.sn" class="flex items-center gap-3 text-white/80 hover:text-white text-sm transition-colors">
                <svg class="w-4 h-4 text-dst-orange flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                contact@dstcomputing.sn
              </a>
            </div>
          </div>
        </div>

        <!-- ── Formulaire ── -->
        <div class="lg:col-span-2">

          <!-- Message succès -->
          <div v-if="submitted" class="bg-white rounded-3xl shadow-card p-12 text-center">
            <div class="w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6" style="background: #dcfce7;">
              <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
              </svg>
            </div>
            <h2 class="font-heading text-2xl font-bold text-dst-navy mb-3">Demande bien reçue !</h2>
            <p class="text-dst-gray mb-8 max-w-sm mx-auto">
              Merci <strong>{{ form.nom_complet }}</strong>. Notre équipe analysera votre projet et vous recontactera sous 24h ouvrées.
            </p>
            <button
              class="inline-flex items-center gap-2 text-white font-bold px-8 py-3.5 rounded-full transition-all hover:-translate-y-0.5"
              style="background: linear-gradient(135deg, #f97316, #ea580c);"
              @click="submitted = false"
            >
              Soumettre une autre demande
            </button>
          </div>

          <!-- Formulaire principal -->
          <form v-else class="bg-white rounded-3xl shadow-card overflow-hidden" @submit.prevent="submitForm">

            <!-- Indicateur étapes -->
            <div class="flex border-b border-gray-100">
              <button
                v-for="(step, i) in steps"
                :key="i"
                type="button"
                class="flex-1 py-4 px-3 text-xs font-bold uppercase tracking-wider transition-all flex items-center justify-center gap-2"
                :style="currentStep === i
                  ? 'color: #1e40af; border-bottom: 2px solid #1e40af;'
                  : 'color: #9ca3af; border-bottom: 2px solid transparent;'"
                @click="currentStep = i"
              >
                <span
                  class="w-5 h-5 rounded-full text-xs font-bold flex items-center justify-center flex-shrink-0"
                  :style="currentStep === i ? 'background:#1e40af; color:white;' : completedSteps.includes(i) ? 'background:#22c55e; color:white;' : 'background:#f3f4f6; color:#6b7280;'"
                >
                  <svg v-if="completedSteps.includes(i)" class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                  <span v-else>{{ i + 1 }}</span>
                </span>
                <span class="hidden sm:inline">{{ step }}</span>
              </button>
            </div>

            <div class="p-8">

              <!-- ──── ÉTAPE 0 : Identité ──── -->
              <div v-show="currentStep === 0" class="space-y-5">
                <div class="mb-6">
                  <h3 class="font-heading font-bold text-dst-navy text-lg">Vos informations de contact</h3>
                  <p class="text-dst-gray text-sm mt-1">Pour que nous puissions vous recontacter avec votre devis.</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                  <div>
                    <label class="form-label">Nom complet <span class="text-red-500">*</span></label>
                    <input v-model="form.nom_complet" type="text" class="form-input" placeholder="Moussa Diallo" required />
                  </div>
                  <div>
                    <label class="form-label">Poste / Fonction</label>
                    <input v-model="form.poste" type="text" class="form-input" placeholder="Directeur, Responsable IT..." />
                  </div>
                  <div>
                    <label class="form-label">Structure / Entreprise</label>
                    <input v-model="form.structure" type="text" class="form-input" placeholder="Nom de votre organisation" />
                  </div>
                  <div>
                    <label class="form-label">Secteur d'activité <span class="text-red-500">*</span></label>
                    <select v-model="form.secteur" class="form-input" required>
                      <option value="">-- Sélectionner --</option>
                      <option value="sante">Santé / Pharmacie</option>
                      <option value="commerce">Commerce / Retail</option>
                      <option value="douanes">Douanes / Import-Export</option>
                      <option value="education">Éducation / Formation</option>
                      <option value="finance">Finance / Microfinance</option>
                      <option value="transport">Transport / Logistique</option>
                      <option value="administration">Administration publique</option>
                      <option value="agriculture">Agriculture / Agroalimentaire</option>
                      <option value="services">Services</option>
                      <option value="autre">Autre</option>
                    </select>
                  </div>
                  <div>
                    <label class="form-label">Téléphone <span class="text-red-500">*</span></label>
                    <input v-model="form.telephone" type="tel" class="form-input" placeholder="+221 77 XXX XX XX" required />
                  </div>
                  <div>
                    <label class="form-label">Email professionnel <span class="text-red-500">*</span></label>
                    <input v-model="form.email" type="email" class="form-input" placeholder="vous@entreprise.sn" required />
                  </div>
                  <div class="sm:col-span-2">
                    <label class="form-label">Localisation</label>
                    <input v-model="form.localisation" type="text" class="form-input" placeholder="Ex: Dakar, Thiès, Abidjan..." />
                  </div>
                </div>
              </div>

              <!-- ──── ÉTAPE 1 : Projet ──── -->
              <div v-show="currentStep === 1" class="space-y-5">
                <div class="mb-6">
                  <h3 class="font-heading font-bold text-dst-navy text-lg">Décrivez votre projet</h3>
                  <p class="text-dst-gray text-sm mt-1">Plus vous êtes précis, plus notre devis sera adapté.</p>
                </div>

                <div>
                  <label class="form-label">Type de solution recherchée <span class="text-red-500">*</span></label>
                  <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 mt-2">
                    <label
                      v-for="opt in typesProjets"
                      :key="opt.value"
                      class="relative flex items-center gap-2.5 p-3.5 rounded-xl border-2 cursor-pointer transition-all"
                      :style="form.type_projet === opt.value
                        ? 'border-color: #1e40af; background: #eff6ff;'
                        : 'border-color: #e5e7eb; background: white;'"
                    >
                      <input v-model="form.type_projet" type="radio" :value="opt.value" class="sr-only" />
                      <svg class="w-4 h-4 flex-shrink-0" :style="form.type_projet === opt.value ? 'color:#1e40af;' : 'color:#9ca3af;'" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" :d="opt.icon" />
                      </svg>
                      <span class="text-xs font-semibold" :style="form.type_projet === opt.value ? 'color:#1e40af;' : 'color:#374151;'">{{ opt.label }}</span>
                    </label>
                  </div>
                </div>

                <div>
                  <label class="form-label">Fonctionnalités clés souhaitées</label>
                  <div class="grid grid-cols-2 sm:grid-cols-3 gap-2 mt-2">
                    <label
                      v-for="feat in fonctionnalites"
                      :key="feat"
                      class="flex items-center gap-2 p-3 rounded-xl border cursor-pointer transition-all text-xs font-medium"
                      :style="form.fonctionnalites.includes(feat)
                        ? 'border-color:#f97316; background:#fff7ed; color:#ea580c;'
                        : 'border-color:#e5e7eb; background:white; color:#6b7280;'"
                    >
                      <input v-model="form.fonctionnalites" type="checkbox" :value="feat" class="sr-only" />
                      <svg class="w-3.5 h-3.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                        <path v-if="form.fonctionnalites.includes(feat)" stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                        <path v-else stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                      </svg>
                      {{ feat }}
                    </label>
                  </div>
                </div>

                <div>
                  <label class="form-label">Description détaillée du besoin <span class="text-red-500">*</span></label>
                  <textarea
                    v-model="form.description_besoin"
                    class="form-input resize-none"
                    rows="5"
                    placeholder="Expliquez le problème que vous cherchez à résoudre, les utilisateurs concernés, les processus actuels, vos objectifs..."
                    required
                  />
                  <p class="text-xs text-gray-400 mt-1">{{ form.description_besoin.length }} / 2000 caractères</p>
                </div>

                <div>
                  <label class="form-label">Avez-vous déjà un système existant ?</label>
                  <div class="flex gap-3 mt-2">
                    <label
                      v-for="opt in ['Oui, à remplacer', 'Oui, à connecter', 'Non, c\'est nouveau']"
                      :key="opt"
                      class="flex-1 text-center p-3 rounded-xl border cursor-pointer text-xs font-semibold transition-all"
                      :style="form.systeme_existant === opt
                        ? 'border-color:#1e40af; background:#eff6ff; color:#1e40af;'
                        : 'border-color:#e5e7eb; background:white; color:#6b7280;'"
                    >
                      <input v-model="form.systeme_existant" type="radio" :value="opt" class="sr-only" />
                      {{ opt }}
                    </label>
                  </div>
                </div>
              </div>

              <!-- ──── ÉTAPE 2 : Budget & délai ──── -->
              <div v-show="currentStep === 2" class="space-y-5">
                <div class="mb-6">
                  <h3 class="font-heading font-bold text-dst-navy text-lg">Budget & calendrier</h3>
                  <p class="text-dst-gray text-sm mt-1">Ces informations nous permettent de vous proposer la solution la plus adaptée.</p>
                </div>

                <div>
                  <label class="form-label">Budget estimatif</label>
                  <div class="grid grid-cols-2 gap-3 mt-2">
                    <label
                      v-for="opt in budgets"
                      :key="opt.value"
                      class="p-4 rounded-xl border-2 cursor-pointer transition-all"
                      :style="form.budget_estimatif === opt.value
                        ? 'border-color:#1e40af; background:#eff6ff;'
                        : 'border-color:#e5e7eb; background:white;'"
                    >
                      <input v-model="form.budget_estimatif" type="radio" :value="opt.value" class="sr-only" />
                      <p class="text-sm font-bold" :style="form.budget_estimatif === opt.value ? 'color:#1e40af;' : 'color:#111827;'">{{ opt.label }}</p>
                      <p class="text-xs mt-0.5" :style="form.budget_estimatif === opt.value ? 'color:#3b82f6;' : 'color:#9ca3af;'">{{ opt.desc }}</p>
                    </label>
                  </div>
                </div>

                <div>
                  <label class="form-label">Délai souhaité de livraison</label>
                  <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 mt-2">
                    <label
                      v-for="opt in delais"
                      :key="opt.value"
                      class="text-center p-3 rounded-xl border-2 cursor-pointer transition-all"
                      :style="form.delai_souhaite === opt.value
                        ? 'border-color:#f97316; background:#fff7ed;'
                        : 'border-color:#e5e7eb; background:white;'"
                    >
                      <input v-model="form.delai_souhaite" type="radio" :value="opt.value" class="sr-only" />
                      <p class="text-lg mb-1">{{ opt.emoji }}</p>
                      <p class="text-xs font-semibold" :style="form.delai_souhaite === opt.value ? 'color:#ea580c;' : 'color:#374151;'">{{ opt.label }}</p>
                    </label>
                  </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                  <div>
                    <label class="form-label">Comment nous avez-vous connu ?</label>
                    <select v-model="form.source_contact" class="form-input">
                      <option value="">-- Sélectionner --</option>
                      <option value="bouche">Bouche à oreille</option>
                      <option value="google">Google / Moteur de recherche</option>
                      <option value="linkedin">LinkedIn</option>
                      <option value="facebook">Facebook / Instagram</option>
                      <option value="partenaire">Partenaire / Référence</option>
                      <option value="autre">Autre</option>
                    </select>
                  </div>
                  <div>
                    <label class="form-label">Pièce jointe (cahier des charges, maquette...)</label>
                    <input
                      type="file"
                      class="form-input py-2.5 cursor-pointer text-xs"
                      accept=".pdf,.doc,.docx,.jpg,.jpeg,.png"
                      @change="handleFile"
                    />
                    <p class="text-xs text-gray-400 mt-1">PDF, Word, image — max 5 Mo</p>
                  </div>
                </div>

                <!-- Récap -->
                <div class="bg-dst-light rounded-2xl p-5 border border-gray-100">
                  <p class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-3">Récapitulatif</p>
                  <div class="grid grid-cols-2 gap-2 text-sm">
                    <div><span class="text-gray-400">Contact : </span><span class="text-dst-navy font-medium">{{ form.nom_complet || '—' }}</span></div>
                    <div><span class="text-gray-400">Secteur : </span><span class="text-dst-navy font-medium">{{ form.secteur || '—' }}</span></div>
                    <div><span class="text-gray-400">Type : </span><span class="text-dst-navy font-medium">{{ form.type_projet || '—' }}</span></div>
                    <div><span class="text-gray-400">Budget : </span><span class="text-dst-navy font-medium">{{ form.budget_estimatif || 'Non défini' }}</span></div>
                  </div>
                </div>
              </div>

              <!-- Erreur API -->
              <div v-if="apiError" class="mt-4 bg-red-50 border border-red-200 rounded-xl p-4 text-sm text-red-700">
                {{ apiError }}
              </div>

              <!-- Navigation étapes -->
              <div class="flex items-center justify-between mt-8 pt-6 border-t border-gray-100">
                <button
                  v-if="currentStep > 0"
                  type="button"
                  class="inline-flex items-center gap-2 text-sm font-semibold text-gray-500 hover:text-dst-navy transition-colors px-4 py-2"
                  @click="currentStep--"
                >
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12"/></svg>
                  Précédent
                </button>
                <div v-else />

                <button
                  v-if="currentStep < steps.length - 1"
                  type="button"
                  class="inline-flex items-center gap-2 text-white font-bold text-sm px-8 py-3.5 rounded-full transition-all hover:-translate-y-0.5"
                  style="background: linear-gradient(135deg, #1e40af, #3b82f6);"
                  @click="nextStep"
                >
                  Suivant
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                </button>

                <button
                  v-else
                  type="submit"
                  :disabled="loading"
                  class="inline-flex items-center gap-2.5 text-white font-bold text-sm px-10 py-3.5 rounded-full transition-all hover:-translate-y-0.5 disabled:opacity-60 disabled:cursor-not-allowed"
                  style="background: linear-gradient(135deg, #f97316, #ea580c); box-shadow: 0 6px 24px rgba(249,115,22,0.4);"
                >
                  <svg v-if="loading" class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/>
                  </svg>
                  <svg v-else class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                  {{ loading ? 'Envoi en cours...' : 'Envoyer ma demande' }}
                </button>
              </div>

            </div>
          </form>

          <!-- Mention RGPD -->
          <p class="text-center text-xs text-gray-400 mt-4">
            En soumettant ce formulaire, vous acceptez que DST Computing traite vos données dans le cadre de votre demande. Vos informations restent confidentielles.
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
useSeoMeta({
  title: 'Devis Gratuit — Logiciel, Application & IT à Dakar, Sénégal',
  description: 'Demandez votre devis gratuit à DST Computing, Dakar. Développement logiciel sur mesure, application web & mobile, infrastructure IT, IA. Réponse personnalisée sous 24h ouvrées. Sans engagement.',
  keywords: 'devis logiciel Dakar, devis développement web Sénégal, devis application mobile Dakar, devis informatique Sénégal, prix logiciel sur mesure Dakar, tarif développement Sénégal, devis gratuit IT Dakar',
  ogTitle: 'Devis Gratuit IT — DST Computing, Dakar',
  ogDescription: 'Décrivez votre projet en 3 minutes. Devis personnalisé sous 24h, sans engagement.',
  ogUrl: 'https://www.dstcomputing.sn/devis',
  ogImage: 'https://www.dstcomputing.sn/og-image.jpg',
})
useHead({ link: [{ rel: 'canonical', href: 'https://www.dstcomputing.sn/devis' }] })

const config = useRuntimeConfig()

const loading = ref(false)
const submitted = ref(false)
const apiError = ref('')
const pieceJointe = ref<File | null>(null)
const currentStep = ref(0)
const completedSteps = ref<number[]>([])

const steps = ['Contact', 'Projet', 'Budget & délai']

const arguments_ = [
  { titre: 'Réponse sous 24h ouvrées', texte: 'Un consultant dédié étudie votre dossier rapidement.', color: '#f97316', icon: 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z' },
  { titre: 'Devis détaillé & transparent', texte: 'Pas de frais cachés. Chaque poste est justifié.', color: '#22c55e', icon: 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z' },
  { titre: 'Expertise locale Afrique de l\'Ouest', texte: 'Nous connaissons les contraintes terrain au Sénégal.', color: '#3b82f6', icon: 'M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064' },
  { titre: 'Accompagnement après livraison', texte: 'Formation, maintenance et support inclus dans nos offres.', color: '#a855f7', icon: 'M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z' },
]

const typesProjets = [
  { value: 'logiciel', label: 'Logiciel métier', icon: 'M9 3H5a2 2 0 00-2 2v4m6-6h10a2 2 0 012 2v4M9 3v18m0 0h10a2 2 0 002-2V9M9 21H5a2 2 0 01-2-2V9m0 0h18' },
  { value: 'web', label: 'Application web', icon: 'M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9' },
  { value: 'mobile', label: 'Application mobile', icon: 'M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z' },
  { value: 'infrastructure', label: 'Infrastructure IT', icon: 'M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2' },
  { value: 'ia', label: 'Agent IA / BI', icon: 'M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z' },
  { value: 'formation', label: 'Formation IT', icon: 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253' },
]

const fonctionnalites = [
  'Tableau de bord', 'Gestion des stocks', 'Facturation', 'Gestion RH',
  'Suivi clients (CRM)', 'Rapports & statistiques', 'Multi-utilisateurs', 'Application mobile',
  'Paiement en ligne', 'Import/Export Excel', 'API / Intégration', 'Mode hors-ligne',
]

const budgets = [
  { value: '<500k', label: '< 500 000 FCFA', desc: 'Petite solution ciblée' },
  { value: '500k-2M', label: '500k – 2M FCFA', desc: 'Module ou MVP' },
  { value: '2M-10M', label: '2M – 10M FCFA', desc: 'Solution complète' },
  { value: '>10M', label: '> 10M FCFA', desc: 'Système d\'entreprise' },
]

const delais = [
  { value: 'urgent', label: '< 1 mois', emoji: '🚀' },
  { value: '1-3mois', label: '1 – 3 mois', emoji: '📅' },
  { value: '3-6mois', label: '3 – 6 mois', emoji: '🗓️' },
  { value: 'flexible', label: 'Flexible', emoji: '🌿' },
]

const form = reactive({
  nom_complet: '',
  poste: '',
  structure: '',
  telephone: '',
  email: '',
  localisation: '',
  secteur: '',
  type_projet: '',
  fonctionnalites: [] as string[],
  description_besoin: '',
  systeme_existant: '',
  budget_estimatif: '',
  delai_souhaite: '',
  source_contact: '',
})

function handleFile(e: Event) {
  const target = e.target as HTMLInputElement
  pieceJointe.value = target.files?.[0] ?? null
}

function nextStep() {
  if (!completedSteps.value.includes(currentStep.value)) {
    completedSteps.value.push(currentStep.value)
  }
  currentStep.value++
}

async function submitForm() {
  loading.value = true
  apiError.value = ''

  try {
    const body = new FormData()
    Object.entries(form).forEach(([k, v]) => {
      if (Array.isArray(v)) body.append(k, v.join(', '))
      else body.append(k, v)
    })
    if (pieceJointe.value) body.append('piece_jointe', pieceJointe.value)

    await $fetch(`${config.public.apiBase}/v1/devis`, { method: 'POST', body })

    submitted.value = true
    Object.keys(form).forEach(k => {
      if (Array.isArray((form as any)[k])) (form as any)[k] = []
      else (form as any)[k] = ''
    })
    pieceJointe.value = null
    currentStep.value = 0
    completedSteps.value = []
  } catch (err: any) {
    apiError.value = err?.data?.message ?? 'Une erreur est survenue. Veuillez réessayer.'
  } finally {
    loading.value = false
  }
}
</script>

<style scoped>
.form-label {
  display: block;
  font-size: 0.875rem;
  font-weight: 500;
  color: #374151;
  margin-bottom: 0.375rem;
}
.form-input {
  width: 100%;
  padding: 0.75rem 1rem;
  border-radius: 0.75rem;
  border: 1.5px solid #e5e7eb;
  color: #111827;
  font-size: 0.875rem;
  background: white;
  transition: border-color 0.2s, box-shadow 0.2s;
  outline: none;
}
.form-input:focus {
  border-color: #1e40af;
  box-shadow: 0 0 0 3px rgba(30,64,175,0.08);
}
</style>
