<script setup>
defineProps({
  label: String,
  link: String,
  red: Boolean,
  blue: Boolean,
  yellow: Boolean,
  labeled: Boolean,
  pill: Boolean,
  animHover: Boolean,
  isLink: Boolean,
  type: String,
  big: Boolean
})

const propSetup = {
  classes: {
    globalBig: 'pt-1 px-3 m-0 fs-3',
    globalSmall: 'px-3 m-0 fs-5',
    red: 'bg-red text-red-hover',
    blue: 'bg-blue text-blue-hover',
    yellow: 'bg-yellow text-yellow-hover'
  }
}
</script>

<template>
  <button
    v-if="isLink === true"
    :type="type"
    class="btn"
    :class="[
      big ? propSetup.classes.globalBig : propSetup.classes.globalSmall,
      red ? propSetup.classes.red : '',
      blue ? propSetup.classes.blue : '',
      yellow ? propSetup.classes.yellow : '',
      pill ? 'rounded-pill' : ''
    ]"
  >
    {{ label }}
  </button>

  <div
    v-if="isLink === false"
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
        big ? propSetup.classes.globalBig : propSetup.classes.globalSmall,
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
