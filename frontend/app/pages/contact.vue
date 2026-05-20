<template>
  <div class="min-h-screen bg-dst-light">

    <!-- ══════════════════════════════════════════════════════
         HERO — plein écran navy avec titre centré
    ══════════════════════════════════════════════════════ -->
    <section class="bg-dst-navy pt-36 pb-28 relative overflow-hidden">
      <!-- Grille déco -->
      <div class="absolute inset-0 opacity-[0.04]"
        style="background-image: radial-gradient(circle at 1px 1px, white 1px, transparent 0); background-size: 36px 36px;" />
      <!-- Blobs -->
      <div class="absolute -top-40 right-0 w-[600px] h-[600px] bg-dst-blue/20 rounded-full blur-3xl pointer-events-none" />
      <div class="absolute bottom-0 -left-20 w-80 h-80 bg-dst-orange/10 rounded-full blur-3xl pointer-events-none" />

      <div class="section-container relative z-10 text-center">

        <!-- Badge -->
        <div class="inline-flex items-center gap-2 bg-white/10 border border-white/15 text-white/80 text-xs font-bold tracking-widest uppercase px-5 py-2 rounded-full mb-8">
          <span class="relative flex h-2 w-2">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75" />
            <span class="relative inline-flex rounded-full h-2 w-2 bg-green-400" />
          </span>
          Disponibles · Réponse sous 24h
        </div>

        <h1 class="font-heading text-5xl md:text-7xl font-bold text-white leading-tight mb-6">
          Parlons de<br/>
          <span class="text-dst-orange">votre projet</span>
        </h1>
        <p class="text-white/55 text-lg max-w-xl mx-auto mb-12 leading-relaxed">
          Devis, support, partenariat ou simple question — notre équipe à Dakar vous répond rapidement.
        </p>

        <!-- 3 boutons d'action rapide -->
        <div class="flex flex-wrap items-center justify-center gap-3">
          <a href="tel:+221XXXXXXXXX"
            class="inline-flex items-center gap-2.5 bg-white/10 hover:bg-white/20 border border-white/20 hover:border-white/40 text-white px-6 py-3 rounded-xl text-sm font-semibold transition-all duration-200 backdrop-blur-sm">
            <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
            </svg>
            +221 77 XXX XX XX
          </a>
          <a href="https://wa.me/221XXXXXXXXX" target="_blank" rel="noopener noreferrer"
            class="inline-flex items-center gap-2.5 bg-green-500/20 hover:bg-green-500/30 border border-green-500/40 text-white px-6 py-3 rounded-xl text-sm font-semibold transition-all duration-200">
            <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 24 24">
              <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
            </svg>
            WhatsApp
          </a>
          <a href="mailto:contact@dstcomputing.sn"
            class="inline-flex items-center gap-2.5 bg-dst-orange/20 hover:bg-dst-orange/30 border border-dst-orange/40 text-white px-6 py-3 rounded-xl text-sm font-semibold transition-all duration-200">
            <svg class="w-4 h-4 text-dst-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
            contact@dstcomputing.sn
          </a>
        </div>
      </div>
    </section>

    <!-- ══════════════════════════════════════════════════════
         CONTENU PRINCIPAL — Formulaire + Sidebar
    ══════════════════════════════════════════════════════ -->
    <section class="py-16">
      <div class="section-container">
        <div class="grid grid-cols-1 lg:grid-cols-5 gap-8 items-start">

          <!-- ──────────────────────────
               COLONNE GAUCHE : Formulaire (3/5)
          ────────────────────────── -->
          <div class="lg:col-span-3">

            <!-- État succès -->
            <div v-if="submitted" class="bg-white rounded-3xl shadow-card p-14 text-center">
              <div class="relative w-24 h-24 mx-auto mb-7">
                <div class="absolute inset-0 bg-green-100 rounded-full animate-ping opacity-40" />
                <div class="relative w-24 h-24 bg-green-50 rounded-full flex items-center justify-center">
                  <svg class="w-12 h-12 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                  </svg>
                </div>
              </div>
              <h2 class="font-heading text-3xl font-bold text-dst-navy mb-3">Message envoyé !</h2>
              <p class="text-dst-gray mb-8 max-w-sm mx-auto leading-relaxed">
                Merci <strong class="text-dst-navy">{{ lastNom }}</strong>, notre équipe traite votre demande et vous répondra dans les 24h ouvrées.
              </p>
              <button
                class="inline-flex items-center gap-2 bg-dst-navy hover:bg-dst-blue text-white font-semibold text-sm px-7 py-3.5 rounded-xl transition-colors"
                @click="submitted = false"
              >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Nouveau message
              </button>
            </div>

            <!-- Formulaire -->
            <div v-else class="bg-white rounded-3xl shadow-card overflow-hidden">

              <!-- Header coloré -->
              <div class="bg-gradient-to-r from-dst-navy to-dst-blue px-8 py-7">
                <div class="flex items-center gap-3">
                  <div class="w-11 h-11 bg-white/15 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                  </div>
                  <div>
                    <h2 class="font-heading text-lg font-bold text-white">Envoyez-nous un message</h2>
                    <p class="text-white/60 text-xs mt-0.5">Réponse garantie sous 24h ouvrées</p>
                  </div>
                </div>
              </div>

              <div class="p-8">
                <form class="space-y-6" @submit.prevent="submitForm">

                  <!-- Sujets rapides -->
                  <div>
                    <label class="form-label">Sujet de votre message <span class="text-red-400">*</span></label>
                    <div class="flex flex-wrap gap-2 mb-3">
                      <button
                        v-for="s in sujets"
                        :key="s.label"
                        type="button"
                        class="inline-flex items-center gap-1.5 px-4 py-2 rounded-full text-xs font-semibold border transition-all duration-200"
                        :class="form.objet === s.label
                          ? 'bg-dst-navy text-white border-dst-navy shadow-md scale-105'
                          : 'bg-gray-50 text-gray-500 border-gray-200 hover:border-dst-blue/40 hover:text-dst-blue hover:bg-blue-50'"
                        @click="form.objet = s.label"
                      >
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" :d="s.icon"/>
                        </svg>
                        {{ s.label }}
                      </button>
                    </div>
                    <input
                      v-model="form.objet"
                      type="text"
                      class="form-input"
                      placeholder="Ou précisez votre sujet..."
                      required
                    />
                  </div>

                  <!-- Nom + Email -->
                  <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                      <label class="form-label">Nom complet <span class="text-red-400">*</span></label>
                      <input v-model="form.nom" type="text" class="form-input" placeholder="Moussa Diallo" required/>
                    </div>
                    <div>
                      <label class="form-label">Adresse email <span class="text-red-400">*</span></label>
                      <input v-model="form.email" type="email" class="form-input" placeholder="vous@exemple.sn" required/>
                    </div>
                  </div>

                  <!-- Téléphone -->
                  <div>
                    <label class="form-label">
                      Téléphone
                      <span class="text-gray-400 font-normal text-xs ml-1.5">(facultatif)</span>
                    </label>
                    <div class="relative">
                      <div class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                      </div>
                      <input v-model="form.telephone" type="tel" class="form-input pl-11" placeholder="+221 77 XXX XX XX"/>
                    </div>
                  </div>

                  <!-- Message -->
                  <div>
                    <div class="flex items-center justify-between mb-1.5">
                      <label class="form-label !mb-0">Message <span class="text-red-400">*</span></label>
                      <span class="text-xs" :class="form.message.length > 1800 ? 'text-red-400' : 'text-gray-400'">
                        {{ form.message.length }}/2000
                      </span>
                    </div>
                    <textarea
                      v-model="form.message"
                      class="form-input resize-none"
                      rows="5"
                      placeholder="Décrivez votre projet, vos besoins ou votre question..."
                      required
                      minlength="10"
                      maxlength="2000"
                    />
                  </div>

                  <!-- Erreur API -->
                  <div v-if="apiError" class="flex items-start gap-3 bg-red-50 border border-red-200 text-red-700 text-sm rounded-2xl p-4">
                    <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    {{ apiError }}
                  </div>

                  <!-- Bouton envoi -->
                  <button
                    type="submit"
                    :disabled="loading"
                    class="w-full flex items-center justify-center gap-3 bg-dst-orange hover:bg-orange-500 disabled:opacity-50 disabled:cursor-not-allowed text-white font-bold text-sm px-6 py-4 rounded-2xl transition-colors duration-200 shadow-lg shadow-dst-orange/20"
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

                </form>
              </div>
            </div>
          </div>

          <!-- ──────────────────────────
               COLONNE DROITE : Sidebar (2/5)
          ────────────────────────── -->
          <div class="lg:col-span-2 space-y-5 lg:sticky lg:top-24">

            <!-- Card coordonnées -->
            <div class="bg-white rounded-3xl shadow-card overflow-hidden">
              <div class="bg-dst-navy px-6 py-5">
                <h3 class="font-heading text-base font-bold text-white">Nos coordonnées</h3>
              </div>
              <div class="p-6 space-y-5">

                <!-- Adresse -->
                <div class="flex items-start gap-4">
                  <div class="w-10 h-10 rounded-2xl bg-dst-blue/10 flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-dst-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                  </div>
                  <div>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-0.5">Adresse</p>
                    <p class="text-dst-navy text-sm font-semibold">Dakar, Sénégal</p>
                  </div>
                </div>

                <div class="h-px bg-gray-100" />

                <!-- Téléphone -->
                <div class="flex items-start gap-4">
                  <div class="w-10 h-10 rounded-2xl bg-green-50 flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                  </div>
                  <div>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-0.5">Téléphone</p>
                    <a href="tel:+221XXXXXXXXX" class="text-dst-navy text-sm font-semibold hover:text-dst-blue transition-colors">
                      +221 77 XXX XX XX
                    </a>
                  </div>
                </div>

                <div class="h-px bg-gray-100" />

                <!-- Email -->
                <div class="flex items-start gap-4">
                  <div class="w-10 h-10 rounded-2xl bg-dst-orange/10 flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-dst-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                  </div>
                  <div>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-0.5">Email</p>
                    <a href="mailto:contact@dstcomputing.sn" class="text-dst-navy text-sm font-semibold hover:text-dst-orange transition-colors break-all">
                      contact@dstcomputing.sn
                    </a>
                  </div>
                </div>

                <div class="h-px bg-gray-100" />

                <!-- Dispo -->
                <div class="flex items-center justify-between bg-green-50 border border-green-100 rounded-2xl px-4 py-3">
                  <div class="flex items-center gap-2.5">
                    <span class="relative flex h-2.5 w-2.5">
                      <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75" />
                      <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-green-500" />
                    </span>
                    <span class="text-green-800 text-sm font-semibold">Disponibles maintenant</span>
                  </div>
                  <span class="text-green-600 text-xs font-medium">Lun–Ven</span>
                </div>

              </div>
            </div>

            <!-- Card horaires -->
            <div class="bg-white rounded-3xl shadow-card p-6">
              <h3 class="font-heading text-base font-bold text-dst-navy mb-5 flex items-center gap-2.5">
                <div class="w-8 h-8 bg-dst-navy rounded-xl flex items-center justify-center">
                  <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                  </svg>
                </div>
                Horaires d'ouverture
              </h3>
              <div class="space-y-3 text-sm">
                <div class="flex justify-between items-center">
                  <span class="text-gray-500">Lundi – Vendredi</span>
                  <span class="font-bold text-dst-navy bg-dst-light px-3 py-1 rounded-lg text-xs">08h00 – 18h00</span>
                </div>
                <div class="h-px bg-gray-100" />
                <div class="flex justify-between items-center">
                  <span class="text-gray-500">Samedi</span>
                  <span class="font-bold text-dst-navy bg-dst-light px-3 py-1 rounded-lg text-xs">09h00 – 13h00</span>
                </div>
                <div class="h-px bg-gray-100" />
                <div class="flex justify-between items-center">
                  <span class="text-gray-500">Dimanche</span>
                  <span class="text-gray-400 bg-gray-50 px-3 py-1 rounded-lg text-xs font-medium">Fermé</span>
                </div>
              </div>
            </div>

            <!-- Card WhatsApp -->
            <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-3xl p-6 text-white">
              <div class="flex items-center gap-3 mb-4">
                <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                  </svg>
                </div>
                <div>
                  <p class="font-bold text-sm">WhatsApp Business</p>
                  <p class="text-white/70 text-xs">Réponse plus rapide</p>
                </div>
              </div>
              <p class="text-white/80 text-xs leading-relaxed mb-4">
                Pour une réponse immédiate, contactez-nous directement sur WhatsApp. Disponible 7j/7 pour les urgences.
              </p>
              <a
                href="https://wa.me/221XXXXXXXXX"
                target="_blank"
                rel="noopener noreferrer"
                class="block w-full text-center bg-white text-green-700 font-bold text-sm px-4 py-3 rounded-xl hover:bg-green-50 transition-colors"
              >
                Ouvrir WhatsApp
              </a>
            </div>

          </div>
        </div>
      </div>
    </section>

  </div>
