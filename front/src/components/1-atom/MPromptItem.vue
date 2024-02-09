<script setup>
defineProps({
  day: Number,
  nameFr: String,
  nameEn: String,
  red: Boolean,
  blue: Boolean,
  yellow: Boolean,
  textEnd: Boolean
})

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
    class="title-font fw-bold fs-5 rounded-pill px-4 py-1 d-flex"
    :class="[
      propSetup.classes.global,
      red ? propSetup.classes.red : '',
      blue ? propSetup.classes.blue : '',
      yellow ? propSetup.classes.yellow : '',
      textEnd ? 'justify-content-sm-end' : 'justify-content-sm-start'
    ]"
  >
    <div>{{ day }}</div>
    <div class="mx-2">-</div>
    <div>{{ nameFr }}</div>
    <div class="mx-2">-</div>
    <div>{{ nameEn }}</div>
  </div>
</template>

<style scoped></style>
