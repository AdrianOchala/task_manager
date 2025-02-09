import 'vue-toastification/dist/index.css'

import { createApp } from "vue"
import App from './App.vue'
import { Quasar, Dialog } from 'quasar'
import quasarLang from 'quasar/lang/pl'
import { configure, defineRule } from "vee-validate"
import { i18nVue, trans } from 'laravel-vue-i18n'
import { localize, setLocale } from '@vee-validate/i18n'
import pl from '@vee-validate/i18n/dist/locale/pl.json'
import en from '@vee-validate/i18n/dist/locale/en.json'
import { all as allRules } from '@vee-validate/rules'
import axios from "axios"
import helpers from '@Plugins/helpers'
import http from '@Plugins/http'
import Toast, { POSITION } from 'vue-toastification'
import VueCookies from 'vue-cookies'

// Import icon libraries
import '@quasar/extras/material-icons/material-icons.css'
import '@quasar/extras/material-icons-outlined/material-icons-outlined.css'
import '@quasar/extras/material-icons-round/material-icons-round.css'
import '@quasar/extras/material-icons-sharp/material-icons-sharp.css'
// Import Quasar css
import 'quasar/src/css/index.sass'

const app = createApp(App)


app.use(Quasar, {
    plugins: {
        Dialog
    },
    lang: quasarLang
})

app.use(i18nVue, {
    lang: 'pl',
    resolve: async (lang) => {
       const langs = import.meta.glob('../../lang/*.json')
       if (lang.startsWith('php_')) {
          return await langs[`../../lang/${lang}.json`]()
       } else {
          return await langs[`../../lang/php_${lang}.json`]()
       }
    },
 })

// Define all the rules globally
configure({
    validateOnInput: true,
    generateMessage: localize({
       en,
       pl,
    }),
 })
 Object.keys(allRules).forEach((rule) => {
    defineRule(rule, allRules[rule])
 })

setLocale('pl')

axios.defaults.withCredentials = true
const axiosPlugin = {
    install(app) {
        app.config.globalProperties.$axios = axios
        app.provide('axios', axios)
    }
}
app.use(axiosPlugin)

const helpersPlugin = {
    install(app) {
       app.config.globalProperties.$helpers = helpers
       app.provide('helpers', helpers)
    },
 }
 app.use(helpersPlugin)

 const httpPlugin = {
    install(app) {
       app.config.globalProperties.$http = http
       app.provide('http', http)
    },
 }
app.use(httpPlugin)

app.use(Toast, {
    timeout: 2000,
    position: POSITION.BOTTOM_RIGHT,
})

app.use(VueCookies)


export default app
