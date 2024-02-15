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
  setTimeout(() => {
    copied.value = false
  }, 4000)
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
      textEnd ? 'justify-content-sm-end item-left' : 'justify-content-sm-start item-right'
    ]"
    @click="copyToClipboard(nameFr)"
  >
    <div v-if="!textEnd" class="me-sm-3 me-2 text-sm-white d-sm-block d-none circle-pop">
      <BIconCopy v-if="copied === false" class="anim-rotate-load" />
      <BIconCheckLg v-if="copied === true" class="anim-rotate-load" />
    </div>

    <div class="me-sm-3 me-2 text-sm-white d-sm-none d-block circle-pop">
      <BIconCopy v-if="copied === false" class="anim-rotate-load" />
      <BIconCheckLg v-if="copied === true" class="anim-rotate-load" />
    </div>

    <div class="text-nowrap">{{ day }}</div>
    <div class="mx-2">-</div>
    <div class="text-nowrap">{{ nameFr }}</div>
    <div class="mx-2">-</div>
    <div class="text-nowrap">{{ nameEn }}</div>

    <div v-if="textEnd" class="ms-3 text-sm-white d-sm-block d-none circle-pop">
      <BIconCopy v-if="copied === false" class="anim-rotate-load" />
      <BIconCheckLg v-if="copied === true" class="anim-rotate-load" />
    </div>
  </div>
</template>

<style scoped>
.item {
  cursor: pointer;
  transform: translate(0, 0);
  transition-timing-function: cubic-bezier(0.1, 0.89, 0.1, 0.89);
  transition-duration: 1s;
  transition-property: transform;

  &:active {
    background-color: white;
    color: red;
  }
}

.item-left:hover {
  transform: translate(-20px, 0);
}

.item-right:hover {
  transform: translate(20px, 0);
}

@keyframes rotate {
  0% {
    rotate: 0deg;
  }
  100% {
    rotate: 360deg;
  }
}

.circle-pop {
  .anim-rotate-load {
    animation-name: rotate;
    animation-duration: 1s;
    animation-timing-function: cubic-bezier(0.1, 0.89, 0.1, 0.89);
  }

  position: relative;

  &:after {
    display: block;
    content: '';
    width: 0;
    height: 0;
    border: #2a00ff 20px solid;
    border-radius: 50%;
    position: absolute;
    translate: -50% -50%;
    top: 50%;
    left: 50%;
    transition: 0s;
    opacity: 0;
  }

  .item:active &:after {
    opacity: 100%;
    width: 40px;
    height: 40px;
    border-width: 0;
    transition-duration: 2s;
    transition-property: all;
    transition-timing-function: cubic-bezier(0.1, 0.89, 0.1, 0.89);
  }
}
</style>
