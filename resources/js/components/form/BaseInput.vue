<script setup>
import { toRefs } from 'vue'
import { useField } from 'vee-validate'

const modelValue = defineModel({
    type: [String, Number],
    default: '',
})

const props = defineProps({
    id: {
        type: String,
        required: true,
    },
    label: {
        type: String,
        default: undefined,
    },
    rules: {
        type: String,
        default: '',
    },
    hint: {
        type: String,
        default: undefined,
    },
})

const {id, label, rules} = toRefs(props)

const { value: inputValue, errorMessage } = useField(id, rules, {
    syncVModel: true,
    validateOnValueUpdate: true,
    keepValueOnUnmount: true,
    label,
})
</script>

<template>
    <q-input
        v-model="inputValue"
        :label="label"
        :hint="hint"
        :error="!!errorMessage"
        :errorMessage="errorMessage"
    >
        <template #prepend>
            <slot name="prepend"></slot>
        </template>
        <template #append>
            <slot name="append"></slot>
        </template>
    </q-input>
</template>
