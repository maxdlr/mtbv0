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
        label: 'Thème',
        name: 'nameFr',
        placeholder: 'Caca'
      },
      nameEn: {
        label: 'Prompt',
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
      :required="true"
      :placeholder="propSetup.prompt.input.day.label + ' (31)'"
    />
    <MTextField
      type="text"
      :label="propSetup.prompt.input.nameFr.label"
      :name="propSetup.prompt.input.nameFr.name + '-' + dayNumber"
      v-model="newNameFr"
      :required="true"
      :placeholder="propSetup.prompt.input.nameFr.label"
    />
    <MTextField
      type="text"
      :label="propSetup.prompt.input.nameEn.label"
      :name="propSetup.prompt.input.nameEn.name + '-' + dayNumber"
      v-model="newNameEn"
      :required="true"
      :placeholder="propSetup.prompt.input.nameEn.label"
    />
    <MButton :is-link="true" type="submit" :red="true" label="Valider" :pill="true" />
    <div class="text-blue d-flex justify-content-center align-items-center px-2 fw-bold">
      <BIconCheckCircleFill class="fs-3 mx-2" />
      Enregistré
    </div>
  </form>
</template>

<style scoped></style>
