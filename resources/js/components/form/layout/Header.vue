<script setup>
import { useConfirmationDialog } from '@Hooks/useConfirmationDialog';
import { trans } from 'laravel-vue-i18n';
import { useLogout } from '@Hooks/useLogout.js'

defineProps({
    toggleMenu: {
        type: Function,
        required: true,
    }
})

const { confirm } = useConfirmationDialog()
const { logout } = useLogout()

const logoutFn = async () => {
    const { confirmed } = await confirm({message: trans('ui.auth.logout_confirmation')})
    if (confirmed) {
        logout()
    }
}
</script>

<template>
    <q-header>
        <q-toolbar>
            <q-btn dense flat round icon="menu" @click="toggleMenu" />

            <div
                class="cursor-pointer text-h6 q-ml-xs"
                @click="$router.push('/')"
            >
                Task Manager
            </div>

            <q-space />

            <div class="flex">
                <q-btn
                    class="q-px-sm"
                    icon="logout"
                    flat
                    round
                    @click="logoutFn()"
                >
                    <q-tooltip class="text-subtitle2">
                        {{ $t('ui.auth.logout') }}
                    </q-tooltip>
                </q-btn>
            </div>
        </q-toolbar>
    </q-header>
</template>
