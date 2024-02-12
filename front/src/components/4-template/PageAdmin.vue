<script setup>
import MPromptForm from '@/components/2-molecule/MPromptForm.vue'
import { postPrompt } from '../../../apiConfig/prompt.js'
import { ref } from 'vue'

const isPosted = ref(false)

const postFilledForm = (formData) => {

    isPosted.value = postPrompt(formData, isPosted)
}
</script>

<template>
  <div v-for="index in 2" :key="index">
    <MPromptForm :day-number="index" @is-filled="postFilledForm" :is-posted="isPosted" />
  </div>
</template>

<style scoped></style>