</template>

<script setup lang="ts">
useSeoMeta({
  title: 'Contactez-nous — DST Computing à Dakar, Sénégal',
  description: 'Contactez DST Computing à Dakar pour vos projets informatiques : développement logiciel, application web & mobile, infrastructure IT, IA. Réponse garantie sous 24h ouvrées. Adresse : Dakar, Sénégal.',
  keywords: 'contact DST Computing, agence informatique Dakar contact, devis logiciel Sénégal, développeur Dakar contact, prestataire IT Dakar, contact société informatique Sénégal, téléphone informatique Dakar',
  ogTitle: 'Contactez DST Computing — Dakar, Sénégal',
  ogDescription: 'Parlez-nous de votre projet. Notre équipe basée à Dakar vous répond sous 24h ouvrées.',
  ogUrl: 'https://www.dstcomputing.sn/contact',
  ogImage: 'https://www.dstcomputing.sn/og-image.jpg',
})
useHead({
  link: [{ rel: 'canonical', href: 'https://www.dstcomputing.sn/contact' }],
  script: [{
    type: 'application/ld+json',
    innerHTML: JSON.stringify({
      '@context': 'https://schema.org',
      '@type': 'ContactPage',
      name: 'Contact — DST Computing',
      url: 'https://www.dstcomputing.sn/contact',
      mainEntity: { '@id': 'https://www.dstcomputing.sn/#organization' },
    }),
  }],
})

const config = useRuntimeConfig()
const loading = ref(false)
const submitted = ref(false)
const apiError = ref('')
const lastNom = ref('')

const sujets = [
  { label: 'Demande de devis',  icon: 'M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 11h6m-6 4h3m-3 0a2 2 0 002 2h5a2 2 0 002-2V8a2 2 0 00-2-2H7a2 2 0 00-2 2v11a2 2 0 002 2z' },
  { label: 'Question produit',  icon: 'M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z' },
  { label: 'Partenariat',       icon: 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z' },
  { label: 'Support technique', icon: 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z M15 12a3 3 0 11-6 0 3 3 0 016 0z' },
  { label: 'Formation',         icon: 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253' },
]

const form = reactive({
  nom: '',
  email: '',
  telephone: '',
  objet: '',
  message: '',
})

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
  @apply block text-sm font-semibold text-gray-700 mb-1.5;
}
.form-input {
  @apply w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-gray-800 text-sm
         placeholder:text-gray-400
         focus:outline-none focus:bg-white focus:border-dst-blue focus:ring-2 focus:ring-dst-blue/10
         transition-all duration-200;
}
</style>
