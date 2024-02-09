<script setup>
import { ref } from 'vue'
import { getSocialLink, getSocialLinks } from '/apiConfig/socialLink.js'
import { getPrompts } from '/apiConfig/prompt.js'
import MImg from '@/components/1-atom/MImg.vue'
import MSocialLinks from '@/components/2-molecule/MSocialLinks.vue'
import MPromptList from '@/components/2-molecule/MPromptList.vue'

const currentYear = 2023

const links = ref([])
getSocialLinks(links)

const footerLink = ref([])
getSocialLink('instagram', footerLink)

const prompts = ref([])
getPrompts(prompts, 'year', currentYear)
</script>

<template>
  <main class="mt-2 mb-5">
    <MImg
      img-url="/src/assets/images/Logo_MTB.png"
      class="col-6 col-md-4 offset-md-4 col-lg-2 offset-lg-5 offset-3"
    />
    <MSocialLinks :links="links" class="mb-4" />
    <MPromptList :prompts="prompts" />
  </main>
  <div class="line-divider"></div>
  <footer class="fs-5 text-center title-font text-red fw-bold my-5">
    By
    <a :href="footerLink">Qimono</a>
  </footer>
</template>
<style scoped></style>
