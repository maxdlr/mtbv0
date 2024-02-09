<script setup>
import MPromptForm from '@/components/2-molecule/MPromptForm.vue'
import { postPrompt } from '../../../apiConfig/prompt.js'

const postFilledForm = (formData) => {
  if (postPrompt(formData)) {
    console.log('Prompt ' + formData.nameFr + ' is posted !!')
  }
}
</script>

<template>
  <div v-for="index in 2">
    <MPromptForm :day-number="index" @is-filled="postFilledForm" />
  </div>
</template>

<style scoped></style>
