<script setup>
import { ref } from 'vue'

defineProps({
  day: Number,
  nameFr: String,
  nameEn: String,
  red: Boolean,
  blue: Boolean,
  yellow: Boolean,
  textEnd: Boolean
})

let copied = ref(false)

function copyToClipboard(contentToCopy) {
  console.log(contentToCopy)
  navigator.clipboard.writeText(contentToCopy)
  copied.value = true
}

const propSetup = {
  classes: {
    global: 'text-white-hover justify-content-center',
    blue: 'text-blue bg-blue-hover',
    red: 'text-red bg-red-hover',
    yellow: 'text-yellow bg-yellow-hover'
  }
}
</script>

<template>
  <div
    class="title-font fw-bold fs-sm-5 rounded-pill px-4 py-1 d-flex item"
    :class="[
      propSetup.classes.global,
      red ? propSetup.classes.red : '',
      blue ? propSetup.classes.blue : '',
      yellow ? propSetup.classes.yellow : '',
      textEnd ? 'justify-content-sm-end' : 'justify-content-sm-start'
    ]"
    @click="copyToClipboard(nameFr)"
  >
    <div v-if="!textEnd" class="me-sm-3 me-2 text-sm-white d-sm-block d-none">
      <BIconCopy v-if="copied === false" />
      <BIconCheckLg v-if="copied === true" />
    </div>

    <div class="me-sm-3 me-2 text-sm-white d-sm-none d-block">
      <BIconCopy v-if="copied === false" />
      <BIconCheckLg v-if="copied === true" />
    </div>

    <div>{{ day }}</div>
    <div class="mx-2">-</div>
    <div>{{ nameFr }}</div>
    <div class="mx-2">-</div>
    <div>{{ nameEn }}</div>

    <div v-if="textEnd" class="ms-3 text-sm-white d-sm-block d-none">
      <BIconCopy v-if="copied === false" />
      <BIconCheckLg v-if="copied === true" />
    </div>
  </div>
</template>

<style scoped>
.item {
  cursor: pointer;

  &:active {
    background-color: white;
    color: red;
  }
}
</style>
