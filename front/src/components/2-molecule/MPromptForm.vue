<script setup>
import MTextField from '@/components/1-atom/MTextField.vue'
import { ref } from 'vue'
import MButton from '@/components/1-atom/MButton.vue'

defineProps({
  dayNumber: Number
})

const emit = defineEmits(['isFilled'])

const newDay = ref()
const newNameFr = ref()
const newNameEn = ref()

const sendFilledData = () => {
  let newPrompt = ref({
    day: newDay,
    nameFr: newNameFr,
    nameEn: newNameEn,
    promptList: '/api/prompt_lists/1'
  })

  emit('isFilled', newPrompt.value)
}

const propSetup = {
  prompt: {
    input: {
      day: {
        label: 'Jour',
        name: 'day',
        placeholder: '31'
      },
      nameFr: {
        label: 'Thème (fr)',
        name: 'nameFr',
        placeholder: 'Caca'
      },
      nameEn: {
        label: 'Thème (en)',
        name: 'nameEn',
        placeholder: 'Shit'
      }
    }
  }
}
</script>

<template>
  <form @submit.prevent="sendFilledData" class="d-flex">
    <MTextField
      type="number"
      :label="propSetup.prompt.input.day.label"
      :name="propSetup.prompt.input.day.name + '-' + dayNumber"
      v-model="newDay"
    />
    <MTextField
      type="text"
      :label="propSetup.prompt.input.nameFr.label"
      :name="propSetup.prompt.input.nameFr.name + '-' + dayNumber"
      v-model="newNameFr"
    />
    <MTextField
      type="text"
      :label="propSetup.prompt.input.nameEn.label"
      :name="propSetup.prompt.input.nameEn.name + '-' + dayNumber"
      v-model="newNameEn"
    />
    <button>ok</button>
  </form>
</template>

<style scoped></style>
