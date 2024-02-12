<script setup>
import MPromptForm from '@/components/2-molecule/MPromptForm.vue'
import { getPrompts, postPrompt, promptExists } from '../../../apiConfig/prompt.js'

const postFilledForm = (formData) => {
  postPrompt(formData)
}
</script>

<template>
  <div v-for="index in 2" :key="index">
    <MPromptForm :day-number="index" @is-filled="postFilledForm" />
  </div>
</template>

<style scoped></style>
