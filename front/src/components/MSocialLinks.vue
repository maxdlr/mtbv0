<script setup>
import MButton from '@/components/MButton.vue'
import { ref } from 'vue'
import { getAllSocialLinks } from '../../apiConfig/socialLink.js'

defineProps({
  links: Array
})
</script>

<template>
  <div class="container-lg d-flex justify-content-center">
    <div v-for="({ name, link }, index) in links" :key="index" class="mx-sm-1">
      <MButton
        :label="name"
        :link="link"
        :blue="index % 3 === 0"
        :red="index % 3 === 1"
        :yellow="index % 3 === 2"
        :pill="true"
        :anim-hover="true"
      >
        <BIconInstagram v-if="name === 'instagram'" />
        <BIconYoutube v-if="name === 'youtube'" />
        <BIconLinkedin v-if="name === 'linkedin'" />
        <BIconTwitterX v-if="name === 'twitter'" />
        <BIconTwitch v-if="name === 'twitch'" />
        <BIconDiscord v-if="name === 'discord'" />
      </MButton>
    </div>
  </div>
</template>

<style scoped></style>
