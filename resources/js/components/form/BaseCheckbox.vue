<template>
    <q-checkbox
        :id="id"
        v-model="inputValue"
        :label="label"
    ></q-checkbox>
</template>

<script setup>
import { useField } from 'vee-validate';
import { toRefs } from 'vue';


const props = defineProps({
   id: {
      type: String,
      default: '',
   },
   label: {
      type: String,
      default: undefined,
   },
   rules: {
      type: String,
      default: '',
   },
})
const { label, id, rules } = toRefs(props)

const { value: inputValue, errorMessage } = useField(id, rules, {
   syncVModel: true,
   validateOnValueUpdate: true,
   keepValueOnUnmount: true,
   label,
})
</script>
