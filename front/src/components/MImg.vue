<script setup>
defineProps({
  imgUrl: String,
  alt: String
})
</script>

<template>
  <img class="img-fluid" :src="imgUrl" :alt="alt" />
</template>

<style scoped></style>
