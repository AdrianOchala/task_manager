export const redirect = (url, asLink = true) =>
    asLink ? (window.location.href = url) : window.location.replace(url)

export default {
    redirect
}
