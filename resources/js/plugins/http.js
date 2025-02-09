import { trans } from "laravel-vue-i18n"
import { useToast } from "vue-toastification"

export function processAPIErrors(e) {
    const message = e?.response?.data?.message

    if (message) {
        toastResponseMessage(message)
    }
}

export function toastResponseMessage(message = trans('ui.toast.error')) {
    const toast = useToast()
    toast.error(message)
}


export default {
    processAPIErrors,
    toastResponseMessage
}
