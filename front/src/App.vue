<script setup>
import MPromptList from '@/components/MPromptList.vue'
import MImg from '@/components/MImg.vue'
import MSocialLinks from '@/components/MSocialLinks.vue'
import { ref } from 'vue'
import { getAllSocialLinks, getSocialLink } from '../apiConfig/socialLink.js'
import { getAllPrompts } from '../apiConfig/prompt.js'

const currentYear = 2023

const links = ref([])
getAllSocialLinks(links)
console.log(links)

const prompts = ref([])
getAllPrompts(prompts, 'year', currentYear)
</script>

<template>
  <main class="mt-2 mb-5">
    <MImg img-url="/src/assets/images/Logo_MTB.png" class="col-6 offset-3" />
    <MSocialLinks :links="links" />
    <MPromptList :prompts="prompts" />
  </main>
  <div class="line-divider"></div>
  <footer class="fs-5 text-center title-font text-red fw-bold my-5">
    By
    <a :href="links[0].link">Qimono</a>
  </footer>
</template>
<style scoped></style>
