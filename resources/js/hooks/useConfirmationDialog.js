import { trans } from 'laravel-vue-i18n'
import { useQuasar } from 'quasar'

export function useConfirmationDialog() {
    const $q = useQuasar()

    const confirm = async ({
        title = trans('ui.dialog.header'),
        message = trans('ui.dialog.confirm'),
        prompt,
    }) => await new Promise((resolve) => {
        $q.dialog({
            title: title,
            message: message,
            persistent: true,
            prompt: prompt,
            ok: {
                label: trans('ui.base.yes'),
                color: 'green-14',
            },
            cancel: {
                label: trans('ui.base.no'),
                flat: true,
             },
          })
             .onOk((data) => {
                resolve({
                   confirmed: true,
                   data: data,
                })
             })
             .onCancel(() => {
                resolve({
                   confirmed: false,
                })
             })
    })

    return { confirm }
}
