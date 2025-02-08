<script setup>
import BaseInput from '@Components/form/BaseInput.vue'
import { inject, ref } from 'vue'
import { Form } from 'vee-validate'
import BaseCheckbox from '../../components/form/BaseCheckbox.vue'

const loginData = ref({
    email: '',
    password: '',
    remember: false,
})
const loginForm = ref()
const showPassword = ref(false)

const axios = inject('axios')

const login = async () => {
    try {
        await axios.get('/sanctum/csrf-cookie')
        await axios.post('/api/login', loginData.value)
        window.location.replace('/')
    } catch (e) {
        const data = e?.response?.data
        if (data?.errors && typeof data?.errors === 'object') {
            loginForm.value.setErrors(data?.errors)
        }
    }
}

const forgotPassword = () => {
    console.log("Forgot password")
}
</script>

<template>
    <q-card class="column bg-grey-6 text-white items-center q-pa-md" style="width: 40vw;">
        <q-card-section class="text-center" style="width: 60%;">
            <span class="text-h4">{{ $t('ui.auth.login') }}</span>
        </q-card-section>
        <q-card-section style="width: 60%;">
            <Form ref="loginForm" @submit="login()">
                <BaseInput
                    id="email"
                    v-model="loginData.email"
                    type="text"
                    :label="$t('ui.auth.email')"
                    outlined
                    rules="required|email"
                    label-color="white"
                >
                    <template #prepend>
                        <q-icon class="cursor-pointer" name="email" />
                    </template>
                </BaseInput>

                <BaseInput
                    id="password"
                    v-model="loginData.password"
                    :type="showPassword ? 'text' : 'password'"
                    :label="$t('ui.auth.password')"
                    outlined
                    rules="required|min:8"
                    label-color="white"
                >
                    <template #prepend>
                        <q-icon
                            class="cursor-pointer"
                            name="lock"
                        />
                    </template>
                    <template #append>
                        <q-icon
                            class="cursor-pointer"
                            :name="showPassword ? 'visibility_off' : 'visibility'"
                            @click="showPassword = !showPassword"
                        />
                    </template>
                </BaseInput>

                <div class="row q-mb-md items-center justify-between">
                    <BaseCheckbox
                        id="remember-me"
                        :label="$t('ui.auth.remember')"
                        v-model="loginData.remember"
                    />
                    <div
                        class="text-subtitle2 cursor-pointer"
                        @click="forgotPassword()"
                    >
                        {{ $t('ui.auth.forgot_password') }}
                    </div>
                </div>

                <q-btn
                    type="submit"
                    color="primary"
                    :label="$t('ui.auth.log_in')"
                    style="width: 100%"
                    class="q-pa-sm"
                />
            </Form>
        </q-card-section>
    </q-card>
</template>
