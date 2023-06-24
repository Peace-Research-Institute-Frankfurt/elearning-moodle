import Cookies from "js-cookie"

function setConsentCookie() {
  Cookies.set("EU_COOKIE_LAW_CONSENT", "true", { expires: 30 })
}

export default function initCookiePopup() {
  if (Cookies.get("EU_COOKIE_LAW_CONSENT") === "true") return

  const container = document.querySelector("#cookies-popup")
  if (!container) return

  container.classList.add("active")

  const acceptAllButton = container.querySelector("#js-allow-all")
  const acceptNecessaryButton = container.querySelector("#js-allow-necessary")

  acceptAllButton.addEventListener("click", (e) => {
    setConsentCookie()
    container.classList.remove("active")
  })

  acceptNecessaryButton.addEventListener("click", (e) => {
    _paq.push(["rememberConsentGiven"])
    setConsentCookie()
    container.classList.remove("active")
  })
}
