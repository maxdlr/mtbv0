<script setup>
defineProps({
  type: String,
  label: String,
  name: String,
  required: Boolean,
  placeholder: String
})

const textValue = defineModel()
</script>

<template>
  <label :for="name" class="border border-2 m-1 py-2 px-2 rounded-5">
    <input
      :type="type"
      :name="name"
      v-model="textValue"
      class="border-0 ps-3 py-2 rounded-pill"
      :min="[type === 'number' ? 1 : '']"
      :max="type === 'number' ? 31 : ''"
      :inputmode="type === 'number' ? 'numeric' : ''"
      :required="required"
      :placeholder="placeholder"
    />
  </label>
</template>

<style scoped></style>
