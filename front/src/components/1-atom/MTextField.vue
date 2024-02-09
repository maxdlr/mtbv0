<script setup>
defineProps({
  type: String,
  label: String,
  name: String
})

const textValue = defineModel()
</script>

<template>
  <label :for="name" class="border border-2 m-1 py-2 px-2 rounded-5">
    <sup class="ps-3">
      {{ label }}
    </sup>
    <input :type="type" :name="name" v-model="textValue" class="border-0 ps-2 pb-2 rounded-pill" />
  </label>
</template>

<style scoped></style>
