<template>
  <div class="fixed bottom-6 right-6 z-50">
    <!-- Bulle ouverte -->
    <Transition name="chat-pop">
      <div
        v-if="isOpen"
        class="mb-4 w-80 bg-white rounded-2xl shadow-2xl border border-gray-100 overflow-hidden"
      >
        <!-- Header -->
        <div class="bg-dst-navy p-4 flex items-center justify-between">
          <div class="flex items-center gap-3">
            <div class="w-9 h-9 bg-dst-orange rounded-full flex items-center justify-center">
              <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
              </svg>
            </div>
            <div>
              <p class="text-white font-semibold text-sm">Assistant DST</p>
              <span class="flex items-center gap-1 text-xs text-green-400">
                <span class="w-1.5 h-1.5 bg-green-400 rounded-full" />
                En ligne
              </span>
            </div>
          </div>
          <button
            class="text-white/60 hover:text-white transition-colors"
            aria-label="Fermer le chat"
            @click="isOpen = false"
          >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>

        <!-- Messages -->
        <div ref="messagesContainer" class="h-64 overflow-y-auto p-4 space-y-3 bg-gray-50">
          <div
            v-for="(msg, idx) in messages"
            :key="idx"
            :class="['flex', msg.role === 'user' ? 'justify-end' : 'justify-start']"
          >
            <div
              :class="[
                'max-w-[80%] px-4 py-2.5 rounded-2xl text-sm leading-relaxed',
                msg.role === 'user'
                  ? 'bg-dst-blue text-white rounded-br-sm'
                  : 'bg-white text-gray-700 shadow-sm border border-gray-100 rounded-bl-sm'
              ]"
            >
              {{ msg.content }}
            </div>
          </div>
          <!-- Typing indicator -->
          <div v-if="isTyping" class="flex justify-start">
            <div class="bg-white rounded-2xl rounded-bl-sm px-4 py-3 shadow-sm border border-gray-100">
              <div class="flex gap-1">
                <span v-for="i in 3" :key="i" class="w-1.5 h-1.5 bg-gray-400 rounded-full animate-bounce" :style="`animation-delay: ${i * 150}ms`" />
              </div>
            </div>
          </div>
        </div>

        <!-- Input -->
        <form class="p-3 border-t border-gray-100 bg-white flex gap-2" @submit.prevent="sendMessage">
          <input
            v-model="inputMessage"
            type="text"
            placeholder="Posez votre question..."
            class="flex-1 text-sm px-3 py-2 rounded-xl border border-gray-200 focus:outline-none
                   focus:border-dst-blue transition-colors"
          />
          <button
            type="submit"
            :disabled="!inputMessage.trim() || isTyping"
            class="w-9 h-9 bg-dst-blue text-white rounded-xl flex items-center justify-center
                   hover:bg-dst-navy transition-colors disabled:opacity-50 disabled:cursor-not-allowed"
          >
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
            </svg>
          </button>
        </form>
      </div>
    </Transition>

    <!-- Bouton flottant -->
    <button
      class="w-14 h-14 bg-dst-orange rounded-full shadow-cta flex items-center justify-center
             hover:bg-orange-600 transition-all duration-200 hover:scale-110 active:scale-95"
      aria-label="Ouvrir l'assistant IA"
      @click="isOpen = !isOpen"
    >
      <svg v-if="!isOpen" class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
      </svg>
      <svg v-else class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
      </svg>
    </button>

    <!-- Badge notification -->
    <span
      v-if="!isOpen && unreadCount > 0"
      class="absolute -top-1 -right-1 w-5 h-5 bg-red-500 text-white text-xs font-bold
             rounded-full flex items-center justify-center"
    >
      {{ unreadCount }}
    </span>
  </div>
</template>

<script setup lang="ts">
const isOpen = ref(false)
const inputMessage = ref('')
const isTyping = ref(false)
const unreadCount = ref(1)
const messagesContainer = ref<HTMLElement | null>(null)

const messages = ref([
  {
    role: 'assistant',
    content: 'Bonjour ! Je suis l\'assistant de DST Computing. Comment puis-je vous aider aujourd\'hui ? 😊',
  },
])

async function sendMessage() {
  const text = inputMessage.value.trim()
  if (!text) return

  messages.value.push({ role: 'user', content: text })
  inputMessage.value = ''
  isTyping.value = true
  unreadCount.value = 0

  await nextTick()
  scrollToBottom()

  // TODO: Connecter à l'API Claude via le backend Laravel
  await new Promise(resolve => setTimeout(resolve, 1200))

  messages.value.push({
    role: 'assistant',
    content: 'Merci pour votre message. Un de nos experts DST Computing vous recontactera très prochainement. Vous pouvez également nous joindre directement sur WhatsApp ou via le formulaire de devis.',
  })

  isTyping.value = false
  await nextTick()
  scrollToBottom()
}

function scrollToBottom() {
  if (messagesContainer.value) {
    messagesContainer.value.scrollTop = messagesContainer.value.scrollHeight
  }
}

watch(isOpen, (val) => {
  if (val) unreadCount.value = 0
})
</script>

<style scoped>
.chat-pop-enter-active,
.chat-pop-leave-active {
  transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}
.chat-pop-enter-from,
.chat-pop-leave-to {
  opacity: 0;
  transform: scale(0.8) translateY(20px);
  transform-origin: bottom right;
}
</style>
