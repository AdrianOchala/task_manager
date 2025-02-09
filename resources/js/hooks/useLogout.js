import { inject } from 'vue'

export function useLogout() {
   const $cookies = inject('$cookies')
   const helpers = inject('helpers')
   const http = inject('http')
   const axios = inject('axios')
   const logout = async () => {
      try {
         await axios.post('logout')
         $cookies.keys().forEach((cookie) => $cookies.remove(cookie))
         helpers.redirect('/')
      } catch (e) {
         http.processAPIErrors(e, false)
      }
   }

   return {
      logout,
   }
}
