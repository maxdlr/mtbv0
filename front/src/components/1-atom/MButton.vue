<script setup>
defineProps({
  label: String,
  link: String,
  red: Boolean,
  blue: Boolean,
  yellow: Boolean,
  labeled: Boolean,
  pill: Boolean,
  animHover: Boolean
})

const propSetup = {
  classes: {
    global: 'pt-1 px-3 m-0 fs-3',
    red: 'bg-red text-red-hover',
    blue: 'bg-blue text-blue-hover',
    yellow: 'bg-yellow text-yellow-hover'
  }
}
</script>

<template>
  <div
    class="d-flex align-items-end"
    :class="[
      propSetup.classes.global,
      animHover ? 'anim-up-hover' : '',
      pill ? 'rounded-pill' : ''
    ]"
  >
    <a
      class="btn"
      :href="link"
      :class="[
        propSetup.classes.global,
        red ? propSetup.classes.red : '',
        blue ? propSetup.classes.blue : '',
        yellow ? propSetup.classes.yellow : '',
        pill ? 'rounded-pill' : ''
      ]"
    >
      <slot />
      <p v-if="labeled">{{ label }}</p>
    </a>
  </div>
</template>

<style scoped></style>
