<script setup>
import MPromptItem from '@/components/MPromptItem.vue'
import { ref } from 'vue'
import { getAllPrompts } from '../../apiConfig/prompt.js'

defineProps({
  prompts: Array
})

const propSetup = {
  loopCut: 15,
  classes: {
    col: 'col-sm-6'
  }
}
</script>

<template>
  <section class="container-lg">
    <article class="row justify-content-center">
      <div :class="propSetup.classes.col">
        <div v-for="({ day, nameFr, nameEn }, index) in prompts" :key="day">
          <MPromptItem
            v-if="index <= propSetup.loopCut"
            :day="day"
            :name-fr="nameFr"
            :name-en="nameEn"
            :text-end="index <= propSetup.loopCut"
            :red="index % 3 === 0"
            :blue="index % 3 === 1"
            :yellow="index % 3 === 2"
          />
        </div>
      </div>

      <div :class="propSetup.classes.col">
        <div v-for="({ day, nameFr, nameEn }, index) in prompts" :key="day">
          <MPromptItem
            v-if="index > propSetup.loopCut"
            :day="day"
            :name-fr="nameFr"
            :name-en="nameEn"
            :text-end="index <= propSetup.loopCut"
            :red="index % 3 === 0"
            :blue="index % 3 === 1"
            :yellow="index % 3 === 2"
          />
        </div>
      </div>
    </article>
  </section>
</template>

<style scoped></style>
